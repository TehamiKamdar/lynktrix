<?php

namespace App\Models;

class Notification extends BaseModel
{

    protected $table = "notifications";

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
        "publisher_id",
        "type",
        "category",
        "notification_header",
        "header",
        "content",
        "is_new",
        "date"
    ];

}
