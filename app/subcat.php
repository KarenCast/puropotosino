<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class subcat extends Model
{
    //  "ID_categoria", nombre, descripcion, imagen, "ID_subcategoria"
    public $timestamps = false;
    protected $primaryKey = 'ID_subcategoria';
    protected $fillable = array('ID_categoria', 'nombre', 'descripcion', 'imagen', 'ID_subcategoria');
    protected $table = 'admpuropotosino.TCSubCategoria';
}
