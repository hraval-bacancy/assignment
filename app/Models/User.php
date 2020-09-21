<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'company',
        'language',
        'email',
        'password',
        'last_login_at',
        'last_login_ip',
    ];

    protected $dates = [
        'last_login_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getFirstNameAttribute($value) {
        $firstName = null;
        try {
            $firstName = Crypt::decryptString($value);            
        } catch (DecryptException $e) {
            $firstName = '';
        }
        return $firstName;
    }

    public function getLastNameAttribute($value) {
        $lastName = null;
        try {
            $lastName = Crypt::decryptString($value);            
        } catch (DecryptException $e) {
            $lastName = '';
        }
        return $lastName;
    }

    public function getPhoneAttribute($value) {
        $phone = null;
        try {
            $phone = Crypt::decryptString($value);            
        } catch (DecryptException $e) {
            $phone = '';
        }
        return $phone;
    }

    public function getCompanyAttribute($value) {
        $company = null;
        try {
            $company = Crypt::decryptString($value);            
        } catch (DecryptException $e) {
            $company = '';
        }
        return $company;
    }
}