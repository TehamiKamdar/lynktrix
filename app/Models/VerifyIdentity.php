<?php

namespace App\Models;

class VerifyIdentity extends BaseModel
{
    protected $table = "verify_identities";

    protected $fillable = [
        "ip_address",
        "location",
        "user_id",
        "user_email"
    ];
}
