<?php

namespace App\Http\Controllers\Admin\AdvertiserManagement;

use App\Http\Controllers\Controller;
use App\Service\Admin\AdvertiserManagement\Api\DuplicateService;
use App\Service\Admin\AdvertiserManagement\Api\ManualJoinService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManualJoinController extends Controller
{
    protected object $service;
    public function __construct(ManualJoinService $service)
    {
        $this->service = $service;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return View
     */
    public function index()
    {
        return $this->service->getManualJoinView();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return View
     */
    public function store(Request $request)
    {
        return $this->service->storeManualJoinData($request);
    }
}
