<?php

namespace App\Http\Controllers\Admin\PublisherManagement;

use App\Enums\Status;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\AdvertiserApply;
use App\Service\Admin\PublisherManagement\Apply\IndexService;
use App\Service\Admin\PublisherManagement\Apply\MiscService;
use App\Service\Admin\PublisherManagement\Apply\ShowService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ApplyAdvertiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Status $status, IndexService $service)
    {
        return $service->init($request, $status);
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
     * @param  \App\Models\AdvertiserApply  $apply_advertiser
     * @return \Illuminate\Http\Response
     */
    public function show(AdvertiserApply $approval, Status $status, ShowService $service)
    {
//        abort_if(Gate::denies('crm_api_advertiser_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $service->init($approval, $status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdvertiserApply  $apply_advertiser
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvertiserApply $apply_advertiser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdvertiserApply  $apply_advertiser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvertiserApply $apply_advertiser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdvertiserApply  $apply_advertiser
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvertiserApply $apply_advertiser)
    {
        //
    }
    public function statusUpdate(Request $request, MiscService $service)
    {
        return $service->updateAdvertiserStatus($request);
    }
}
