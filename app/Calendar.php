<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = ['title', 'description', 'begun_at', 'finished_at', 'location', 'calendar_type_id', 'team_id'];

    protected $table = "calendars";

    public function teams() {
        return $this->belongsToMany('App\Team');
    }

    public function calendarTypes() {
        return $this->hasOne('App\CalendarTypes');
    }
}
