<?php

namespace App\Http\Controllers\Admin\AdvertiserManagement;

use App\Http\Controllers\Controller;
use App\Service\Admin\AdvertiserManagement\Api\DuplicateService;
use App\Service\Admin\AdvertiserManagement\Api\MiscService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DuplicateController extends Controller
{
    protected object $service;
    public function __construct(DuplicateService $service)
    {
        $this->service = $service;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return View
     */
    public function index(Request $request)
    {
        return $this->service->getDuplicateAdvertiserView($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return View
     */
    public function store(Request $request)
    {
        return $this->service->storeDuplicateAdvertiserData($request);
    }
}
