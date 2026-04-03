<?php

namespace App\Http\Controllers\Admin\AdvertiserManagement;

use App\Enums\WebsiteStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Website;
use App\Service\Admin\AdvertiserManagement\Advertiser\IndexService;
use App\Service\Admin\AdvertiserManagement\Advertiser\MiscService;
use App\Service\Admin\AdvertiserManagement\Advertiser\ShowService;
use App\Service\Admin\AdvertiserManagement\Advertiser\DeleteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AdvertiserController extends Controller
{
    public function index(Request $request, IndexService $service)
    {
        abort_if(Gate::denies('admin_advertisers_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->init($request);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
    }

    public function show($id, ShowService $service)
    {
//        abort_if(Gate::denies('crm_advertiser_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->init($id);
    }

    public function destroy($advertiser, DeleteService $service)
    {
//        abort_if(Gate::denies('crm_advertiser_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->delete($advertiser);
    }

    public function massDestroy(Request $request, DeleteService $service)
    {
        return $service->deleteMultiple($request);
    }

    public function tabs(Request $request, MiscService $service)
    {
        return $service->tabs($request);
    }

    public function statusUpdate(WebsiteStatus $status, Website $website, MiscService $service)
    {
        return $service->statusUpdate($status, $website);
    }
}
