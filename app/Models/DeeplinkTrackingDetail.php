<?php

namespace App\Models;

class DeeplinkTrackingDetail extends BaseModel
{

    protected $table = "deeplink_tracking_details";

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
        "tracking_id",
        "ip_address",
        "operating_system",
        "browser",
        "device",
        "referer_url",
        "country",
        "iso2",
        "region",
        "city",
        "zipcode",
        "is_deleted",
        "is_new",
        "created_at",
    ];

    public function advertiser()
    {
        return $this->hasOne(Advertiser::class, "id", "advertiser_id");
    }
}
