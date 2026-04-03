<?php

namespace App\Models;

 use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
 use ProtoneMedia\LaravelVerifyNewEmail\MustVerifyNewEmail;

 class User extends Authenticatable implements MustVerifyEmail
{
    use MustVerifyNewEmail, SoftDeletes, Notifiable, HasApiTokens, Uuids;

    const PENDING = "pending", ACTIVE = "active", HOLD = "hold", REJECTED = "rejected";

    const SUPER_ADMIN = "super_admin", ADMIN = "admin", STAFF = "staff", INTERN = "intern", ADVERTISER = "advertiser", PUBLISHER = "publisher";

    public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sid',
        'active_website_id',
        'first_name',
        'last_name',
        'user_name',
        'email',
        'new_email',
        'password',
        'status',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
        'remember_token',
        'api_token',
        'profile_complete_per',
        'profile_complete_section',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'profile_complete_section' => 'array'
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
        'email_verified_at',
    ];

     public static function getSqlWithBindings($query)
     {
         return vsprintf(str_replace('?', '%s', $query->toSql()), collect($query->getBindings())->map(function ($binding) {
             return is_numeric($binding) ? $binding : "'{$binding}'";
         })->toArray());
     }

     public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function getEmailVerifiedAtAttribute($value)
    {
//        dd(config('panel.date_format') . ' ' . config('panel.time_format'), $value);
        return $value ? $value : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getRoleName()
    {
        return $this->roles->pluck('title')[0] ?? null;
    }

    public function getAllowed()
    {
        return $this->getRoleName() != Role::SUPER_ADMIN_ROLE && $this->getRoleName() != Role::ADMIN_ROLE;
    }

    public function getStaffNotAllowed()
    {
        return $this->getRoleName() != Role::STAFF_ROLE;
    }

    public function websites()
    {
        return $this->belongsToMany(Website::class, 'website_user');
    }

    public function active_website()
    {
        return $this->belongsTo(Website::class, 'active_website_id', 'id');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_user');
    }

    public function mediakits()
    {
        return $this->belongsToMany(Mediakit::class, 'mediakit_user');
    }

    public function publisher()
    {
        return $this->hasOne(Publisher::class, 'user_id', 'id');
    }

    public function advertiser()
    {
        return $this->hasOne(Advertiser::class, 'user_id', 'id');
    }

     public function billing()
     {
         return $this->hasOne(Billing::class, 'user_id', 'id');
     }

     public function payment_setting()
     {
         return $this->hasOne(PaymentSetting::class, 'user_id', 'id');
     }

    public function scopeWithAndWhereHas($query, $relation, $constraint){
         return $query->whereHas($relation, $constraint)
             ->with([$relation => $constraint]);
    }
}
