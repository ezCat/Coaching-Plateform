<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'is_admin'];

    protected $hidden = ['password'];

    public function teams() {
        return $this->belongsToMany('App\Team');
    }
}
