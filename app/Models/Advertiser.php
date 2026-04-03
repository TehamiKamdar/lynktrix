<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Advertiser extends BaseModel
{
    use SoftDeletes;

    const API = "api", MANUAL = "manual";

    const NOT_AVAILABLE = 0,
          AVAILABLE = 1;

    protected $table = "advertisers";

    protected $fillable = [
        "sid",
        "advertiser_id",
        "api_advertiser_id",
        "user_id",
        "network_source_id",
        "is_show",
        "company_name",
        "phone_number",
        "address",
        "city",
        "state",
        "country",
        "country_full_name",
        "name",
        "url",
        "custom_domain",
        "primary_regions",
        "currency_code",
        "average_payment_time",
        "valid_domains",
        "validation_days",
        "epc",
        "click_through_url",
        "deeplink_enabled",
        "categories",
        "tags",
        "offer_type",
        "supported_regions",
        "logo",
        "fetch_logo_url",
        "program_restrictions",
        "promotional_methods",
        "description",
        "short_description",
        "program_policies",
        "source",
        "type",
        "status",
        "provider_status",
        "commission",
        "commission_type",
        "goto_cookie_lifetime",
        "exclusive",
        "is_available",
        "is_request__process",
        "is_active",
        "custom_domain",
        "is_fetchable_logo",
        "fetch_logo_error"
    ];

    /**
     * The attributes that used for dates.
     *
     * @var array<string, string>
     */
    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $casts = [
        'categories' => 'array',
        'valid_domains' => 'array',
        'primary_regions' => 'array',
        'supported_regions' => 'array',
        'country_full_name' => 'array',
        'commission_range' => 'array',
        'promotional_methods' => 'array',
        'program_restrictions' => 'array'
    ];

    public function commissions()
    {
        return $this->hasMany(Commission::class, 'advertiser_id')->orderBy("created_at", "ASC");
    }

    public function validation_domains()
    {
        return $this->hasMany(ValidationDomain::class, 'advertiser_id')->orderBy("created_at", "ASC");
    }

    public function get_country()
    {
        return $this->hasOne(Country::class, 'id', 'country');
    }

    public function get_state()
    {
        return $this->hasOne(State::class, 'id', 'state');
    }

    public function get_city()
    {
        return $this->hasOne(City::class, 'id', 'city');
    }

    public function advertiser_applies()
    {
        return $this->hasOne(AdvertiserApply::class, 'internal_advertiser_id', 'id')->where('publisher_id', auth()->user()->id)
            ->where('website_id', auth()->user()->active_website_id);
    }

    public function advertiser_applies_multi()
    {
        return $this->hasMany(AdvertiserApply::class, 'internal_advertiser_id', 'id');
    }

    public function advertiser_applies_without_auth()
    {
        return $this->hasOne(AdvertiserApply::class, 'internal_advertiser_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function scopeWithAndWhereHas($query, $relation, $constraint){
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }

    public function scopeWithAndWhereDoesntHave($query, $relation, $constraint){
        return $query->whereDoesntHave($relation, $constraint)
            ->with([$relation => $constraint]);
    }
}
