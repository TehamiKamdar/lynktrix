<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends BaseModel
{
    use SoftDeletes;

    protected $table = "publishers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "sid",
        "user_id",
        "language",
        "customer_reach",
        "gender",
        "dob",
        "location_country",
        "location_state",
        "location_city",
        "location_address_1",
        "location_address_2",
        "zip_code",
        "intro",
        "image",
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

    protected $casts = [
        'categories' => 'array',
        'partner_types' => 'array'
    ];

    public static function getLanguages()
    {
        return [
            "English",
            "Chinese",
            "Hindi",
            "Spanish",
            "Arabic",
            "Bengali",
            "Portuguese",
            "Russian",
            "Punjabi",
            "Japanese",
            "Javanese",
            "Telugu",
            "Marathi",
            "French",
            "German",
            "Tamil",
            "Urdu",
            "Vietnamese",
            "Korean",
            "Turkish",
            "Gujarati",
            "Italian",
            "Hausa",
            "Malay",
            "Kannada",
            "Pashto",
            "Yoruba",
            "Persian",
            "Oriya",
            "Malayalam"
        ];
    }

    public static function getLegalEntity()
    {
        return [
            [
                "name" => "Individual/Sole Proprietorship",
                "value" => "individual",
            ],
            [
                "name" => "Partners",
                "value" => "partners",
            ],
            [
                "name" => "Corporation",
                "value" => "corporation",
            ],
            [
                "name" => "LLC/LLP",
                "value" => "llc",
            ],
            [
                "name" => "Other",
                "value" => "other",
            ]
        ];
    }


}
