<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use App\UserInfo;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ChangePasswordRequest;


class User extends Authenticatable
{

    protected $fillable = [
        'name', 'password',
    ];

    public function user_info() {
        return $this->hasOne(UserInfo::class);
    }
}
