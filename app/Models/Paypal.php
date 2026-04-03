<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Paypal extends BaseModel
{
    use SoftDeletes;

    protected $table = "paypals";

    protected $fillable = [
        "user_id",
        "name",
        "address",
        "username",
        "country",
        "frequency",
        "threshold",
        "tax_id",
        "tax_form"
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

}
