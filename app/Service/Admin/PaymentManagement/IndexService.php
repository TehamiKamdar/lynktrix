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

class IndexService
{

    public function init(Request $request, PaymentSection $section, $columns = [])
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

        return view('template.admin.payments.index', compact('section', 'publishers', 'title', 'columns'));
    }

    private function prepareListing(Request $request, $actionData, PaymentSection $section)
    {
        $queryData = $this->query($request, $section);

        $data = [];
        foreach ($queryData['query'] as $row)
        {
            $actionData['id'] = $row->id;
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
        if($section->value == PaymentHistory::NO_PUBLISHER_PAYMENT)
        {
            $data = $this->filterDataGlobalNoPublisher($request);
        }
        elseif($section->value == PaymentHistory::RELEASE_PAYMENT)
        {
            $data = $this->filterDataGlobalReleasePayment($request, $section);
        }
        else
        {
            $data = $this->filterDataGlobal($request, $section);
        }

        return $data;
    }

    private function filterDataGlobal(Request $request, PaymentSection $section)
    {
        $type = $section->value;

        $payment_status = 0;
        if($type == PaymentHistory::PAID_TO_PUBLISHER)
        {
            $payment_status = [1, 2];
        }

        // COLUMN NAMES
        $columns = array(
            "transactions.transaction_date",
            "transactions.transaction_id",
            "transactions.advertiser_name",
            "transactions.sale_amount",
            "transactions.payment_status",
            "transactions.commission_amount",
            "websites.name",
            "transactions.source",
            "transactions.id"
        );

        // REQUEST VARIABLES
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        //dd($order, $request->input('order.0.column'));

        // DEFINE
        $customQuery = Transaction::select($columns);

        $customQuery = $customQuery->join("websites", "websites.id", "=", "transactions.website_id");

        $source = $request->input('source');
        if(!empty($source))
            $customQuery = $customQuery->where("transactions.source", $source);

        $country = $request->input('publisher');
        if(!empty($country))
            $customQuery = $customQuery->where("websites.id", $country);

        $customQuery = $customQuery->where("transactions.paid_to_publisher", 1)->where("transactions.commission_status", Transaction::STATUS_APPROVED);

        if (is_array($payment_status))
        {
            $customQuery = $customQuery->whereIn("transactions.payment_status", $payment_status);
        }
        else
        {
            $customQuery = $customQuery->where("transactions.payment_status", $payment_status);
        }

        // COUNT
        $totalData = $customQuery->count();

        // IF SEARCH
        $search_filter = trim($request->search_filter);

        // IF SEARCH
        if(!empty($search) && !empty($search_filter))
        {
            $customQuery = $customQuery->where("{$search_filter}", "LIKE","%{$search}%");
        }
        elseif(!empty($search))
        {
            $customQuery = $customQuery->where(function($query) use ($search) {
                $query->orWhere('transactions.transaction_id','LIKE',"%{$search}%")
                    ->orWhere('transactions.advertiser_name','LIKE',"%{$search}%")
                    ->orWhere('websites.name','LIKE',"%{$search}%")
                    ->orWhere('transactions.transaction_date','LIKE',"%{$search}%")
                    ->orWhere('transactions.source','LIKE',"%{$search}%");
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

    private function filterDataGlobalReleasePayment(Request $request, PaymentSection $section)
    {
        $payment_status = 3;

        // COLUMN NAMES
        $columns = array(
            "transactions.id",
            "transactions.transaction_date",
            "transactions.transaction_id",
            "transactions.advertiser_name",
            "transactions.sale_amount",
            "transactions.payment_status",
            "transactions.commission_amount",
            "websites.name",
            "transactions.source",
        );

        // REQUEST VARIABLES
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        // DEFINE
        $customQuery = Transaction::select($columns);

        $customQuery = $customQuery->join("websites", "websites.id", "=", "transactions.website_id");

        $country = $request->input('publisher');
        if(!empty($country))
            $customQuery = $customQuery->where("websites.id", $country);

        $customQuery = $customQuery->where("transactions.paid_to_publisher", 1);

        if (is_array($payment_status))
        {
            $customQuery = $customQuery->whereIn("payment_status", $payment_status);
        }
        else
        {
            $customQuery = $customQuery->where("payment_status", $payment_status);
        }

        // IF SEARCH
        if(!empty($search))
        {
            $customQuery = $customQuery->where(function($query) use ($search) {
                $query->orWhere('transactions.transaction_id','LIKE',"%{$search}%")
                    ->orWhere('transactions.advertiser_name','LIKE',"%{$search}%")
                    ->orWhere('websites.name','LIKE',"%{$search}%")
                    ->orWhere('transactions.transaction_date','LIKE',"%{$search}%")
                    ->orWhere('transactions.source','LIKE',"%{$search}%");
            });

        }

        // THIS QUERY ONLY COUNT
        $totalFilteredQuery = $customQuery;

        // THIS QUERY GET RECORDS
        $query = $customQuery;

        // LIMIT AND OFFSET AND ORDER BY
        $query = $query->offset(intval($start))
            ->limit(intval($limit))
            ->orderBy($order,$dir)
            ->get();

        // COUNT
        $totalData = $query->total();

        // TOTAL FILTERED COUNT
        $totalFiltered = $query->total();

        return collect([
            'total_filtered' => $totalFiltered,
            'total_data' => $totalData,
            'query' => $query,
        ]);
    }

    private function filterDataGlobalNoPublisher(Request $request)
    {
        // COLUMN NAMES
        $columns = array(
            "transactions.id",
            "transactions.transaction_date",
            "transactions.transaction_id",
            "transactions.advertiser_name",
            "transactions.sale_amount",
            "transactions.payment_status",
            "transactions.commission_amount",
            "transactions.source",
        );

        // REQUEST VARIABLES
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        // DEFINE
        $customQuery = Transaction::select($columns);

        $source = $request->input('source');
        if(!empty($source))
            $customQuery = $customQuery->where("transactions.source", $source);

        $customQuery = $customQuery->where("transactions.payment_status", "!=", Transaction::PAYMENT_STATUS_NOT_APPROVED)
                                   ->whereNull("transactions.website_id")
                                   ->whereNull("transactions.publisher_url");

        // COUNT
        $totalData = $customQuery->count();

        // IF SEARCH
        if(!empty($search))
        {
            $customQuery = $customQuery->where(function($query) use ($search) {
                $query->orWhere('transactions.transaction_id','LIKE',"%{$search}%")
                    ->orWhere('transactions.advertiser_name','LIKE',"%{$search}%")
                    ->orWhere('transactions.transaction_date','LIKE',"%{$search}%")
                    ->orWhere('transactions.source','LIKE',"%{$search}%");
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
        $action = $this->prepareAction($actionData);

        // PUBLISHER ID
        $nestedData['DT_RowId'] = $row->id;

        // ADVERTISER NAME
        $nestedData['id'] = null;

        // ADVERTISER ID
        $transaction_date = Carbon::parse($row->transaction_date)->format("Y-m-d H:i:s a");
        $transaction_date = new HtmlString("<div class='text-center'>{$transaction_date}</div>");
        $nestedData['transaction_date'] = $transaction_date->toHtml();

        // ADVERTISER ID
        $tid = $row->transaction_id ?? "-";
        $tid = new HtmlString("<div class='text-center'>{$tid}</div>");
        $nestedData['transaction_id'] = $tid->toHtml();

        // ADVERTISER ID
        $nestedData['advertiser_name'] = $row->advertiser_name ?? "-";

        // ADVERTISER ID
        $sale_amount = $row->sale_amount ?? null;
        $sale_amount = $sale_amount ? "$" . $sale_amount : "0";
        $sale_amount = new HtmlString("<div class='text-center'>{$sale_amount}</div>");
        $nestedData['sale_amount'] = $sale_amount->toHtml();

        // ADVERTISER ID
        $commission = $row->commission_amount ?? null;
        $commission_amount = $commission ? "$" . $commission : "0";
        $staticCommission = Vars::COMMISSION_PERCENTAGE;
        $actualCommission = $commission ? "0.{$staticCommission}" * $commission : "0";
        $actualCommission = "$".$actualCommission;
        $commission_amount = new HtmlString("<div class='text-center'><del>{$commission_amount}</del> ({$actualCommission} LC)</div>");
        $nestedData['commission_amount'] = $commission_amount->toHtml();

        // ADVERTISER ID
        $domain = ucwords($row->name ?? "-");
        $domain = new HtmlString("<div class='text-center'>{$domain}</div>");
        $nestedData['name'] = $domain->toHtml();

        // ADVERTISER ID
        $source = ucwords($row->source ?? "-");
        $source = new HtmlString("<div class='text-center'><span class='badge badge-danger'>{$source}</span></div>");
        $nestedData['source'] = $source->toHtml();

        // ADVERTISER ID
        if($section->value == PaymentHistory::PAID_TO_PUBLISHER)
        {
            if($row->payment_status == 1)
            {
                $status = "Confirmed";
                $class = "badge-success";
            }
            else
            {
                $status = "Rejected";
                $class = "badge-danger";
            }
        }
        else
        {
            $status = "Paid";
            $class = "badge-success";
        }
        $status = new HtmlString("<div class='text-center'><span class='badge {{ $class }}'>{$status}</span></div>");
        $nestedData['payment_status'] = $status->toHtml();

        // ACTIONS
        $nestedData['action'] = $action;

        return $nestedData;
    }

    public function prepareAction($data)
    {
        $crudRoutePart = $data['route_main'];
        $section = $data['section'];
        $id = $data['id'];
        $action = "<ul class='mb-0 d-flex justify-content-around'>";

        if($section == PaymentHistory::PENDING_TO_PAY)
        {
            $confirmed =  '<li>
                          <a class="btn btn-success btn-custom-xs" href="'.route($crudRoutePart, ['section' => $section, 'transaction' => $id, 'status' => 'confirm']).'">
                            Confirm
                          </a>
                      </li>';
            $action .= $confirmed . " ";
            $rejected =  '<li>
                          <a class="ml-1 btn btn-danger btn-custom-xs" href="'.route($crudRoutePart, ['section' => $section, 'transaction' => $id, 'status' => 'reject']).'">
                            Rejected
                          </a>
                      </li>';
            $action .= $rejected . " ";
        }

        elseif ($section == PaymentHistory::PAID_TO_PUBLISHER)
        {
            $rejected =  '<li>
                          <a class="ml-1 btn btn-success btn-custom-xs" href="'.route($crudRoutePart, ['section' => $section, 'transaction' => $id, 'status' => 'release']).'">
                            Release
                          </a>
                      </li>';
            $action .= $rejected . " ";
            // VIEW BUTTON
            $show =  '<li>
                          <a class="ml-1 btn btn-info btn-custom-xs" target="_blank" href="'.route("admin.transactions.show", $id).'">
                            View
                          </a>
                      </li>';
            $action .= $show . " ";
        }

        return $action;
    }

}
