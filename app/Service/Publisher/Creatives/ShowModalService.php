<?php

namespace App\Service\Publisher\Creatives;

use App\Models\AdvertiserApply;
use App\Models\Coupon;
use App\Models\Website;
use Illuminate\Http\Request;

class ShowModalService
{
    public function init(Request $request, Coupon $coupon)
    {
        $websites = Website::withAndWhereHas('users', function ($user) {
            return $user->where("id", auth()->user()->id);
        })->where("status", Website::ACTIVE)->count();

        if($websites == 0)
        {
            $coupon = [];
        }

        return view("template.publisher.creatives.coupons.modal-content", compact('coupon'));
    }
}
