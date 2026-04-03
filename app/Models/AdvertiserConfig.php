<?php

namespace App\Models;

class AdvertiserConfig extends BaseModel
{

    protected $table = "advertiser_configs";

    protected $fillable = [
        "name",
        "key",
        "value"
    ];
}
