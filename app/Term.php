<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $term ="terms";
    public $timestamps = false;

    public function classes()
    {
        return $this->hasMany('App\Classe');
    }


}