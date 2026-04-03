<?php

namespace App\Http\Controllers\Publisher\Settings;

use App\Http\Requests\Publisher\BasicInfoUpdateRequest;
use App\Models\Mediakit;
use App\Service\Publisher\Settings\BasicInfoService;
use Illuminate\Http\Response;

class BasicInfoController extends BaseController
{
    protected object $service;
    public function __construct(BasicInfoService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function actionBasicInfo()
    {
        return $this->service->init();
    }

    public function actionBasicInfoUpdate(BasicInfoUpdateRequest $request)
    {
        return $this->service->update($request);
    }

    public function actionMediaKitsDelete(Mediakit $mediakit)
    {
        $this->service->deleteMediaKit($mediakit);
    }
}
