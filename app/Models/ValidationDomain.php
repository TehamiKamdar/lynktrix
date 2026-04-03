<?php

namespace App\Models;

class ValidationDomain extends BaseModel
{

    protected $table = "validation_domains";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "advertiser_id",
        "name",
        "created_by"
    ];

    /**
     * The attributes that used for dates.
     *
     * @var array<string, string>
     */
    protected $dates = [
        'updated_at',
        'created_at',
    ];
}
