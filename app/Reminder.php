<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = ['title', 'day', 'icon', 'description', 'color', 'team_id'];

    protected $table = "reminders";

    public function teams() {
        return $this->belongsToMany('App\Team');
    }
}
