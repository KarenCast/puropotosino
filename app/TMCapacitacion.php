<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TMCapacitacion extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = array('folio','nombre','correo','telefono','comentario');
    protected $table = 'admpuropotosino.TMCapacitacion';
    protected $primaryKey = 'folio';
}
