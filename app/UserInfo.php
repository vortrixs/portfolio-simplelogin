<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'user_info';

    protected $fillable = [
        'user_id','email', 'name', 'birthday'
    ];

    public function user() {
        return $this->hasOne(User::class);
    }
}
