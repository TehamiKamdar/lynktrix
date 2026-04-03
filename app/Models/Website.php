<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Website extends BaseModel
{
    use SoftDeletes;

    const PENDING = "pending", ACTIVE = "active", REJECTED = "rejected", HOLD = "hold";

    protected $table = "websites";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "wid",
        "name",
        "categories",
        "partner_types",
        "url",
        "status",
        "country",
        "monthly_traffic",
        "monthly_page_views",
        "property_type_website",
        "property_type_app",
        "logo",
        "app_logo",
        "admitad_wid",
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

    public function users()
    {
        return $this->belongsToMany(User::class, "website_user");
    }

    public static function getCategoryList(): array
    {
        return [
            "Family/Baby",
            "Charitable Organizations",
            "Organic & Eco-Friendly",
            "Dating & Romance",
            "DIY & Crafting",
            "Art & Entertainment",
            "Gaming",
            "Luxury",
            "Education",
            "Pets",
            "Lifestyle",
            "Fashion",
            "Affiliate Link",
            "Financial Services",
            "Travel & Vacations",
            "Software & Internet",
            "Computer & Electronics",
            "Home & Living",
            "Jewelry & Watches",
            "Sports & Fitness",
            "Health & Wellness",
            "Food & Drink",
            "Shoes & Bags",
            "Clothing & Accessories",
            "Cosmetics & Beauty",
            "Department Stores/Malls",
            "Other"
        ];
    }

    public static function getPartnerTypeList(): array
    {
        return [
            "Content/Blog",
            "Coupon/Deal",
            "Subnetwork",
            "E-mail",
            "Cashback/Loyalty",
            "App/Browser Extension",
            "Price Comparison",
            "Search",
            "Media Buyer",
            "Other"
        ];
    }

    public function scopeWithAndWhereHas($query, $relation, $constraint){
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }

    public function scopeWithAndWhereDoesntHave($query, $relation, $constraint){
        return $query->whereDoesntHave($relation, $constraint)
            ->with([$relation => $constraint]);
    }
}
