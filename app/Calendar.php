<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = ['name'];

    protected $table = "calendars";

    public function teams() {
        return $this->belongsToMany('App\Team');
    }
}
