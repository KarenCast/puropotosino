<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    function inicio(){
        return view('front/inicio');
    }

    function testimonios(){
      $contenido = DB::table('admpuropotosino'.'.'.'TMContenido')
      ->where('tipo','1')
      ->get();

      $contenido2 = DB::table('admpuropotosino'.'.'.'TMContenido')
      ->where('tipo','2')
      ->get();

        return view('front/testimonios')->with('contenido',$contenido)->with('contenido2',$contenido2);
    }

    function registro(){
        return view('front/registro')->with('Error', null);
    }

    function register(){
        $fecha = date('Y-m-d');
        $Estados = DB::table('admcomun'.".".'TCEstados')->orderBy('descripción')->get();
        $Sector = DB::table('admseguridad'.".".'TCSectorEmpresarial')->orderBy('descripcion')->get();
        $colonias = DB::table('admcomun'.".".'TCColonias')->orderBy('descripcion')->get();
        $calles = DB::table('admcomun'.".".'TCCalles')->orderBy('descripcion')->get();
        $estadoCivil = DB::table('admcomun'.".".'TCEstado_civil')->orderBy('descripcion')->get();
        $nivelAcademico = DB::table('admcomun'.".".'TCNivelacademico')->orderBy('descripcion')->get();

        return view('User.register')
               ->with('fecha', $fecha)
               ->with('estados', $Estados)
               ->with('sector',$Sector)
               ->with('colonias', $colonias)
               ->with('estadoCivil', $estadoCivil)
               ->with('nivelAcademico', $nivelAcademico)
               ->with('calles', $calles);
    }
}
