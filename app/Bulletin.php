<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    protected $table = "bulletin";
    public $timestamps = false;

    public function matieres()
    {
    	return $this->hasMany('App\Matiere');
    }

    public function eleve()
    {
    	return $this->belongsTo('App\Eleve');
    }
}
