<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DelCouponTrackingDetail extends Model
{
    protected $table = "del_coupon_tracking_details";

    protected $guarded = [];

    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class, "advertiser_id", "id");
    }
}
