<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use App\Service\Admin\UserManagement\RoleService;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{
    protected object $service;
    public function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        abort_if(Gate::denies('admin_roles_users_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($request->ajax())
            return $this->service->index($request);

        SEOMeta::setTitle(trans('cruds.role.title') . " " . trans('global.list'));

        return view('template.admin.roles.index');
    }

    public function create()
    {
//        abort_if(Gate::denies('crm_role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->service;

        $permissions = $data->getPermissions();

        return view('template.admin.roles.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        $response = $this->service->store($request);

        return redirect()->route('admin.user-management.roles.index')->with($response['type'], $response['message']);
    }

    public function edit(Role $role)
    {
//        abort_if(Gate::denies('crm_role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->service;

        $permissions = $data->getPermissions();

        $this->service->loadPermissions($role);

        return view('template.admin.roles.edit', compact('permissions', 'role'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $response = $this->service->update($request, $role);

        return redirect()->route('admin.user-management.roles.index')->with($response['type'], $response['message']);;
    }

    public function show(Role $role)
    {
//        abort_if(Gate::denies('crm_role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->service->loadPermissions($role);

        SEOMeta::setTitle(trans('global.show') . " " . trans('cruds.role.title_singular'));

        return view('template.admin.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
//        abort_if(Gate::denies('crm_role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $response = $this->service->delete($role);

        return redirect()->route('admin.user-management.roles.index')->with($response['type'], $response['message']);
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        $this->service->deleteMultiple();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
