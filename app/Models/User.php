<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

 protected $fillable = [
    'name',
    'email',
    'password',
    'country_code',
    'contact_number',
    'address',
    'image',
    'theme',
    'language',
    'timezone',
    'first_name',
    'last_name',
    'gender',
    'phone',
    'aadhaar_card',
    'gst_number',
    'company_name',
    'account_number',
    'ifsc_code',
    'bank_name',
    'account_holder_name'
];


protected $hidden = [
    'password',
    'remember_token',
];

protected static function boot()
{
    parent::boot();

    static::creating(function ($user) {
        $user->uuid = Str::uuid();
    });
}

}

