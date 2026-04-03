<?php

namespace App\Service\Publisher\Creatives;

use App\Helper\Static\Vars;
use App\Models\AdvertiserApply;
use App\Models\Coupon;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexService
{
    public function init(Request $request)
    {
        $limit = Vars::DEFAULT_PUBLISHER_COUPON_PAGINATION;

        if(session()->has('publisher_coupon_limit')) {
            $limit = session()->get('publisher_coupon_limit');
        }

        $websites = Website::withAndWhereHas('users', function ($user) {
            return $user->where("id", auth()->user()->id);
        })->where("status", Website::ACTIVE)->count();

        $coupons = [];
        $total = 0;

        if ($websites) {

            $coupons = new Coupon();

            if($request->search_by_name)
                $coupons = $coupons->where(function($query) use ($request) {
                    $query->orWhere('title', 'LIKE', "%$request->search_by_name%")
                        ->orWhere('advertiser_name', 'LIKE', "%$request->search_by_name%")
                        ->orWhere('advertiser_id', 'LIKE', "%$request->search_by_name%");
                });

            $coupons = $coupons->withAndWhereHas('advertiser_applies', function($coupon) use ($request) {
                $user = auth()->user();
                $coupon->select('status','publisher_id','advertiser_sid','internal_advertiser_id')
                    ->where('status', AdvertiserApply::STATUS_ACTIVE)->where('publisher_id', $user->id)->where('website_id', $user->active_website_id);
            });

            $total = $coupons->count();

            $coupons = $coupons->paginate($limit);

        } else
        {
            $url = route("publisher.profile.websites.index");
            $message = "Please go to <a href='{$url}'>website settings</a> and verify your site to view Creative Coupons.";
            Session::put("error", $message);
        }

        if($request->ajax()) {
            $returnView = view("template.publisher.creatives.coupons.list_view", compact('coupons'))->render();
            return response()->json(['total' => $total, 'html' => $returnView]);
        }

        return view("template.publisher.creatives.coupons.list", compact('coupons', 'total'));
    }
}

