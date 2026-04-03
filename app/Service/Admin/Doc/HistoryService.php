<?php

namespace App\Service\Admin\Doc;

use App\Models\Country;
use App\Models\Transaction;
use App\Traits\Action;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class HistoryService
{
    use Action;

    public function init(Request $request)
    {

        if($request->ajax())
        {
            // EDIT
            $editGate      =  '';//'crm_transaction_edit';

            // VIEW
            $viewGate      =  '';

            // DELETE
            $deleteGate    =  '';//'crm_transaction_delete';

            // PERMISSIONS
            $crudRoutePart = 'admin.api-history';

            $actionData = [
                "crud_part" => $crudRoutePart,
                "view" => $viewGate,
                "edit" => $editGate,
                "delete" => $deleteGate,
            ];

            return $this->prepareListing($request, $actionData);
        }

        SEOMeta::setTitle(trans('cruds.api-history.title') . " " . trans('global.list'));

        $countries = Country::orderBy("name", "ASC")->get()->toArray();

        return view('template.admin.api-history.index', compact('countries'));

    }

    private function prepareListing($request, $actionData)
    {
        $queryData = $this->query($request);

        $data = [];
        foreach ($queryData['query'] as $row)
        {
            $actionData['id'] = $row->id;
            $data[] = $this->prepareData($actionData, $row);
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

    private function query(Request $request): Collection
    {
        // COLUMN NAMES
        $columns = array(
            "transaction_id",
            "advertiser_name",
            "transaction_date",
            "commission_status",
            "customer_country",
            "advertiser_country",
            "commission_amount",
            "commission_amount_currency",
            "sale_amount",
            "sale_amount_currency",
            "source",
            "id"
        );

        // REQUEST VARIABLES
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        // DEFINE
        $customQuery = Transaction::with('advertiser:id,sid,name')->select("*");

        $source = $request->input('source');
        if(!empty($source))
            $customQuery = $customQuery->where("source", $source);

        $country = $request->input('country');
        if(!empty($country))
            $customQuery = $customQuery->where("customer_country", $country);

        // COUNT
        $totalData = $customQuery->count();

        // IF SEARCH
        if(!empty($search))
        {
            $customQuery = $customQuery->where(function($query) use ($search) {
                $query->orWhere('transaction_id','LIKE',"%{$search}%")
                    ->orWhere('advertiser_name','LIKE',"%{$search}%")
                    ->orWhere('transaction_date','LIKE',"%{$search}%")
                    ->orWhere('commission_status','LIKE',"%{$search}%")
                    ->orWhere('source','LIKE',"%{$search}%");
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

    private function prepareData($actionData, $row): array
    {
        $action = $this->prepareAction($actionData);

        // ADVERTISER ID
        $tid = $row->transaction_id ?? "-";
        $tid = new HtmlString("<div class='text-center'>{$tid}</div>");
        $nestedData['transaction_id'] = $tid->toHtml();

        // ADVERTISER ID
        $nestedData['advertiser_name'] = $row->advertiser->name ?? "-";

        // ADVERTISER ID
        $transaction_date = Carbon::parse($row->transaction_date)->format("Y-m-d H:i:s a");
        $transaction_date = new HtmlString("<div class='text-center'>{$transaction_date}</div>");
        $nestedData['transaction_date'] = $transaction_date->toHtml();

        // ADVERTISER ID
        $commission_status = ucwords($row->commission_status ?? "-");
        $commission_status = new HtmlString("<div class='text-center'>{$commission_status}</div>");
        $nestedData['commission_status'] = $commission_status->toHtml();

        // ADVERTISER ID
        $customer_country = $row->customer_country ?? "-";
        $customer_country = new HtmlString("<div class='text-center'>{$customer_country}</div>");
        $nestedData['customer_country'] = $customer_country->toHtml();

        // ADVERTISER ID
        $advertiser_country = $row->advertiser_country ?? "-";
        $advertiser_country = new HtmlString("<div class='text-center'>{$advertiser_country}</div>");
        $nestedData['advertiser_country'] = $advertiser_country->toHtml();

        // ADVERTISER ID
        $commission_amount = $row->commission_amount ?? "-";
        $commission_amount = new HtmlString("<div class='text-center'>{$commission_amount}</div>");
        $nestedData['commission_amount'] = $commission_amount->toHtml();

        // ADVERTISER ID
        $commission_amount_currency = $row->commission_amount_currency ?? "-";
        $commission_amount_currency = new HtmlString("<div class='text-center'>{$commission_amount_currency}</div>");
        $nestedData['commission_amount_currency'] = $commission_amount_currency->toHtml();

        // ADVERTISER ID
        $sale_amount = $row->sale_amount ?? "-";
        $sale_amount = new HtmlString("<div class='text-center'>{$sale_amount}</div>");
        $nestedData['sale_amount'] = $sale_amount->toHtml();

        // ADVERTISER ID
        $sale_amount_currency = $row->sale_amount_currency ?? "-";
        $sale_amount_currency = new HtmlString("<div class='text-center'>{$sale_amount_currency}</div>");
        $nestedData['sale_amount_currency'] = $sale_amount_currency->toHtml();

        // ADVERTISER ID
        $source = ucwords($row->source ?? "-");
        $source = new HtmlString("<div class='text-center'>{$source}</div>");
        $nestedData['source'] = $source->toHtml();

        // ACTIONS
        $nestedData['action'] = $action;

        return $nestedData;
    }
}
