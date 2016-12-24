<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muscle extends Model
{
    protected $fillable = ['name'];

    protected $table = "muscles";

    public function pathologies() {
        return $this->belongsToMany('App\Pathology');
    }
}
