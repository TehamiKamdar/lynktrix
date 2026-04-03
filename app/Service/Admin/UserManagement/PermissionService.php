<?php

namespace App\Service\Admin\UserManagement;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;
use App\Traits\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class PermissionService
{
    use Action;

    public function index(Request $request)
    {
        // EDIT
        $editGate      = 'permissions_show';

        // VIEW
        $viewGate      = 'permissions_edit';

        // DELETE
        $deleteGate    = 'permissions_delete';

        // PERMISSIONS
        $crudRoutePart = 'admin.user-management.permissions';

        $actionData = [
            "crud_part" => $crudRoutePart,
            "view" => $viewGate,
            "edit" => $editGate,
            "delete" => $deleteGate
        ];

        return $this->prepareListing($request, $actionData);

    }

    public function store(StorePermissionRequest $request)
    {

        try {

            Permission::create($request->validated());

            $response = [
                "type" => "success",
                "message" => "Permission Successfully Added."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return $response;

    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {

        try {

            $permission->update($request->validated());

            $response = [
                "type" => "success",
                "message" => "Permission Successfully Updated."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return $response;

    }

    public function delete(Permission $permission)
    {
        try {

            $permission->delete();

            $response = [
                "type" => "success",
                "message" => "Permission Successfully deleted."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return $response;
    }

    public function deleteMultiple()
    {
        Permission::whereIn('id', request('ids'))->delete();
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
            'title'
        );

        // REQUEST VARIABLES
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        // DEFINE
        $customQuery = Permission::select("*");

        // COUNT
        $totalData = $customQuery->count();

        // IF SEARCH
        if(!empty($search))
        {

            // THIS QUERY ONLY COUNT
            $totalFilteredQuery = $customQuery->where('title','LIKE',"%{$search}%");

            // THIS QUERY GET RECORDS
            $query = $customQuery->where('title','LIKE',"%{$search}%");

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

        // EMPTY
        $nestedData['id'] = null;

        // NAME
        $nestedData['title'] = $row->title;

        // ACTIONS
        $nestedData['action'] = $action;

        return $nestedData;
    }
}
