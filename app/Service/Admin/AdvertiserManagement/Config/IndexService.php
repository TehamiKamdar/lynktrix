<?php

namespace App\Service\Admin\AdvertiserManagement\Config;

use App\Models\AdvertiserConfig;
use App\Models\Country;
use App\Models\Role;
use App\Traits\Action;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class IndexService
{
    use Action;

    public function init(Request $request)
    {

        if ($request->ajax()) {

            // EDIT
            $editGate      = 'crm_advertiser_configuration_edit';

            // VIEW
            $viewGate      = 'crm_advertiser_configuration_show';

            // DELETE
            $deleteGate    = 'crm_advertiser_configuration_delete';

            // PERMISSIONS
            $crudRoutePart = 'admin.settings.advertiser-configs';

            $actionData = [
                "crud_part" => $crudRoutePart,
                "view" => $viewGate,
                "edit" => $editGate,
                "delete" => $deleteGate
            ];

            return $this->prepareListing($request, $actionData);

        }

        SEOMeta::setTitle(trans('advertiser.advertiser_configuration.title') . " " . trans('global.list'));

        return view("template.admin.settings.advertiser_config.index");

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
            'id',
            'name',
            'key',
            'value'
        );

        // REQUEST VARIABLES
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        // DEFINE
        $customQuery = AdvertiserConfig::select("*");

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

    private function prepareData($actionData, $row): array
    {
        $action = $this->prepareAction($actionData);

        // ID
        $nestedData['DT_RowId'] = $row->id;

        // ID
        $nestedData['id'] = null;

        // NAME
        $nestedData['name'] = $row->name;

        // KEY
        $nestedData['key'] = $row->key;

        // VALUE
        $nestedData['value'] = Str::limit($row->value, 50, ' (...)');

        // ACTIONS
        $nestedData['action'] = $action;

        return $nestedData;
    }
}
