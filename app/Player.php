<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['last_name', 'first_name', 'birth_date', 'position', 'experience'];

    protected $table = "players";

    public function teams() {
        return $this->belongsToMany('App\Team');
    }
}
