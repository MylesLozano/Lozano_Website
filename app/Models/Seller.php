<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;


class Seller extends AuthenticatableUser implements Authenticatable, MustVerifyEmail
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobileNumber',
        'address',
        'password',
    ];

    // Implement the abstract methods
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthIdentifierName()
    {
        return $this->getKeyName();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getAuthPasswordName()
    {
        return 'password';
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'seller_id');
    }
}
