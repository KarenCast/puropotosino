<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\UsuariosMorales;
use App\Contacto;
use App\UsuariosExternos;

class Empresas extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'ID_empresa';
    protected $fillable = array(
        'ID_empresa', 'descripcion', 'operacion',
        'tiempo_operacion', 'alta_shcp', 'regimen', 'tipo_incubacion',
        'comprobante_incubacion', 'comprobante_shcp', 'disenio_imagen',
        'codigo_barras', 'FDA', 'facebook', 'twitter', 'instagram',
        'stio_web', 'ID_categoria', 'ID_subcategoria', 'fecha_inscripcion',
        'fase', 'comprobante_domicilio', 'ine', 'RFC', 'CURP', 'activo', 'comprobante_exportacion', 'fisica', 'razon_social'
    );
    protected $table = 'admpuropotosino.TCEmpresaPP';

    public function usrMoral()
    {
        return $this->hasOne(UsuariosMorales::class,  'RFC', 'RFC');
    }

    public function usrFisica()
    {
        return $this->hasOne(UsuariosExternos::class,  'CURP', 'CURP');
    }

    public function contacto()
    {
        return $this->hasOne(Contacto::class,  'ID_empresa', 'ID_empresa');
    }
}
