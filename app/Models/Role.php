<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends BaseModel
{
    use SoftDeletes;

    const SUPER_ADMIN_ROLE = "Super Admin";
    const ADMIN_ROLE = "Admin";
    const STAFF_ROLE = "Staff";
    const ADVERTISER_ROLE = "Advertiser";
    const PUBLISHER_ROLE = "Publisher";

    public $table = 'roles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
