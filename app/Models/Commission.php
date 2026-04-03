<?php

namespace App\Models;

class Commission extends BaseModel
{
    protected $table = "commissions";

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
        "created_by",
        "updated_by",
        "date",
        "condition",
        "rate",
        "type",
        "info"
    ];
}
