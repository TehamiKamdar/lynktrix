<?php

namespace App\Http\Controllers\Publisher\Creatives;

use App\Enums\ExportType;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Service\Publisher\Creatives\ExportService;
use App\Service\Publisher\Creatives\IndexService;
use App\Service\Publisher\Creatives\ShowModalService;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function actionCoupon(Request $request, IndexService $service)
    {
        return $service->init($request);
    }

    public function actionShow(Request $request, Coupon $coupon, ShowModalService $service)
    {
        return $service->init($request, $coupon);
    }

    public function actionExport(ExportType $type, ExportService $service, Request $request)
    {
        return $service->init($request, $type);
    }
}
