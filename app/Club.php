<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = ['name', 'main_color', 'gym_id'];

    protected $table = "clubs";

    public function gyms() {
        return $this->hasOne('App\Gym');
    }
}
