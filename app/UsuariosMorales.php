<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuariosMorales extends Model
{
  public $timestamps = false;
  protected $fillable = array('RFC',
                              'razonsocial',
                              'contrasena',
                              'nombre_representante',
                              'apellidop_representante',
                              'apellidom_representante',
                              'curp_representante',
                              'rfc_representante',
                              'telefono',
                              'cve_municipio',
                              'cve_estado',
                              'id_calle',
                              'id_colonia',
                              'num_int',
                              'num_ext',
                              'codigo_postal',
                              'correo_electronico',
                              'sexo',
                              'calle',
                              'colonia',
                              'fecha_alta',
                              'token',
                              'estado',
                              'usuario_sistema',
                              'fecha_actualizacion',
                              'fecha_nac_representante',
                              'intentos',
                              'bloqueado',
                              'Id_sector');
  protected $table = 'admseguridad.TCPersonasMorales';
  protected $primaryKey = 'RFC';
  public $incrementing = false;
}
