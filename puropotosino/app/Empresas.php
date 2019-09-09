<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
  public $timestamps = false;
  protected $primaryKey = 'ID_empresa';
  protected $fillable = array('ID_empresa', 'descripcion', 'operacion',
    'tiempo_operacion', 'alta_shcp','regimen', 'tipo_incubacion',
    'comprobante_incubacion', 'comprobante_shcp','disenio_imagen',
    'codigo_barras', 'FDA', 'facebook', 'twitter', 'instagram',
    'stio_web', 'ID_categoria', 'ID_subcategoria', 'fecha_inscripcion',
    'fase', 'comprobante_domicilio', 'ine', 'RFC', 'CURP');
  protected $table = 'admpuropotosino.TCEmpresaPP';

}
