<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bear extends Model
{
    protected $fillable = array('name', 'type', 'danger_level');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // each bear HAS one fish to eat
    public function fish() {
        return $this->hasOne('Fish'); // this matches the Eloquent model
    }

    // each bear climbs many trees
    public function trees() {
        return $this->hasMany('Tree');
    }

    // each bear BELONGS to many picnic
    // define our pivot table also
    public function picnics() {
        return $this->belongsToMany('Picnic', 'bear_picnic', 'bear_id', 'picnic_id');
    }
}
