<?php

namespace App\Service\Admin\Transactions;

use App\Helper\Static\Vars;
use App\Models\Country;
use App\Models\Transaction;
use App\Traits\Action;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class RakutenTransactionPaymentService
{
    use Action;

    public function init(Request $request)
    {
        if ($request->ajax()) {
            $actionData = [
                "crud_part" => 'admin.transactions',
                "view" => 'crm_transaction_show',
                "edit" => '',
                "delete" => '',
            ];

            return $this->prepareListing($request, $actionData);
        }

        $columns = $this->makeColumns();

        SEOMeta::setTitle(trans('cruds.transaction.title') . " " . trans('global.list'));

        $countries = Country::orderBy("name", "ASC")->get()->toArray();

        return view('template.admin.transactions.rakuten_index', compact('countries', 'columns'));
    }

    private function prepareListing(Request $request, array $actionData)
    {
        $queryData = $this->query($request);

        $data = $queryData['query']->map(function ($row) use ($actionData, $request) {
            $actionData['id'] = $row->id;
            return $this->prepareData($actionData, $row, $request);
        })->toArray();

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($queryData['total_data']),
            "recordsFiltered" => intval($queryData['total_filtered']),
            "data" => $data
        ]);
    }

    private function query(Request $request): Collection
    {
        $columns = $this->makeColumns();

        $limit = intval($request->input('length'));
        $start = intval($request->input('start'));
        $orderColumn = $columns[intval($request->input('order.0.column'))];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $country = $request->input('country');

        $customQuery = Transaction::with('website:id,name')
            ->select('transactions.*')
            ->when($country, function ($query, $country) {
                return $query->where('customer_country', $country);
            })
            ->where('paid_to_publisher', 0)
            ->where('source', Vars::RAKUTEN)
            ->whereNotNull('order_ref');

        $totalData = $customQuery->count();

        if ($search) {
            $customQuery->where(function ($query) use ($search) {
                $query->where('transaction_id', 'LIKE', "%{$search}%")
                    ->orWhere('advertiser_name', 'LIKE', "%{$search}%")
                    ->orWhere('transaction_date', 'LIKE', "%{$search}%")
                    ->orWhere('commission_status', 'LIKE', "%{$search}%")
                    ->orWhere('received_commission_amount_currency', 'LIKE', "%{$search}%")
                    ->orWhere('order_ref', 'LIKE', "%{$search}%")
                    ->orWhere('source', 'LIKE', "%{$search}%")
                    ->orWhereHas('website', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    });
            });
        }

        $totalFiltered = $customQuery->count();

        $query = $customQuery
            ->orderBy($orderColumn, $dir)
            ->offset($start)
            ->limit($limit)
            ->get();

        return collect([
            'total_filtered' => $totalFiltered,
            'total_data' => $totalData,
            'query' => $query,
        ]);
    }

    private function prepareData(array $actionData, $row, Request $request): array
    {
        $action = $this->prepareAction($actionData);

        return [
            'DT_RowId' => $row->id,
            'transaction_id' => (new HtmlString("<div class='text-center'>{$row->transaction_id}</div>"))->toHtml(),
            'order_ref' => (new HtmlString("<div class='text-center'>{$row->order_ref}</div>"))->toHtml(),
            'transaction_date' => (new HtmlString("<div class='text-center'>" . Carbon::parse($row->transaction_date)->format("Y-m-d H:i:s a") . "</div>"))->toHtml(),
            'advertiser_name' => $row->advertiser_name ?? "-",
            'publisher_domain' => $row->website->name ?? "-",
            'commission_status' => (new HtmlString("<div class='text-center'>" . ucwords($row->commission_status ?? "-") . "</div>"))->toHtml(),
            'commission_amount' => (new HtmlString("<div class='text-center'>{$row->commission_amount}</div>"))->toHtml(),
            'commission_amount_currency' => (new HtmlString("<div class='text-center'>{$row->commission_amount_currency}</div>"))->toHtml(),
            'received_commission_amount' => (new HtmlString("<div class='text-center'>{$row->received_commission_amount}</div>"))->toHtml(),
            'received_commission_amount_currency' => (new HtmlString("<div class='text-center'>{$row->received_commission_amount_currency}</div>"))->toHtml(),
            'sale_amount' => (new HtmlString("<div class='text-center'>{$row->sale_amount}</div>"))->toHtml(),
            'received_sale_amount' => (new HtmlString("<div class='text-center'>{$row->received_sale_amount}</div>"))->toHtml(),
            'action' => $action,
        ];
    }

    private function makeColumns(): array
    {
        return [
            "transaction_id",
            "order_ref",
            "transaction_date",
            "advertiser_name",
            "publisher_domain",
            "commission_status",
            "commission_amount",
            "commission_amount_currency",
            "received_commission_amount",
            "received_commission_amount_currency",
            "sale_amount",
            "received_sale_amount",
            "id"
        ];
    }
}
