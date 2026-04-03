<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;
use App\Service\Admin\UserManagement\PermissionService;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class PermissionsController extends Controller
{
    protected object $service;
    public function __construct(PermissionService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request): View | JsonResponse
    {
        abort_if(Gate::denies('admin_permissions_users_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($request->ajax())
            return $this->service->index($request);

        SEOMeta::setTitle(trans('cruds.permission.title') . " " . trans('global.list'));

        return view('template.admin.permissions.index');
    }

    public function create()
    {
//        abort_if(Gate::denies('crm_permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('template.admin.permissions.create');
    }

    public function store(StorePermissionRequest $request)
    {
        $response = $this->service->store($request);

        return redirect()->route('admin.user-management.permissions.index')->with($response['type'], $response['message']);
    }

    public function edit(Permission $permission)
    {
//        abort_if(Gate::denies('crm_permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        SEOMeta::setTitle(trans('cruds.permission.title') . " " . trans('global.edit'));

        return view('template.admin.permissions.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $response = $this->service->update($request, $permission);

        return redirect()->route('admin.user-management.permissions.index')->with($response['type'], $response['message']);
    }

    public function show(Permission $permission)
    {
//        abort_if(Gate::denies('crm_permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        SEOMeta::setTitle(trans('global.show') . " " . trans('cruds.permission.title_singular'));

        return view('template.admin.permissions.show', compact('permission'));
    }

    public function destroy(Permission $permission)
    {
//        abort_if(Gate::denies('crm_permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $response = $this->service->delete($permission);

        return redirect()->route('admin.user-management.permissions.index')->with($response['type'], $response['message']);
    }

    public function massDestroy(MassDestroyPermissionRequest $request)
    {
        $this->service->deleteMultiple();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
