<?php

namespace App\Http\Controllers\Publisher\Track;

use App\Http\Controllers\Controller;
use App\Service\Publisher\Track\DeepLinkService;
use Illuminate\Http\Request;

class DeepLinkController extends Controller
{
    protected object $service;
    public function __construct(DeepLinkService $service)
    {
        $this->service = $service;
    }

    public function actionLongURLTracking(Request $request)
    {
        $data = $this->service->storeLongCode($request);
        if(!empty($data))
        {
            if($data['success'])
                return redirect()->away($data['url']);

            else
                return $data['view'];
        }

        abort(404);
    }

    public function actionURLTracking(Request $request, string $code)
    {
        $data = $this->service->storeCode($request, $code);

        if(!empty($data))
        {
            if($data['success'])
                return redirect()->away($data['url']);

            else
                return $data['view'];
        }

        abort(404);
    }
}
