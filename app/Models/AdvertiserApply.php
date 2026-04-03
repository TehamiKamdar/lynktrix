<?php

namespace App\Models;

class AdvertiserApply extends BaseModel
{
    const STATUS_NEW = "new",
        STATUS_NOT_ACTIVE = "not-joined",
        STATUS_ACTIVE = "joined",
        STATUS_PENDING = "pending",
        STATUS_REJECTED = "rejected",
        STATUS_ADMITAD_HOLD = "admitad_hold",
        STATUS_HOLD_CANCEL = "hold_cancel",
        STATUS_ACTIVE_CANCEL = "active_cancel",
        STATUS_HOLD = "hold";

    const GENERATE_LINK_EMPTY = 0,
          GENERATE_LINK_COMPLETE = 1,
          GENERATE_LINK_IN_PROCESS = 2;

    protected $table = "advertiser_applies";

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
        "publisher_id",
        "approver_id",
        "website_id",
        "internal_advertiser_id",
        "advertiser_sid",
        "website_wid",
        "publisher_name",
        "advertiser_name",
        "status",
        "type",
        "message",
        "reject_approve_reason",
        "tracking_url_long",
        "tracking_url_short",
        "tracking_url",
        "click_through_url",
        "source",
        "is_tracking_generate",
        "on_demand_status",
        "is_checked"
    ];

    public function approver()
    {
        return $this->hasOne(User::class, 'id', 'approver_id');
    }

    public function advertiser()
    {
        return $this->hasOne(Advertiser::class, 'id', 'internal_advertiser_id');
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
