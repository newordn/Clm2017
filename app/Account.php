<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table ="account";
    public $timestamps = false;

    public function eleve()
    {
    	return $this->belongsTo('App\Eleve');
    }
  

    

}
