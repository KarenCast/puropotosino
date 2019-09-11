<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
  public $timestamps = false;
  protected $primaryKey = 'ID_empresa';
  protected $fillable = array('ID_contacto', 'nombre', 'APaterno', 'AMaterno', 'celular', 'correo_electronico',
       'direccion', 'ID_empresa', 'telefono');
     protected $table = 'admpuropotosino.TCContacto';

}
