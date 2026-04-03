<?php

namespace App\Http\Controllers\Admin\AdvertiserManagement;

use App\Helper\Static\Vars;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdvertiserConfigRequest;
use App\Models\AdvertiserConfig;
use App\Service\Admin\AdvertiserManagement\Config\DeleteService;
use App\Service\Admin\AdvertiserManagement\Config\IndexService;
use App\Service\Admin\AdvertiserManagement\Config\StoreService;
use App\Service\Admin\AdvertiserManagement\Config\UpdateService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class AdvertiserConfigController extends Controller
{
    /**
     * @param Request $request
     * @param IndexService $service
     * @return Application|Factory|View|JsonResponse
     */
    public function index(Request $request, IndexService $service)
    {
        abort_if(Gate::denies('admin_settings_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if(Gate::denies('admin_advertiser_configurations_settings_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->init($request);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $networks = Vars::LIST;
        return view("template.admin.settings.advertiser_config.create", compact('networks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdvertiserConfigRequest $request
     * @param StoreService $service
     * @return RedirectResponse
     */
    public function store(AdvertiserConfigRequest $request, StoreService $service)
    {
        return $service->init($request);
    }

    /**
     * Display the specified resource.
     *
     * @param AdvertiserConfig $advertiserConfig
     * @return Response
     */
    public function show(AdvertiserConfig $advertiserConfig)
    {
        return view("template.admin.settings.advertiser_config.show", compact('advertiserConfig'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(AdvertiserConfig $advertiserConfig)
    {
        $networks = Vars::LIST;
        return view("template.admin.settings.advertiser_config.edit", compact('networks','advertiserConfig'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdvertiserConfigRequest $request
     * @param AdvertiserConfig $advertiserConfig
     * @return Response
     */
    public function update(AdvertiserConfigRequest $request, AdvertiserConfig $advertiserConfig, UpdateService $service)
    {
        return $service->init($request, $advertiserConfig);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(AdvertiserConfig $advertiserConfig, DeleteService $service)
    {
        return $service->delete($advertiserConfig);
    }

    public function massDestroy(Request $request, DeleteService $service)
    {
        return $service->deleteMultiple($request);
    }
}
