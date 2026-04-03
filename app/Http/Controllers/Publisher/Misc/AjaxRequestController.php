<?php

namespace App\Http\Controllers\Publisher\Misc;

use App\Http\Controllers\Controller;
use App\Http\Requests\Publisher\Misc\UploadProfileImageRequest;
use App\Models\Website;
use App\Service\Publisher\Misc\AjaxRequestService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Calculation\Web;

class AjaxRequestController extends Controller
{
    protected object $service;
    public function __construct(AjaxRequestService $service)
    {
        $this->service = $service;
    }

    public function actionGetMonthLastDay(Request $request)
    {
        return $this->service->getMonthLastDay($request);
    }
    public function actionUploadProfileImage(UploadProfileImageRequest $request)
    {
        return $this->service->uploadProfileImage($request);
    }
    public function actionSetPaginationLimit(Request $request)
    {
        session()->put("publisher_{$request->type}_limit", $request->limit);
        return response()->json(true);
    }
    public function actionSetAdvertiserView(Request $request)
    {
        session()->put('publisher_advertiser_view', $request->view);
        return response()->json(true);
    }
    public function actionSetWebsite(Request $request, Website $website)
    {
        $user = $request->user();
        $user->update([
            'active_website_id' => $website->id
        ]);
        return redirect()->route("dashboard", ["type" => "publisher"])->with("success", "Website successfully change.");
    }
}
