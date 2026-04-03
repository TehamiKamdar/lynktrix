<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SyncData extends Model
{
    protected $table = "sync_data";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "source",
        "type",
        "is_sync",
        "date"
    ];
}
