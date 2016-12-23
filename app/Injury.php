<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Injury extends Model
{
    protected $fillable = ['name', 'date_injury', 'date_recover_injury', 'player_id', 'team_id', 'pathology_id'];

    protected $table = "injuries";

    public function pathologies() {
        return $this->hasOne('App\Pathology');
    }
}
