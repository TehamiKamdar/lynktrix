<?php

namespace App\Service\Publisher\Creatives;

use App\Helper\Static\Vars;
use App\Models\AdvertiserApply;
use App\Models\Coupon;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponService
{
    public function init(Request $request)
    {
        $limit = $request->limit ?? Vars::DEFAULT_PUBLISHER_COUPON_PAGINATION;


        $websites = Website::withAndWhereHas('users', function ($user) {
            return $user->where("id", auth()->user()->id);
        })->where("status", Website::ACTIVE)->count();

        $coupons = [];

        if ($websites) {

            $coupons = new Coupon();

            $coupons = $coupons->withAndWhereHas('advertiser_applies', function($coupon) {
                $coupon->select('status','publisher_id','advertiser_sid','internal_advertiser_id')->where('status', AdvertiserApply::STATUS_ACTIVE);
            });

            $coupons = $coupons->paginate();

        } else
        {
            $url = route("publisher.profile.websites.index");
            $message = "Please go to <a href='{$url}'>website settings</a> and verify your site to view Creative Coupons.";
            Session::put("error", $message);
        }

        return view("template.publisher.creatives.coupons.list", compact('coupons'));
    }
}
