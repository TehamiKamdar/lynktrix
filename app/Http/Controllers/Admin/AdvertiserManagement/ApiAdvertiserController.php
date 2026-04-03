<?php

namespace App\Http\Controllers\Admin\AdvertiserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ApiAdvertiserRequest;
use App\Models\Advertiser;
use App\Service\Admin\AdvertiserManagement\Api\DeleteService;
use App\Service\Admin\AdvertiserManagement\Api\EditService;
use App\Service\Admin\AdvertiserManagement\Api\IndexService;
use App\Service\Admin\AdvertiserManagement\Api\MiscService;
use App\Service\Admin\AdvertiserManagement\Api\ShowService;
use App\Service\Admin\AdvertiserManagement\Api\UpdateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ApiAdvertiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response | View
     */
    public function index(Request $request, IndexService $service)
    {
        abort_if(Gate::denies('admin_api_advertisers_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->init($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Advertiser $advertiser
     * @return View
     */
    public function show(Advertiser $api_advertiser, ShowService $service)
    {
//        abort_if(Gate::denies('crm_api_advertiser_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//        abort_if($api_advertiser->type != Advertiser::API, Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->init($api_advertiser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Advertiser $api_advertiser
     * @param EditService $service
     * @return View
     */
    public function edit(Advertiser $api_advertiser, EditService $service)
    {
//        abort_if(Gate::denies('crm_api_advertiser_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if($api_advertiser->type != Advertiser::API, Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $service->init($api_advertiser);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ApiAdvertiserRequest $request
     * @param Advertiser $api_advertiser
     * @param UpdateService $service
     * @return RedirectResponse
     */
    public function update(Request $request, Advertiser $api_advertiser, UpdateService $service)
    {
        return $service->init($request, $api_advertiser);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Advertiser $api_advertiser
     * @param DeleteService $service
     * @return RedirectResponse
     */
    public function destroy(Advertiser $api_advertiser, DeleteService $service)
    {
        return $service->delete($api_advertiser);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Advertiser $advertiser
     * @return JsonResponse
     */
    public function status(Advertiser $api_advertiser, MiscService $service)
    {
        return $service->updateStatus($api_advertiser);
    }

    public function massDestroy(Request $request, DeleteService $service)
    {
        return $service->deleteMultiple($request);
    }
}
