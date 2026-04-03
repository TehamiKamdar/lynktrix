<?php

namespace App\Models;

class TransactionConversation extends BaseModelWithoutUuids
{

    protected $table = "transaction_conversations";

    protected $fillable = [
        "to",
        "from",
        "rate",
        "date",
        "actual_rate"
    ];

}
