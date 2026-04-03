<?php

namespace App\Models;

class ChatMessage extends BaseModel
{

    protected $fillable = [
        'advertiser_id',
        'advertiser_name',
        'publisher_id',
        'publisher_name',
        'subject',
        'comments'
    ];
}
