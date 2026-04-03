<?php

namespace App\Models;

class EmailJob extends BaseModelWithoutUuids
{
    protected $table = "email_jobs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "path",
        "date",
        "status",
        "payload",
        "error_code",
        "error_message"
    ];
}
