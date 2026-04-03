<?php

namespace App\Service\Admin\CreativeManagement\Coupon;

use App\Enums\Status;
use App\Models\Coupon;
use App\Traits\Action;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class IndexService
{
    use Action;

    public function init(Request $request)
    {
        if ($request->ajax()) {

            // VIEW
            $viewGate      = 'publishers_show';

            // DELETE
            $deleteGate    = 'publishers_delete';

            // PERMISSIONS
            $crudRoutePart = 'admin.creative-management.coupons';

            $actionData = [
                "crud_part" => $crudRoutePart,
                "view" => $viewGate,
                "edit" => null,
                "delete" => $deleteGate
            ];

            return $this->prepareListing($request, $actionData);

        }

        SEOMeta::setTitle(trans('cruds.publisher.title') . " " . trans('global.list'));

        return view('template.admin.coupons.index');
    }

    private function prepareListing(Request $request, $actionData)
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
            "id",
            "advertiser_name",
            "title",
            "start_date",
            "end_date",
            "source",
        );

        // REQUEST VARIABLES
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        // DEFINE
        $customQuery = new Coupon();

        // COUNT
        $totalData = $customQuery->count();

        // IF SEARCH
        if(!empty($search))
        {

            // THIS QUERY ONLY COUNT
            $totalFilteredQuery = $customQuery->where(function ($query) use ($search) {
                $query->orWhere('advertiser_name','LIKE',"%{$search}%")
                    ->orWhere('title','LIKE',"%{$search}%");
            });;

            // THIS QUERY GET RECORDS
            $query = $customQuery->where(function ($query) use ($search) {
                $query->orWhere('advertiser_name','LIKE',"%{$search}%")
                    ->orWhere('title','LIKE',"%{$search}%");
            });

        } else {

            // THIS QUERY ONLY COUNT
            $totalFilteredQuery = $customQuery;

            // THIS QUERY GET RECORDS
            $query = $customQuery;

        }

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

        // PUBLISHER ID
        $nestedData['DT_RowId'] = $row->id;

        // ADVERTISER NAME
        $nestedData['id'] = null;

        $nestedData['advertiser_name'] = $row->advertiser_name;

        // ADVERTISER NAME
        $nestedData['title'] = $row->title;

        // ADVERTISER NAME
        $nestedData['start_date'] = Carbon::parse($row->start_date)->format("Y-m-d");

        // ADVERTISER NAME
        $nestedData['end_date'] = Carbon::parse($row->end_date)->format("Y-m-d");

        // PUBLISHER NAME
        $nestedData['source'] = $row->source;

        // ACTIONS
        $nestedData['action'] = $action;

        return $nestedData;
    }
}

