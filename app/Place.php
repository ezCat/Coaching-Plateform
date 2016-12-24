<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['name', 'color'];

    protected $table = "places";

    public function schedules() {
        return $this->belongsToMany('App\Schedule');
    }
}
