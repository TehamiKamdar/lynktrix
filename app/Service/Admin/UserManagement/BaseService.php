<?php

namespace App\Service\Admin\UserManagement;
use App\Models\User;
use App\Traits\Action;
use App\Traits\JobTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\HtmlString;

class BaseService
{
    use Action, JobTrait;

    public function prepareListing($request, $exclude, $actionData, $userStatus = null)
    {
        $queryData = $this->userQuery($request, $exclude, $userStatus);

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

    private function userQuery(Request $request, $exclude, $userStatus = null): Collection
    {
        // COLUMN NAMES
        $columns = array(
            'created_at',
            'sid',
            'first_name',
            'last_name',
            'user_name',
            'email',
            'status',
            'id',
        );

        // REQUEST VARIABLES
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        // DEFINE
        $customQuery = User::select('id', 'sid', 'first_name', 'last_name', 'user_name', 'email', 'status', 'created_at');

        $customQuery = $customQuery->whereHas('roles', function ($query) use($exclude) {
            $query->whereNotIn('title', $exclude);
        });

        if($userStatus)
        {
            // THIS QUERY GET RECORDS
            $customQuery = $customQuery->where('status', $userStatus);
        }

        // COUNT
        $totalData = $customQuery->count();

        // IF SEARCH
        if(!empty($search))
        {

            // THIS QUERY ONLY COUNT
            $totalFilteredQuery = $customQuery
                ->where(function($query) use ($search) {
                    $query
                        ->orWhere(DB::raw('CONCAT_WS(" ", first_name, last_name)'), 'like', "%{$search}%")
                        ->orWhere('sid', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('user_name', 'like', "%{$search}%");
                });

            // THIS QUERY GET RECORDS
            $query = $customQuery
                ->where(function($query) use ($search) {
                    $query
                        ->orWhere(DB::raw('CONCAT_WS(" ", first_name, last_name)'), 'like', "%{$search}%")
                        ->orWhere('sid', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('user_name', 'like', "%{$search}%");
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

        // PUBLISHER ID
        $nestedData['created_at'] = Carbon::parse($row->created_at)->format("Y-m-d H:i:s");

        // NAME
        $nestedData['sid'] = $row->sid;


        // NAME
        $nestedData['first_name'] = $row->first_name;

        // NAME
        $nestedData['last_name'] = $row->last_name;

        // NAME
        $nestedData['user_name'] = $row->user_name;

        // EMAIL
        $nestedData['email'] = $row->email;

        // STATUS
        $status = $row->status;
        $class = $status == "active" ? "badge-success" : (($status == "pending") ? "badge-warning active" : (($status == "hold") ? "badge-dark" : "badge-danger"));
        $nestedData['status'] = "<span class='badge {$class}'>".ucwords($status)."</span>";
        $nestedData['access_login'] = auth()->user()->getStaffNotAllowed() ? "<a href='javascript:void(0)' onclick='goToLogin(`{$row->email}`)' class='btn btn-xs btn-primary'>Go to Login</a>" : "-";

        // ACTIONS
        $nestedData['action'] = $action;

        return $nestedData;
    }
}
