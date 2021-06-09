<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TMRegistroContadorPP extends Model
{
    //
    protected $connection = 'pgsqlContador';
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = array('id','ip','host','navegador','ciudad'.'pais','cp','latitud','longitud','time','fecha','usuario','web','pagina','type');
    protected $table = 'contador.registropp';
    protected $primaryKey = 'id';
}
