<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuariosExternos extends Model
{
  public $timestamps = false;
  protected $fillable = array('CURP',
                        'contrasena',
                        'nombre',
                        'apellido_paterno',
                        'apellido_materno',
                        'fecha_nacimiento',
                        'fecha_alta',
                        'correo_electronico',
                        'telefono_particular',
                        'no_ext',
                        'no_interior',
                        'sexo',
                        'rfc',
                        'id_calle',
                        'id_colonia',
                        'estado',
                        'usuario_sistema',
                        'fecha_actualizacion',
                        'bloqueado',
                        'token',
                        'intentos',
                        'fecha_token',
                        'calle',
                        'colonia',
                        'cve_estado',
                        'cve_municipio',
                        'codigo_postal',
                        'cve_municipio2',
                        'cve_estado2',
                        'ID_estadoc',
                        'id_nivelacademico');
  protected $table = 'admseguridad.TCUsuariosExternos';
  protected $primaryKey = 'CURP';
  public $incrementing = false;
}
