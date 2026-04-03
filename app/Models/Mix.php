<?php

namespace App\Models;

class Mix extends BaseModel
{

    const CATEGORY = "category",
          PARTNER_TYPE = "partner_type",
          PROMOTIONAL_METHOD = "promotional_method";

    protected $table = "mixes";

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
        "name",
        "type",
        "external_id",
        "parent_id",
        "created_by",
        "updated_by",
        "source"
    ];
}
