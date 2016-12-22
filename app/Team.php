<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'club_id', 'category_id'];

    protected $table = "teams";

    public function documents() {
        return $this->hasMany('App\Document');
    }

    public function categories() {
        return $this->hasOne('App\Category');
    }

    public function clubs() {
        return $this->hasOne('App\Clubs');
    }

    public function players() {
        return $this->belongsToMany('App\Player');
    }
}
