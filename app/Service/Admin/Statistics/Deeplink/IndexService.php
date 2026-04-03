<?php

namespace App\Service\Admin\Statistics\Deeplink;

use App\Models\DeeplinkTracking;
use App\Traits\Action;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class IndexService
{
    use Action;

    public function init(Request $request)
    {
        if($request->ajax())
        {
            // EDIT
            $editGate      = '';

            // VIEW
            $viewGate      = 'crm_statistics_deeplinks_show';

            // DELETE
            $deleteGate    = '';//'crm_statistics_deeplinks_delete';

            // PERMISSIONS
            $crudRoutePart = 'admin.statistics.deeplinks';

            $actionData = [
                "crud_part" => $crudRoutePart,
                "view" => $viewGate,
                "edit" => $editGate,
                "delete" => $deleteGate
            ];

            return $this->prepareListing($request, $actionData);
        }

        SEOMeta::setTitle(trans('link.statistics.links.deep_title') . " " . trans('global.list'));
        return view('template.admin.statistics.deep_links.index');

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
            DB::raw('CONCAT_WS(" ", users.first_name, users.last_name)'),
            'advertisers.name',
            'websites.name',
            'updated_at',
            'hits',
            'unique_visitor',
            'id'
        );

        // REQUEST VARIABLES
        $limit = $request->input('length');
        $start = $request->input('start');
        $dir = $request->input('order.0.dir');
        $order = $columns[$request->input('order.0.column')];
        $search = $request->input('search.value');

        // DEFINE
        $customQuery = DeeplinkTracking::select(["deeplink_trackings.id", "deeplink_trackings.advertiser_id", "advertisers.name as advertiser_name", "publisher_id", "users.first_name as first_name", "users.last_name as last_name", "website_id", "websites.name as website_name", "deeplink_trackings.updated_at", "deeplink_trackings.hits", "deeplink_trackings.unique_visitor"]);

        $customQuery = $customQuery
                                ->join("advertisers", "advertisers.id", "=", "deeplink_trackings.advertiser_id")
                                ->join("users", "users.id", "=", "deeplink_trackings.publisher_id")
                                ->join("websites", "websites.id", "=", "deeplink_trackings.website_id");

        // COUNT
        $totalData = $customQuery->count();

        // IF SEARCH
        if(!empty($search))
        {

            // THIS QUERY ONLY COUNT
            $totalFilteredQuery = $customQuery->where(function($query) use ($search) {
                $query
                    ->orWhere(DB::raw('CONCAT_WS(" ", users.first_name, users.last_name)'), 'like', "%{$search}%")
                    ->orWhere('advertisers.name', 'like', "%{$search}%")
                    ->orWhere('websites.name', 'like', "%{$search}%")
                    ->orWhere('deeplink_trackings.updated_at', 'like', "%{$search}%");
            });

            // THIS QUERY GET RECORDS
            $query = $customQuery->where(function($query) use ($search) {
                $query
                    ->orWhere(DB::raw('CONCAT_WS(" ", users.first_name, users.last_name)'), 'like', "%{$search}%")
                    ->orWhere('advertisers.name', 'like', "%{$search}%")
                    ->orWhere('websites.name', 'like', "%{$search}%")
                    ->orWhere('deeplink_trackings.updated_at', 'like', "%{$search}%");
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

        // NAME
        $nestedData['publisher_name'] = $row->first_name . " " . $row->last_name;

        // KEY
        $nestedData['advertiser_name'] = $row->advertiser_name;

        // VALUE
        $nestedData['website_name'] = $row->website_name;

        // KEY
        $nestedData['last_activity'] = Carbon::parse($row->updated_at)->format("Y-m-d h:i:s a");

        // KEY
        $nestedData['hits'] = $row->hits;

        // KEY
        $nestedData['unique_visitor'] = $row->unique_visitor;

        // ACTIONS
        $nestedData['action'] = $action;

        return $nestedData;
    }
}
