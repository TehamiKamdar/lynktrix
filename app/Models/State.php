<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class State extends BaseModelWithoutUuids
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'country_id', 'name', 'status'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
