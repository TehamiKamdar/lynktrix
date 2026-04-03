<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DelTracking extends Model
{
    protected $table = "del_trackings";

    protected $guarded = [];

    public function advertiser()
    {
        return $this->hasOne(Advertiser::class, 'id', 'advertiser_id');
    }

    public function advertiserApply()
    {
        return $this->hasOne(AdvertiserApply::class, 'internal_advertiser_id', 'advertiser_id');
    }

    public function publisher()
    {
        return $this->hasOne(User::class, 'id', 'publisher_id');
    }

    public function website()
    {
        return $this->hasOne(Website::class, 'id', 'website_id');
    }
}
