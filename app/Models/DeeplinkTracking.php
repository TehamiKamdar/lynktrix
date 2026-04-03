<?php

namespace App\Models;

class DeeplinkTracking extends BaseModel
{

    protected $table = "deeplink_trackings";

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
        "landing_url",
        "click_through_url",
        "tracking_url",
        "tracking_url_long",
        "hits",
        "unique_visitor",
        "sub_id",
        "is_new",
        "is_checked",
    ];

    public function advertiser()
    {
        return $this->hasOne(Advertiser::class, 'id', 'advertiser_id');
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
