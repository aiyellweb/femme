<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipo extends Model
{
    protected $table = 'equipo';
    protected $fillable = ['tipo_equipo_id', 'nombre_equipo', 'nombre_usuario', 'marca', 'modelo_equipo', 'sistema', 'procesador', 'ram', 'discoduro', 'parlantes', 'teclado', 'ip', 'mouse', 'serial_sistema', 'serial_procesador', 'serial_discoduro', 'serial_ram', 'serial_parlantes', 'marca_ram', 'marca_mouse', 'marca_procesador', 'marca_sistema', 'marca_parlantes', 'modelo_mouse', 'modelo_procesador', 'modelo_monitor', 'modelo_parlantes', 'modelo_teclado', 'modelo_ram', 'otros_descripcion', 'marca_unica', 'estado_id','fecha_crea'];



    public function scopeLock($query)
{
    return $query->where('locked', 0)->update(['locked' => 1]);
}



function Tipo_equipo(){
	return $this->belongsTo('App\tipo_equipo','tipo_equipo_id');

}


}
