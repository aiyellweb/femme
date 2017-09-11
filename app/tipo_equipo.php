<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_equipo extends Model
{
    
  protected $table="tipo_equipo";

    public function equipo(){
    	return $this->hasMany('App\equipo');
    }

}
