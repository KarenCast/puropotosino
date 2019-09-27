<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
  public $timestamps = false;
  protected $primaryKey = 'ID_marca';
  protected $fillable = array('ID_marca', 'archivo', 'nombre_marca', 'ID_empresa');
  protected $table = 'admpuropotosino.TMRegistroMarca';
}
