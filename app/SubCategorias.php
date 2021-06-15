<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategorias extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'ID_subcategoria';
    protected $fillable = array('ID_categoria', 'nombre', 'descripcion', 'imagen', 'ID_subcategoria', 'activo');
    protected $table = 'admpuropotosino.TCSubCategoria';
}
