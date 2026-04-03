<?php

namespace App\Service\Admin\AdvertiserManagement\Api;

use App\Enums\ProviderAdvertiserDeleteType;
use App\Enums\Status;
use App\Helper\Static\Methods;
use App\Helper\Static\Vars;
use App\Models\Advertiser;
use App\Models\AdvertiserApply;
use App\Models\Country;
use App\Models\FetchDailyData;
use App\Models\GenerateLink as GenerateLinkModel;
use App\Models\User;
use App\Traits\Main;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ManualApprovalNetworkHoldNActiveAdvertiserService
{
    use Main;

    public function getManualApprovalNetworkAdvertiserView(ProviderAdvertiserDeleteType $type, Request $request)
    {

        abort_if(Gate::denies('admin_provider_advertisers_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($type == ProviderAdvertiserDeleteType::HOLD)
        {
            abort_if(Gate::denies('admin_hold_provider_advertisers_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        elseif($type == ProviderAdvertiserDeleteType::ACTIVE)
        {
            abort_if(Gate::denies('admin_active_provider_advertisers_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

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
            $crudRoutePart = 'admin.manual_approval_advertiser_is_delete_from_network';

            $actionData = [
                "crud_part" => $crudRoutePart,
                "view" => $viewGate,
                "edit" => $editGate,
                "delete" => $deleteGate,
            ];

            return $this->prepareListing($request, $actionData, $type);
        }

        SEOMeta::setTitle(trans('advertiser.manual_approval_advertiser_is_delete_from_network.title') . " " . trans('global.list'));
        $networks = Vars::OPTION_LIST;
        $publishers = User::whereType(User::PUBLISHER)->whereStatus(User::ACTIVE)->get();
        $countries = Country::orderBy("name", "ASC")->get()->toArray();
        return view('template.admin.advertisers.manual_approval_network_advertiser.advertiser', compact('networks', 'publishers', 'countries', 'type'));

    }

    public function storeManualApprovalNetworkAdvertiserData(Request $request) {

        try {

            Advertiser::whereIn("id", $request->ids)->update([
                "is_request__process" => 1
            ]);

            $isAvailable = Advertiser::AVAILABLE;
            if($request->status == AdvertiserApply::STATUS_HOLD)
            {
                $this->manualAdvertiserOnHold(Vars::ADMIN_WORK, $request->ids);
                $isAvailable = Advertiser::NOT_AVAILABLE;
            }
            elseif($request->status == AdvertiserApply::STATUS_ACTIVE)
            {
                $this->manualAdvertiserOnActive(Vars::ADMIN_WORK, $request->ids);
            }
            elseif($request->status == AdvertiserApply::STATUS_HOLD_CANCEL)
            {
                $this->manualAdvertiserOnCancel(Vars::ADMIN_WORK, $request->ids, AdvertiserApply::STATUS_HOLD_CANCEL);
            }
            elseif($request->status == AdvertiserApply::STATUS_ACTIVE_CANCEL)
            {
                $this->manualAdvertiserOnCancel(Vars::ADMIN_WORK, $request->ids, AdvertiserApply::STATUS_ACTIVE_CANCEL);
                $isAvailable = Advertiser::NOT_AVAILABLE;
            }

            foreach ($request->ids as $id)
            {
                $advertiser = Advertiser::where("id", $id)->first();

                FetchDailyData::updateOrCreate([
                    "path" => "SyncAdvertiserStatusJob",
                    "process_date" => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
                    "advertiser_id" => $id,
                    "queue" => Vars::ADMIN_WORK,
                    "source" => Vars::GLOBAL
                ], [
                    "name" => "Sync User Job for API Server",
                    "payload" => json_encode([
                        'status' => $isAvailable,
                        'is_available' => $isAvailable,
                        'advertiser_id' => $advertiser->advertiser_id,
                        'source' => $advertiser->source,
                    ]),
                    "date" => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
                ]);
            }

            $response = [
                "type" => "success",
                "message" => "Manual Joined Data Successfully Updated."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return redirect()->route('admin.advertiser-management.manual_join_publisher')->with($response['type'], $response['message']);
    }

    public function manualAdvertiserOnHold($queue, $ids)
    {
        $source = Vars::GLOBAL;

        FetchDailyData::updateOrCreate([
            "path" => "ManualApprovalNetworkHoldAdvertiser",
            "process_date" => now()->format(Vars::CUSTOM_DATE_FORMAT_3),
            "source" => $source,
            "queue" => $queue,
            "type" => Vars::ADVERTISER_DETAIL
        ], [
            "name" => "Manual Approval Network Hold Advertiser",
            "payload" => json_encode(['ids' => $ids]),
            "date" => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
            "sort" => $this->setSortingFetchDailyData($source),
            "status" => 1,
            "is_processing" => 0
        ]);
    }

    public function manualAdvertiserOnActive($queue, $ids)
    {
        $source = Vars::GLOBAL;

        FetchDailyData::updateOrCreate([
            "path" => "ManualApprovalNetworkActiveAdvertiser",
            "process_date" => now()->format(Vars::CUSTOM_DATE_FORMAT_3),
            "source" => $source,
            "queue" => $queue,
            "type" => Vars::ADVERTISER_DETAIL
        ], [
            "name" => "Manual Approval Network Active Advertiser",
            "payload" => json_encode(['ids' => $ids]),
            "date" => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
            "sort" => $this->setSortingFetchDailyData($source),
            "status" => 1,
            "is_processing" => 0
        ]);
    }

    public function manualAdvertiserOnCancel($queue, $ids, $type)
    {
        $source = Vars::GLOBAL;

        FetchDailyData::updateOrCreate([
            "path" => "ManualApprovalNetworkCancelAdvertiser",
            "process_date" => now()->format(Vars::CUSTOM_DATE_FORMAT_3),
            "source" => $source,
            "queue" => $queue,
            "type" => Vars::ADVERTISER_DETAIL
        ], [
            "name" => "Manual Approval Network Cancel Advertiser",
            "payload" => json_encode(['ids' => $ids, 'type' => $type]),
            "date" => now()->format(Vars::CUSTOM_DATE_FORMAT_2),
            "sort" => $this->setSortingFetchDailyData($source),
            "status" => 1,
            "is_processing" => 0
        ]);
    }

    private function prepareListing(Request $request, $actionData, ProviderAdvertiserDeleteType $type)
    {
        $queryData = $this->query($request, $type);

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

    private function query(Request $request, ProviderAdvertiserDeleteType $type): Collection
    {
        // COLUMN NAMES
        $columns = array(
            "",
            "id",
            "created_at",
            "source",
            "advertiser_id",
            "sid",
            "name",
            "primary_regions",
            "type"
        );

        // REQUEST VARIABLES
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        // DEFINE
        $customQuery = Advertiser::select([
            "id",
            "created_at",
            "source",
            "advertiser_id",
            "sid",
            "name",
            "primary_regions",
            "type"
        ]);

        $customQuery = $customQuery->where('is_request__process', 0);

        if($type->value == "hold")
        {
            $customQuery = $customQuery->where('is_available', Vars::ADVERTISER_NOT_AVAILABLE)->where("status", Vars::ADVERTISER_STATUS_ACTIVE);
        }
        elseif($type->value == "active")
        {
            $customQuery = $customQuery->where('is_available', Vars::ADVERTISER_AVAILABLE)->where("status", Vars::ADVERTISER_STATUS_NOT_FOUND);
        }

        // COUNT
        $totalData = $customQuery->count();

        if($request->source)
        {
            $customQuery = $customQuery->where('source','LIKE',"%{$request->source}%");
        }

        if($request->country)
        {
            $customQuery = $customQuery->where('primary_regions','LIKE',"%{$request->country}%");
        }

        // IF SEARCH
        if(!empty($search))
        {

            // THIS QUERY ONLY COUNT
            $totalFilteredQuery = $customQuery;

            // THIS QUERY GET RECORDS
            $query = $customQuery->where(function ($query) use ($search) {
                $query->orWhere('name','LIKE',"%{$search}%")
                    ->orWhere('source','LIKE',"%{$search}%")
                    ->orWhere('advertiser_id','LIKE',"%{$search}%")
                    ->orWhere('sid','LIKE',"%{$search}%")
                    ->orWhere("primary_regions", "LIKE", "%{$search}%");
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

        $nestedData['created_at'] = Carbon::parse($row->created_at)->format("Y-m-d h:i:s a");

        // ADVERTISER NAME
        $nestedData['source'] = $row->source ?? "-";

        // ADVERTISER NAME
        $nestedData['advertiser_id'] = $row->advertiser_id;

        // ADVERTISER NAME
        $nestedData['sid'] = $row->sid ?? "-";

        // ADVERTISER NAME
        $nestedData['name'] = Str::limit($row->name, 60, $end='...');

        $regions = "-";
        if($row->primary_regions)
        {
            $regions = is_string($row->primary_regions) ? @json_decode($row->primary_regions, true) : $row->primary_regions;
            if(is_array($regions) && count($regions) > 1) {
                $regions = "Multi";
            } elseif (is_array($regions) && count($regions) == 1 && $regions[0] == "00") {
                $regions = "All";
            } elseif (is_array($regions) && count($regions) == 1) {
                $regions = $regions[0];
            } elseif ($row->primary_regions) {
                $regions = $row->primary_regions;
            }
        }

        // PUBLISHER NAME
        $nestedData['primary_regions'] = $regions;

        // REGION
        $type = strtoupper($row->type ?? "-");
        $type = new HtmlString("<div class='text-center'>{$type}</div>");
        $nestedData['type'] = $type->toHtml();

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
        $type = $data['status'] ?? null;
//        $action = "<ul class='orderDatatable_actions mb-0 d-flex justify-content-around'>";
//
//        // VIEW BUTTON
//        $viewURL = route("admin.approval.show", $id);
//
//        // VIEW BUTTON
//        $show =  '<li>
//                          <a class="view" href="'.$viewURL.'">
//                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
//                          </a>
//                      </li>';
//        $action .= $show . " ";
//
//        $action .= "</ul>";

//        return $action;

        return null;

    }
}
