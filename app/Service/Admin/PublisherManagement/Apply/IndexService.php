<?php

namespace App\Service\Admin\PublisherManagement\Apply;

use App\Enums\Status;
use App\Helper\Static\Vars;
use App\Models\AdvertiserApply;
use App\Models\Country;
use App\Traits\Action;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class IndexService
{
    public function init(Request $request, Status $status)
    {
        if($request->ajax())
        {
// EDIT
//        $editGate      = 'crm_approval_advertiser_edit';
            $editGate      = '';

            // VIEW
            $viewGate      = 'crm_approval_advertiser_show';

            // DELETE
            $deleteGate    = 'crm_approval_advertiser_delete';

            // PERMISSIONS
            $crudRoutePart = 'admin.approval';

            $actionData = [
                "crud_part" => $crudRoutePart,
                "view" => $viewGate,
                "edit" => $editGate,
                "delete" => $deleteGate,
                "status" => $status->value
            ];

            return $this->prepareListing($request, $actionData, $status);
        }

        SEOMeta::setTitle(trans('advertiser.approval.title') . " " . trans('global.list'));
        $countries = Country::orderBy("name", "ASC")->get()->toArray();
        return view('template.admin.advertisers.apply.index', compact('countries', 'status'));
    }

    private function prepareListing(Request $request, $actionData, Status $status)
    {
        $queryData = $this->query($request, $status);

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

    private function query(Request $request, Status $status): Collection
    {
        $search = $request->input('search.value', '');
$status = $status->value;

$orderColumnIndex = intval($request->input('order.0.column', 0));
$columns = [
    "id", "created_at", "source", "advertiser_sid", 
    "advertiser_name", "publisher_website",    "advertisers.primary_regions",
    "advertiser_applies.type",
    "advertiser_applies.on_demand_status"
];
$order = $columns[$request->input('order.0.column', 0)];
$dir = $request->input('order.0.dir');
$limit = intval($request->input('length', 10));
$start = intval($request->input('start', 0));
$source = $request->input('source');
$country = $request->input('country');
$on_demand_status = $request->input('on_demand_status');
$query = "
    WITH filtered_data AS (
        SELECT 
            w.url AS website_url,
            a.primary_regions,
            advertiser_applies.*
        FROM advertiser_applies
        JOIN websites w ON w.id = advertiser_applies.website_id
        JOIN advertisers a ON a.id = advertiser_applies.internal_advertiser_id
        WHERE advertiser_applies.status = ? 
        AND (
            ? IS NULL OR ? = '' OR
            advertiser_applies.advertiser_name LIKE CONCAT('%', ?, '%') OR
            advertiser_applies.source LIKE CONCAT('%', ?, '%') OR
            w.url LIKE CONCAT('%', ?, '%') OR
            a.primary_regions LIKE CONCAT('%', ?, '%')
        )
";

$params = [
    $status, 
    $search, $search, $search, $search, $search, $search
];

// Dynamically add filters
if ($source) {
    $query .= " AND advertiser_applies.source LIKE ? ";
    $params[] = "%$source%";
}

if ($country) {
    $query .= " AND a.primary_regions LIKE ? ";
    $params[] = "%$country%";
}

if ($on_demand_status) {
    $query .= " AND advertiser_applies.on_demand_status = ? ";
    $params[] = ($on_demand_status === "not_active") ? Vars::ADVERTISER_STATUS_PENDING : Vars::ADVERTISER_STATUS_ACTIVE;
}

$query .= "
    ),
    total_counts AS (
        SELECT COUNT(*) AS total_data FROM advertiser_applies WHERE status = ?
    ),
    filtered_counts AS (
        SELECT COUNT(*) AS total_filtered FROM filtered_data
    )
    SELECT fd.*, tc.total_data, fc.total_filtered
    FROM filtered_data fd
    JOIN total_counts tc ON 1=1
    JOIN filtered_counts fc ON 1=1
    LIMIT ? OFFSET ?
";

$params[] = $status;  
$params[] = $limit;   
$params[] = $start;   

// Execute query
$results = DB::select($query, $params);


return collect([
    'total_data' => $results[0]->total_data ?? 0,
    'total_filtered' => $results[0]->total_filtered ?? 0,
    'query' => $results
]);
    }
    
    

    private function prepareData($actionData, $row): array
    {
        $action = $this->prepareAction($actionData);

        // PUBLISHER ID
        $nestedData['DT_RowId'] = $row->id;

        // ADVERTISER NAME
        $nestedData['id'] = null;

        $nestedData['created_at'] = Carbon::parse($row->created_at)->format("Y-m-d h:i:s a");

        // ADVERTISER NAME
        $nestedData['source'] = $row->source ?? "-";

        // ADVERTISER NAME
        $nestedData['advertiser_sid'] = $row->advertiser_sid;

        // ADVERTISER NAME
        $nestedData['advertiser_name'] = Str::limit($row->advertiser_name, 60, $end='...');

        // PUBLISHER NAME
        $url = $row->website_url;
        $url = new HtmlString("<a href='{$url}' target='_blank'>{$url}</a>");
        $nestedData['publisher_website'] = $url->toHtml();

        $regions = @json_decode($row->primary_regions, true);
        if(is_array($regions) && count($regions) > 1) {
            $regions = "Multi";
        } elseif (is_array($regions) && count($regions) == 1 && $regions[0] == "00") {
            $regions = "All";
        } elseif (is_array($regions) && count($regions) == 1) {
            $regions = $regions[0];
        } elseif ($row->primary_regions) {
            $regions = $row->primary_regions;
        } else {
            $regions = "-";
        }

        // PUBLISHER NAME
        $nestedData['primary_region'] = $regions;

        // REGION
        $type = strtoupper($row->type ?? "-");
        $type = new HtmlString("<div class='text-center'>{$type}</div>");
        $nestedData['type'] = $type->toHtml();

        // PUBLISHER NAME
        $nestedData['on_demand_status'] = $row->on_demand_status == Vars::ADVERTISER_STATUS_PENDING ? "Not Active" : "Active";

        // ACTIONS
        $nestedData['action'] = $action;

        return $nestedData;
    }
    public function prepareAction($data)
    {
        $crudRoutePart = $data['crud_part'];
        $id = $data['id'];
        $viewGate = $data['view'] ?? null;
        $editGate = $data['edit'] ?? null;
        $deleteGate = $data['delete'] ?? null;
        $status = $data['status'] ?? null;
        $action = "<ul class='orderDatatable_actions mb-0 d-flex justify-content-around'>";

        // VIEW BUTTON
        if(!empty($viewGate) && Gate::allowIf("$viewGate")) {

            if($status) {
                $viewURL = route("$crudRoutePart.show", ['approval' => $id, 'status' => $status]);
            } else {
                $viewURL = route("$crudRoutePart.show", $id);
            }

            // VIEW BUTTON
            $show =  '<li>
                          <a class="view" href="'.$viewURL.'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                          </a>
                      </li>';
            $action .= $show . " ";
        }

        $action .= "</ul>";

        return $action;
    }
}
