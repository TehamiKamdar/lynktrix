<?php

namespace App\Service\Admin\Statistics\Deeplink;

use App\Models\DeeplinkTracking;
use App\Models\DeeplinkTrackingDetail;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ShowService
{
    public function init(Request $request, DeeplinkTracking $deeplink)
    {
        if($request->ajax())
        {
            // EDIT
            $editGate      = '';

            // VIEW
            $viewGate      = '';

            // DELETE
            $deleteGate    = '';

            // PERMISSIONS
            $crudRoutePart = 'admin.statistics.links';

            return $this->showGridPrepareListing($request, $deeplink);
        }

        SEOMeta::setTitle(trans('global.show') . " " . trans('advertiser.api-advertiser.title_singular'));

        $this->loadAdvertiser($deeplink);
        $this->loadPublisher($deeplink);
        $this->loadWebsite($deeplink);

        return view('template.admin.statistics.deep_links.show', compact('deeplink'));

    }

    public function loadAdvertiser($link)
    {
        return $link->load("advertiser");
    }

    public function loadPublisher($link)
    {
        return $link->load("publisher");
    }

    public function loadWebsite($link)
    {
        return $link->load("website");
    }

    private function showGridPrepareListing(Request $request, DeeplinkTracking $deeplink)
    {

        $queryData = $this->showGridQuery($request, $deeplink);

        $data = [];
        foreach ($queryData['query'] as $row)
        {
            $data[] = $this->showGridPrepareData($row);
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

    private function showGridQuery(Request $request, DeeplinkTracking $deeplink): Collection
    {
        // COLUMN NAMES
        $columns = array(
            "ip_address",
            "operating_system",
            "browser",
            "device",
            "referer_url",
            "country",
            "iso2",
            "region",
            "city",
            "zipcode",
            "created_at",
            "id"
        );

        // REQUEST VARIABLES
        $limit = $request->input('length');
        $start = $request->input('start');
        $dir = $request->input('order.0.dir');
        $order = $columns[$request->input('order.0.column')];
        $search = $request->input('search.value');

        // DEFINE
        $customQuery = DeeplinkTrackingDetail::select("*")->where("tracking_id", $deeplink->id);

        // COUNT
        $totalData = $customQuery->count();

        // IF SEARCH
        if(!empty($search))
        {

            // THIS QUERY ONLY COUNT
            $totalFilteredQuery = $customQuery->where('name','LIKE',"%{$search}%");

            // THIS QUERY GET RECORDS
            $query = $customQuery->where('name','LIKE',"%{$search}%");

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

    private function showGridPrepareData($row): array
    {
        // KEY
        $nestedData['ip_address'] = $row->ip_address;

        // VALUE
        $nestedData['operating_system'] = $row->operating_system;

        // KEY
        $nestedData['browser'] = $row->browser;

        // KEY
        $nestedData['device'] = $row->device;

        // ACTIONS
        $nestedData['referer_url'] = $row->referer_url;

        // ACTIONS
        $nestedData['country'] = $row->country;

        // ACTIONS
        $nestedData['iso2'] = $row->iso2;

        // ACTIONS
        $nestedData['region'] = $row->region;

        // ACTIONS
        $nestedData['city'] = $row->city;

        // ACTIONS
        $nestedData['zipcode'] = $row->zipcode;

        // ACTIONS
        $nestedData['created_at'] = Carbon::parse($row->created_at)->format("Y-m-d H:i:s");

        return $nestedData;
    }
}
