<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, CascadeSoftDeletes;

    protected $cascadeDeletes = ['venue','vendor','customer'];

    const PRIVATE_ROLES = ['Super Admin','Admin','Vendor','Venue','Customer'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact_number',
        'dob',
        'gender',
        'verification_token',
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
    ];

    protected $dates = [
        'blocked_until'
    ];

    public function getAvatarAttribute($value)
    {
        return !empty($value) ?: asset('/assets/images/default-avatar.png');
    }

    public function venue()
    {
        return $this->hasOne(Venue::class,'user_id','id');
    }

    public function vendor()
    {
        return $this->hasOne(Vendor::class,'user_id','id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class,'user_id','id');
    }
}
