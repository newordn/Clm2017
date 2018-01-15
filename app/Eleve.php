<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eleve extends Model
{
	protected $table ="eleve";
	public $timestamps = false;
    public function account() 

    {

        return $this->hasOne('App\Account');

    }

    public function classe() 

    {

        return $this->belongsTo('App\Classe');

    }

    public function bulletin()
    {
        return $this->hasOne('App\Bulletin');
    }

    public function absences()
    {
        return $this->hasMany('App\Absence');
    }
}
