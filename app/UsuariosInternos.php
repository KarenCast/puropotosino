<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuariosInternos extends Model
{

    public $timestamps = false;
    protected $fillable = array('RUE',
                          'contrasena',
                          'fecha_alta',
                          'no_nomina',
                          'tipo_nomina',
                          'extension',
                          'estado',
                          'usuario_sistema',
                          'fecha_actualizacion',
                          'bloqueado',
                          'token',
                          'intentos',
                          'fecha_token',
                          'session',
                          'ID_lugartrabajo',
                          'ID_delegacion');
    protected $table = 'admseguridad.TCUsuariosInternos';
    protected $primaryKey = 'RUE';
    public $incrementing = false;
  }
