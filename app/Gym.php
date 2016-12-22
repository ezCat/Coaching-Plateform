<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $fillable = ['name', 'adress', 'location'];

    protected $table = "gyms";

    public function clubs() {
        return $this->belongsToMany('App\Club');
    }
}
