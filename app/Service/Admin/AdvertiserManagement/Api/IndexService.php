<?php

namespace App\Service\Admin\AdvertiserManagement\Api;

use App\Models\Advertiser;
use App\Models\Country;
use App\Traits\Action;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class IndexService
{
    use Action;

    public function init(Request $request)
    {
        if($request->ajax())
        {
            // EDIT
            $editGate      = 'crm_api_advertiser_edit';

            // VIEW
            $viewGate      = 'crm_api_advertiser_show';

            // DELETE
            $deleteGate    = 'crm_api_advertiser_delete';

            // PERMISSIONS
            $crudRoutePart = 'admin.advertiser-management.api-advertisers';

            $actionData = [
                "crud_part" => $crudRoutePart,
                "view" => $viewGate,
                "edit" => $editGate,
                "delete" => $deleteGate,
            ];

            return $this->prepareListing($request, $actionData);
        }

        SEOMeta::setTitle(trans('advertiser.api-advertiser.title') . " " . trans('global.list'));

        $countries = Country::orderBy("name", "ASC")->get()->toArray();

        return view('template.admin.advertisers.api.index', compact('countries'));

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
        try {
            // COLUMN NAMES
            $columns = array(
                "advertiser_id",
                "name",
                "url",
                "source",
                "click_through_url"
            );

            // REQUEST VARIABLES
            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');
            $search = $request->input('search.value');

            // DEFINE
            $customQuery = Advertiser::select("*")->where("type", Advertiser::API);

             $status = $request->input('status');
            if($status != '')
                $customQuery = $customQuery->where("is_active", $status);

            $manualUpdate = $request->input('manual_update');
            if(!empty($manualUpdate) && $manualUpdate == "Yes")
                $customQuery = $customQuery->whereNotNull("description");
            elseif(!empty($manualUpdate) && $manualUpdate == "No")
                $customQuery = $customQuery->whereNull("description");

            $source = $request->input('source');
            if(!empty($source))
                $customQuery = $customQuery->where("source", $source);

            $country = $request->input('country');
            if(!empty($country))
                $customQuery = $customQuery->where("primary_regions", "LIKE", "%$country%");

             

            // COUNT
            $totalData = $customQuery->count();

            // IF SEARCH
            if(!empty($search))
            {

                // THIS QUERY ONLY COUNT
                $totalFilteredQuery = $customQuery->where(function($query) use ($search) {
                    $query->orWhere('name','LIKE',"%{$search}%")
                        ->orWhere('url','LIKE',"%{$search}%");
                });

                // THIS QUERY GET RECORDS
                $query = $customQuery->where(function($query) use ($search) {
                    $query->orWhere('name','LIKE',"%{$search}%")
                        ->orWhere('url','LIKE',"%{$search}%");
                });;

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
        } catch (\Exception $exception)
        {
            dd($exception);
        }
    }

    private function prepareData($actionData, $row): array
    {
        $action = $this->prepareAction($actionData);

        try {
            // ADVERTISER ID
            $aid = $row->advertiser_id;
            $aid = new HtmlString("<div class='text-center'>{$aid}</div>");
            $nestedData['advertiser_id'] = $aid->toHtml();

            // NAME
            $nestedData['name'] = $row->name ? Str::limit($row->name, 60, $end='...') : null;

              $nestedData['commission'] = $row->commission ?  $row->commission : 'RevShare 80';

              $nestedData['commission_type'] = $row->commission_type ?  $row->commission_type : '%';


            $url = "-";
            $href = "-";
            if(isset($row->url)):
                $url = $row->url;
                $href = route("redirect.url") . "?url=" . urlencode($url);
            endif;
            // URL
            $htmlURL = null;
            if($url)
            {
                $url = Str::limit($url, 60, $end='...');
                $url = new HtmlString("<a href='{$href}' target='_blank'>{$url}</a>");
                $htmlURL = $url->toHtml();
            }
            $nestedData['url'] = $htmlURL;

            // URL
            $source = strtoupper($row->source);
            $source = new HtmlString("<div class='text-center'><span class='badge badge-danger'>{$source}</span></div>");
            $nestedData['source'] = $source->toHtml();

            // MANUAL UPDATE
            $update = ($row->description && count($row->categories ?? [])) ? "Yes" : "No";
            $class = $update == "Yes" ? "info" : "warning";
            $update = new HtmlString("<div class='text-center'><span class='badge badge-{$class}'>{$update}</span></div>");
            $nestedData['manual_update'] = $update->toHtml();

            // MANUAL UPDATE
            $update = ($row->click_through_url) ? "Yes" : "No";
            $class = $update == "Yes" ? "success" : "danger";
            $update = new HtmlString("<div class='text-center'><span class='badge badge-{$class}'>{$update}</span></div>");
            $nestedData['click_through_url'] = $update->toHtml();

            // ACTIONS
            $nestedData['action'] = $action;

        } catch (\Exception $exception)
        {
            dd($exception);
        }

        return $nestedData;
    }
}
