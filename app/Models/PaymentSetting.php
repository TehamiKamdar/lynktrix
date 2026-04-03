<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentSetting extends BaseModel
{
    use SoftDeletes;

    protected $table = "payment_settings";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "user_id",
        "website_id",
        "payment_frequency",
        "payment_threshold",
        "payment_method",
        "bank_location",
        "account_holder_name",
        "bank_account_number",
        "bank_code",
        "account_type",
        "paypal_country",
        "paypal_holder_name",
        "paypal_email",
        "payoneer_holder_name",
        "payoneer_email"
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
