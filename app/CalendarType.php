<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarType extends Model
{
    protected $fillable = ['name', 'color'];

    protected $table = "calendar_types";

    public function calendars() {
        return $this->belongsToMany('App\Calendar');
    }
}
