<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['name', 'link', 'team_id'];

    protected $table = "documents";

    public function teams() {
        return $this->belongsTo('App\Team');
    }
}
