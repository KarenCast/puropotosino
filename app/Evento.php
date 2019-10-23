<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public $timestamps = false;
    protected $fillable = array('ID_evento', 'fecha_evento', 'nombre_evento', 'costo', 'tema', 'observaciones', 'requisitos', 'foto', 'lugar');
    protected $table = 'admpuropotosino.TMEventos';
    protected $primaryKey = 'ID_evento';
    //public $incrementing = false;
  
}
