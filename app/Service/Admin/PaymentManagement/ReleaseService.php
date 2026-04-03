<?php

namespace App\Service\Admin\PaymentManagement;

use App\Enums\PaymentSection;
use App\Enums\Status;
use App\Helper\Static\Vars;
use App\Models\AdvertiserApply;
use App\Models\Country;
use App\Models\PaymentHistory;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Website;
use App\Traits\Action;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class ReleaseService
{

    public function init(Request $request, PaymentSection $section)
    {
        if($request->ajax())
        {
// EDIT
//        $editGate      = 'crm_approval_advertiser_edit';
            $editGate      = '';

            // VIEW
            $viewGate      = '';

            // DELETE
            $deleteGate    = '';

            // PERMISSIONS
            $actionData = [
                "route_main" => 'admin.payment-management.statusUpdateByID',
                "section" => $section->value
            ];

            return $this->prepareListing($request, $actionData, $section);
        }

        $title = ucwords(str_replace("-", " ", $section->value));

        SEOMeta::setTitle($title . " " . trans('global.list'));

        $publishers = Website::select([
                                "websites.id",
                                "websites.name",
                            ])
                            ->join("transactions", "transactions.website_id", "=", "websites.id")
                            ->orderBy("websites.name", "ASC")->groupBy('websites.id')->get()->toArray();

        return view('template.admin.payments.release', compact('section', 'publishers', 'title'));
    }

    private function prepareListing(Request $request, $actionData, PaymentSection $section)
    {
        $queryData = $this->query($request, $section);

        $data = [];
        foreach ($queryData['query'] as $row)
        {
            $actionData['id'] = $row->id;
            $actionData['paid_date'] = $row->paid_date;
            $actionData['created_at'] = Carbon::parse($row->created_at)->format("F Y");
            $data[] = $this->prepareData($actionData, $row, $section);
        }

        // COMPILE DATA
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($queryData['total_data']),
            "recordsFiltered" => intval($queryData['total_filtered']),
            "data"            => $data
        );

        // RETURN RESPONSE
        return response()->json($json_data);
    }

    private function query(Request $request, PaymentSection $section): Collection
    {
        if($section->value == PaymentHistory::PAYMENT_HISTORY)
        {
            $columns = array(
                "payment_histories.id",
                "payment_histories.paid_date",
                "websites.name as url",
                "payment_method_histories.payment_method",
                "payment_histories.amount",
                "payment_histories.commission_amount",
                "payment_histories.lc_commission_amount",
                "payment_histories.is_new_invoice",
                "payment_histories.is_matched",
                "payment_method_histories.account_holder_name",
                "payment_method_histories.bank_account_number",
                "payment_method_histories.account_type",
                "payment_method_histories.bank_code",
                "payment_method_histories.bank_location",
                "payment_method_histories.paypal_country",
                "payment_method_histories.paypal_holder_name",
                "payment_method_histories.paypal_email",
                "payment_method_histories.payoneer_holder_name",
                "payment_method_histories.payoneer_email",
                "payment_method_histories.payment_frequency",
                "payment_method_histories.payment_threshold",
//            "transactions.advertiser_name",
//            "transactions.sale_amount",
//            "transactions.payment_status",
//            "transactions.commission_amount",
//            "websites.name as publisher_domain",
//            "transactions.source as network",
                "payment_histories.created_at",
            );
        }
        else
        {

            $columns = array(
                "payment_histories.id",
                "payment_histories.amount",
                "payment_histories.paid_date",
                "payment_histories.commission_amount",
                "payment_histories.lc_commission_amount",
                "payment_histories.is_new_invoice",
                "payment_histories.is_matched",
                "payment_histories.created_at",
                "websites.name as url",
                "payment_method_histories.account_holder_name",
                "payment_method_histories.bank_account_number",
                "payment_method_histories.account_type",
                "payment_method_histories.bank_code",
                "payment_method_histories.bank_location",
                "payment_method_histories.payment_method",
                "payment_method_histories.paypal_country",
                "payment_method_histories.paypal_holder_name",
                "payment_method_histories.paypal_email",
                "payment_method_histories.payoneer_holder_name",
                "payment_method_histories.payoneer_email",
                "payment_method_histories.payment_frequency",
                "payment_method_histories.payment_threshold",
//            "transactions.advertiser_name",
//            "transactions.sale_amount",
//            "transactions.payment_status",
//            "transactions.commission_amount",
//            "websites.name as publisher_domain",
//            "transactions.source as network",
            );
        }

        // REQUEST VARIABLES
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        // DEFINE
        $customQuery = PaymentHistory::select($columns);

        $customQuery = $customQuery->rightJoin("websites", "websites.id", "=", "payment_histories.website_id")
                                   ->rightJoin("payment_method_histories", "payment_method_histories.payment_history_id", "=", "payment_histories.id");

        $country = $request->input('publisher');
        if(!empty($country))
            $customQuery = $customQuery->where("websites.id", $country);

        if($section->value == PaymentHistory::PAYMENT_HISTORY)
        {
            $customQuery = $customQuery->where("payment_histories.status", PaymentHistory::PAID);
        }
        elseif ($section->value == PaymentHistory::RELEASE_PAYMENT)
        {
            $customQuery = $customQuery->where("payment_histories.status", PaymentHistory::PENDING);
        }

//        // COUNT
        $totalData = $customQuery->count();

        // IF SEARCH
        if(!empty($search))
        {
            $customQuery = $customQuery->where(function($query) use ($search) {
                $query->orWhere('payment_method_histories.payment_method','LIKE',"%{$search}%")
                    ->orWhere('payment_method_histories.account_holder_name','LIKE',"%{$search}%")
                    ->orWhere('payment_method_histories.bank_account_number','LIKE',"%{$search}%")
                    ->orWhere('payment_method_histories.paypal_holder_name','LIKE',"%{$search}%")
                    ->orWhere('payment_method_histories.paypal_email','LIKE',"%{$search}%")
                    ->orWhere('payment_method_histories.payoneer_holder_name','LIKE',"%{$search}%")
                    ->orWhere('payment_method_histories.payoneer_email','LIKE',"%{$search}%")
                    ->orWhere('websites.name','LIKE',"%{$search}%");
            });

        }

        // THIS QUERY ONLY COUNT
        $totalFilteredQuery = $customQuery;

        // THIS QUERY GET RECORDS
        $query = $customQuery;

        // TOTAL FILTERED COUNT
        $totalFiltered = $totalFilteredQuery->count();

        // LIMIT AND OFFSET AND ORDER BY
        $query = $query->offset(intval($start))
            ->limit(intval($limit))
            ->orderBy($order,$dir)
            ->get();

        return collect([
            'total_filtered' => $totalFiltered,
            'total_data' => $totalData,
            'query' => $query,
        ]);
    }

    private function prepareData($actionData, $row, PaymentSection $section): array
    {
        $action = $this->prepareAction($actionData, $section);

        // ADVERTISER ID
        $created_at = Carbon::parse($row->created_at)->format("Y-m-d H:i:s a");
        $created_at = new HtmlString("<div class='text-center'>{$created_at}</div>");
        $nestedData['created_at'] = $created_at->toHtml();

        // ADVERTISER ID
        $paidDate = $row->paid_date ?? "-";
        $nestedData['paid_date'] = $paidDate;

        // ADVERTISER ID
        $url = $row->url ?? "-";
        $nestedData['url'] = $url;

        $method = ucwords($row->payment_method ?? "-");
        $method = new HtmlString("<div class='text-center'>{$method}</div>");
        $nestedData['payment_method'] = $method->toHtml();;

        $details = "-";
        if($row->payment_method == Vars::PAYPAL)
        {
            $country = $row->fetchCountry ? $row->fetchCountry->name : 'N/A';
            $details = "Country: {$country} <br /> Name: {$row->paypal_holder_name} <br /> Email: {$row->paypal_email}";
        }
        elseif($row->payment_method == Vars::PAYONEER)
        {
            $details = "Name: {$row->payoneer_holder_name} <br /> Email: {$row->payoneer_email}";
        }
        elseif($row->payment_method == Vars::BANK)
        {
            $location = "-";
            if(isset($row->fetchBankLocation->name))
                $location = $row->fetchBankLocation->name;
            $details = "Account Holder Name: {$row->account_holder_name} <br /> Account Number: {$row->bank_account_number} <br /> Account Type: {$row->account_type} <br /> Bank Code: {$row->bank_code} <br /> Bank Location: {$location}";
        }

        $options = "-";
        if($row->payment_frequency && $row->payment_threshold)
            $options = "$" . $row->payment_threshold . " " . ucwords(str_replace("_", " ", $row->payment_frequency));

        $nestedData['payment_details'] = $details;
        $nestedData['payment_option'] = $options;
        $commission = "$".number_format((float)$row->commission_amount, 2, '.', '');;
        $lccommission = "<span class='badge badge-success'>($".number_format((float)$row->commission_amount - $row->lc_commission_amount, 2, '.', '')." LC Revshare)</span>";

        $amount = new HtmlString("<div class='text-center'>{$commission}</div><div class='text-center'>{$lccommission}</div>");
        $nestedData['amount'] = $amount->toHtml();

        $amount = "-";
        // if($row->is_matched)
        // {
            if($row->is_new_invoice == PaymentHistory::INVOICE_NEW)
            {
                $cappedAmount = 30;
                if($row->payment_method == \App\Helper\Static\Vars::PAYONEER) {
                    $cappedAmount = 20;
                }
                $processingFees = $row->lc_commission_amount * 0.02;
                $processingFees = $processingFees > $cappedAmount ? round($cappedAmount, 1) : round($processingFees, 1);
                $amount = "$".number_format($row->lc_commission_amount - $processingFees, 2);
            }
            else
            {
                $amount = "$".number_format($row->lc_commission_amount, 2);
            }
        // }

        $amount = new HtmlString("<h6 class='text-center'>$amount</h6>");
        $nestedData['amount_to_pay'] = $amount->toHtml();

        // ACTIONS
        $nestedData['action'] = $action;

        return $nestedData;
    }

    public function prepareAction($data, PaymentSection $section)
    {
        if($section->value == PaymentHistory::PAYMENT_HISTORY)
        {
            $createdAt = $data['created_at'];
            return '
                 <p class="text-center mb-0">
                     Payment Release on <br />'.$data['paid_date'].' for <br /> '.$createdAt.'
                 </p>
                 <ul class="text-center mb-0 d-flex justify-content-around">
                      <li>
                          <a class="ml-1 btn btn-info btn-custom-xs" href="'.route("publisher.payments.invoice", ['payment_history' => $data['id']]).'" target="_blank">
                            View Invoice
                          </a>
                      </li>
                      <li>
                          <a class="ml-1 btn btn-info btn-custom-xs" href="'.route("admin.transactions.index", ['payment_id' => $data['id'], 'r_name' => 'paid']).'" target="_blank">
                            View Trans.
                          </a>
                      </li>
                  </ul>';
        }
        elseif ($section->value == PaymentHistory::RELEASE_PAYMENT)
        {
            $id = $data['id'];
            return '<ul class="mb-0 d-flex justify-content-around">
                      <li>
                          <a class="ml-1 btn btn-success btn-custom-xs" href="javascript:void(0)" data-toggle="modal" data-target="#modal-basic" onclick="sendStatusData(`'.$id.'`)">
                            Release Payment
                          </a>
                      </li>
                      <li>
                          <a class="ml-1 btn btn-info btn-custom-xs" href="'.route("admin.transactions.index", ['payment_id' => $data['id'], 'r_name' => 'release']).'" target="_blank">
                            View Trans.
                          </a>
                      </li>
                  </ul>';
        }

    }

}
