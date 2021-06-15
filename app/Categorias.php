<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubCategorias;

class Categorias extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'ID_categoria';
    protected $fillable = array('ID_categoria', 'nombre', 'descripcion', 'imagen', 'titulo', 'activo');
    protected $table = 'admpuropotosino.TCCategoria';

    public function subCategorias()
    {
        return $this->hasMany(SubCategorias::class,  'ID_categoria', 'ID_categoria');
    }
}
