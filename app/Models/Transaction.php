<?php

namespace App\Models;

class Transaction extends BaseModel
{

    const STATUS_APPROVED = "approved",
          STATUS_APPROVED_STALLED = "approved_but_stalled",
          STATUS_PENDING = "pending",
          STATUS_HOLD = "hold",
          STATUS_PENDING_PAID = "pending_paid",
          STATUS_PAID = "paid",
          STATUS_DECLINED = "declined",
          STATUS_DELETED = "deleted",
          PAYMENT_STATUS_NOT_APPROVED = 0,
          PAYMENT_STATUS_CONFIRM = 1,
          PAYMENT_STATUS_REJECT = 2,
          PAYMENT_STATUS_RELEASE = 3,
          PAYMENT_STATUS_RELEASE_PAYMENT = 4;

    protected $table = "transactions";

    protected $fillable = [
        "transaction_id",
        "advertiser_id",
        "internal_advertiser_id",
        "external_advertiser_id",
        "website_id",
        "publisher_id",
        "payment_id",
        "internal_payment_id",
        "commission_sharing_publisher_id",
        "commission_sharing_selected_rate_publisher_id",
        "transaction_query_id",
        "commission_status",
        "payment_status",
        "commission_amount",
        "tmp_commission_amount",
        "commission_amount_currency",
        "sale_amount",
        "last_commission",
        "last_sales_amount",
        "tmp_sale_amount",
        "sale_amount_currency",
        "received_commission_status",
        "received_commission_amount",
        "received_commission_amount_currency",
        "received_sale_amount",
        "advertiser_name",
        "campaign_name",
        "site_name",
        "customer_country",
        "click_refs",
        "click_date",
        "transaction_date",
        "validation_date",
        "commission_type",
        "voucher_code",
        "lapse_time",
        "old_sale_amount",
        "old_commission_amount",
        "click_device",
        "transaction_device",
        "advertiser_country",
        "order_ref",
        "custom_parameters",
        "transaction_parts",
        "paid_to_publisher",
        "tracked_currency_amount",
        "tracked_currency_currency",
        "original_sale_amount",
        "ip_hash",
        "url",
        "publisher_url",
        "amended_reason",
        "decline_reason",
        "customer_acquisition",
        "is_converted",
        "source",
        "sub_id"
    ];

    protected $casts = [
        'custom_parameters' => 'array',
        'transaction_parts' => 'array',
        'click_refs' => 'array',
    ];

    public static function makeFilterColumns()
    {
        return [
            "transaction_id",
            "advertiser_name",
            "transaction_date",
            "paid_to_publisher",
            "commission_status",
            "payment_status",
            "publisher_url",
            "customer_country",
            "advertiser_country",
            "commission_amount",
            "commission_amount_currency",
            "sale_amount",
            "received_commission_amount",
            "received_sale_amount",
            "sale_amount_currency",
            "received_commission_amount_currency",
            "order_ref",
            "source",
            "id"
        ];
    }

    public function scopeFetchPublisher($query, $value)
    {
        return $query->where('transactions.publisher_id', $value->id)->where('transactions.website_id', $value->active_website_id);
    }

    public function advertiser()
    {
        return $this->hasOne(Advertiser::class, 'sid', 'external_advertiser_id');
    }

    public function publisher()
    {
        return $this->hasOne(User::class, 'id', 'publisher_id');
    }

    public function website()
    {
        return $this->hasOne(Website::class, 'id', 'website_id');
    }

    public function tracking()
    {
        return $this->hasOne(Tracking::class, 'advertiser_id', 'internal_advertiser_id')->where('publisher_id', auth()->user()->id);
    }

    public function tracking_details()
    {
        return $this->hasOne(TrackingDetail::class, 'advertiser_id', 'internal_advertiser_id')->where('publisher_id', auth()->user()->id);
    }

    public function scopeWithAndWhereHas($query, $relation, $constraint){
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }
}
