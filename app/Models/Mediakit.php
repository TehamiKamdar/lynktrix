<?php

namespace App\Models;

class Mediakit extends BaseModel
{

    protected $fillable = [
        'name',
        'image',
        'size',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
