<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends BaseModelWithoutUuids
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'name', 'status', 'currency', 'iso2'
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function cities()
    {
        return $this->hasManyThrough(City::class, State::class);
    }
}
