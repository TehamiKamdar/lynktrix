<?php

namespace App\Service\Admin\UserManagement;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;

class RoleService
{
    use Action;

    public function index(Request $request)
    {
        // VIEW
        $viewGate      = 'roles_show';

        // EDIT
        $editGate      = 'roles_edit';

        // DELETE
        $deleteGate    = 'roles_delete';

        // PERMISSIONS
        $crudRoutePart = 'admin.user-management.roles';

        $actionData = [
            "crud_part" => $crudRoutePart,
            "view" => $viewGate,
            "edit" => $editGate,
            "delete" => $deleteGate
        ];

        return $this->prepareListing($request, $actionData);

        if ($request->ajax()) {

            // COLUMN NAMES
            $columns = array(
                'id',
                'title',
                'permissions'
            );

            // REQUEST VARIABLES
            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');
            $search = $request->input('search.value');

            // DEFINE
            $customQuery = new Role();

            // COUNT
            $totalData = $customQuery->count();

            $customQuery = $customQuery->with('permissions');

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

            // VIEW
            $viewGate      = 'roles_show';

            // EDIT
            $editGate      = 'roles_edit';

            // DELETE
            $deleteGate    = 'roles_delete';

            // PERMISSIONS
            $crudRoutePart = 'admin.user-management.roles';

            $data = array();

            // IF EMPTY QUERY
            if(!empty($query))
            {
                // EXTRACT ARRAY
                foreach ($query as $row)
                {
                    $actionData['id'] = $row->id;
                    $data[] = $this->prepareData($actionData, $row);
                }
            }

            // COMPILE DATA
            $json_data = array(
                "draw"            => intval($request->input('draw')),
                "recordsTotal"    => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data"            => $data
            );

            // RETURN RESPONSE
            return response()->json($json_data);

        }
    }

    public function store(StoreRoleRequest $request)
    {

        try {

            $role = Role::create($request->validated());
            $role->permissions()->sync($request->input('permissions', []));

            $response = [
                "type" => "success",
                "message" => "Role Successfully Added."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return $response;

    }

    public function update(UpdateRoleRequest $request, Role $role)
    {

        try {

            $role->update($request->validated());
            $role->permissions()->sync($request->input('permissions', []));

            $response = [
                "type" => "success",
                "message" => "Role Successfully Updated."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return $response;

    }

    public function delete(Role $role)
    {
        try {

            $role->delete();

            $response = [
                "type" => "success",
                "message" => "Role Successfully deleted."
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
        Role::whereIn('id', request('ids'))->delete();
    }

    public function getPermissions()
    {
        return Permission::all()->pluck('title', 'id');
    }

    public function loadPermissions(Role $role)
    {
        return $role->load('permissions:id,title');
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
            'title',
            'permissions'
        );

        // REQUEST VARIABLES
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        // DEFINE
        $customQuery = new Role();

        // COUNT
        $totalData = $customQuery->count();

        $customQuery = $customQuery->with('permissions');

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

    private function prepareData($actionData, $row)
    {
        $action = $this->prepareAction($actionData);

        // EMPTY
        $nestedData['id'] = null;

        // TITLE
        $nestedData['title'] = $row->title;

        // PERMISSIONS
        $permissions = "N/A";
        if ($row->permissions->count())
        {
            $permissions = '<span class="badge badge-info m-1">' . implode('</span> <span class="badge badge-info m-1">', $row->permissions->pluck('title')->toArray()) . '</span>';
        }

        $nestedData['permissions'] = $permissions;

        // ACTIONS
        $nestedData['action'] = $action;

        return $nestedData;
    }
}
