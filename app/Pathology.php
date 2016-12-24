<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pathology extends Model
{
    protected $fillable = ['name', 'muscle_id', 'severity_id'];

    protected $table = "pathologies";

    public function injuries() {
        return $this->belongsToMany('App\Injury');
    }

    public function muscles() {
        return $this->hasOne('App\Muscle');
    }

    public function severities() {
        return $this->hasOne('App\Severity');
    }
}
