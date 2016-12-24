<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Severity extends Model
{
    protected $fillable = ['name' ,'color'];

    protected $table = "severities";

    public function pathologies() {
        return $this->belongsToMany('App\Pathology');
    }
}
