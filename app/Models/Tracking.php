<?php

namespace App\Models;

class Tracking extends BaseModel
{

    protected $table = "trackings";

    /**
     * The attributes that used for dates.
     *
     * @var array<string, string>
     */
    protected $dates = [
        'updated_at',
        'created_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "advertiser_id",
        "publisher_id",
        "website_id",
        "sub_id",
        "click_through_url",
        "tracking_url_long",
        "tracking_url_short",
        "tracking_url",
        "hits",
        "unique_visitor",
        "is_deleted",
    ];

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
