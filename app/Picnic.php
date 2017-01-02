<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picnic extends Model
{
     protected $fillable = array('name', 'taste_level');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // define a many to many relationship
    // also call the linking table
    protected $table = 'picnics';
    public function bears() {
        return $this->belongsToMany('Bear', 'bear_picnic', 'picnic_id', 'bear_id');
    }
}
