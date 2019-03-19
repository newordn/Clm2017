<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
	protected $table ="classe";
	public $timestamps = false;
  
    public function eleves()
    {
    	return $this->hasMany('App\Eleve');
    }
    public function term()
    {
        return $this->hasOne('App\Term');
    }
}
