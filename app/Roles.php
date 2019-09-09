<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'ID_rol';
    protected $fillable = array('ID_rol', 'descripcion', 'nombre_menu', 'estado', 'usuario_sistema',
       'fecha_actualizacion');
    protected $table = 'admseguridad.TRUsuariosRol';

}
