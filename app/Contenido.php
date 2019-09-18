<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
  public $timestamps = false;
  protected $primaryKey = 'ID_contenido';
  protected $fillable = array('ID_contenido', 'fecha_carga', 'tipo', 'titulo', 'imagen', 'descripcion');
  protected $table = 'admpuropotosino.TMContenido';
}
