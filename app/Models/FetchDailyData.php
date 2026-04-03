<?php

namespace App\Models;

class FetchDailyData extends BaseModel
{
    CONST STATUS_NOT_PROCESS = 1,
          STATUS_ACTIVE = 0,
          STATUS_IN_PROCESS = 2,
          IN_PROCESS_ACTIVE = 1,
          IN_PROCESS = 2,
          IN_PROCESS_NOT = 0;

    protected $table = "fetch_daily_data";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "publisher_id",
        "website_id",
        "advertiser_id",
        "path",
        "process_date",
        "date",
        "payload",
        "status",
        "is_processing",
        "queue",
        "landing_url",
        "sub_id",
        "key",
        "page",
        "offset",
        "limit",
        "sort",
        "start_date",
        "end_date",
        "error_code",
        "error_message",
        "source",
        "type"
    ];
}
