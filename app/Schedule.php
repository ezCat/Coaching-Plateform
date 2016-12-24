<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['date_match', 'club_id', 'team_id', 'place_id'];

    protected $table = "schedules";

    public function teams() {
        return $this->belongsToMany('App\Team');
    }

    public function places() {
        return $this->hasOne('App\Place');
    }

    public function clubs() {
        return $this->hasOne('App\Club');
    }
}
