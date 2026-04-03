<?php

namespace App\Models;

class ApiHistory extends BaseModel
{

    protected $table = "api_histories";

    protected $fillable = [
        "publisher_id",
        "website_id",
        "wid",
        "by_id",
        "name",
        "token",
        "page",
        "limit",
        "ip",
    ];
}
