<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeeplinkTrackingCode extends Model
{
    protected $table = "deeplink_tracking_codes";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "code",
        "digit"
    ];
}
