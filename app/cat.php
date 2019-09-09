<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class cat extends Model
{
  public $timestamps = false;
  protected $primaryKey = 'ID_categoria';
  protected $fillable = array('ID_categoria', 'nombre', 'descripcion', 'imagen', 'titulo');
  protected $table = 'admpuropotosino.TCCategoria';
}
