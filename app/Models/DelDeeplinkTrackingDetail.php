<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DelDeeplinkTrackingDetail extends Model
{
    protected $table = "del_deeplink_tracking_details";

    protected $guarded = [];

    public function advertiser()
    {
        return $this->hasOne(Advertiser::class, "id", "advertiser_id");
    }
}
