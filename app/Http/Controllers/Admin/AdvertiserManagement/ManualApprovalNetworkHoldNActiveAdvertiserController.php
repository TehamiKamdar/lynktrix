<?php

namespace App\Http\Controllers\Admin\AdvertiserManagement;

use App\Enums\ProviderAdvertiserDeleteType;
use App\Http\Controllers\Controller;
use App\Service\Admin\AdvertiserManagement\Api\ManualApprovalNetworkHoldNActiveAdvertiserService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManualApprovalNetworkHoldNActiveAdvertiserController extends Controller
{
    protected object $service;
    public function __construct(ManualApprovalNetworkHoldNActiveAdvertiserService $service)
    {
        $this->service = $service;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return View
     */
    public function index(ProviderAdvertiserDeleteType $type, Request $request)
    {
        return $this->service->getManualApprovalNetworkAdvertiserView($type, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return View
     */
    public function store(Request $request)
    {
        return $this->service->storeManualApprovalNetworkAdvertiserData($request);
    }
}
