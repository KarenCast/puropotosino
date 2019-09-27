<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  public $timestamps = false;
  protected $primaryKey = 'ID_producto';
  protected $fillable = array('ID_producto', 'nombre', 'descripcion', 'imagen', 'ID_empresa', 'tabla_nutricional', 'ID_marca');
  protected $table = 'admpuropotosino.TCProducto';
}
