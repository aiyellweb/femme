<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table="rol";
    protected $fillable=['nombre_rol','descripcion'];


    public function User(){
    	return $this->hasMany('App\User');
    }
}
