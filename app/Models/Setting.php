<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends BaseModel
{
    use HasFactory;

    public $table = 'settings';

    protected $fillable = [
        'key',
        'value',
        'is_informed'
    ];
}
