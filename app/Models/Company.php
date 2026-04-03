<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends BaseModel
{
    use SoftDeletes;

    protected $table = "companies";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "company_name",
        "contact_name",
        "legal_entity_type",
        "phone_number",
        "address",
        "address_2",
        "city",
        "state",
        "country",
        "zip_code"
    ];

    /**
     * The attributes that used for dates.
     *
     * @var array<string, string>
     */
    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public static function getLegalEntityList()
    {
        return [
            "Individual / Sole Proprietorship",
            "Partners",
            "Corporation",
            "LLC / LCP ",
            "Others"
        ];
    }
}
