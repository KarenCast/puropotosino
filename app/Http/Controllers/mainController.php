<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    function inicio(){
        return view('front/inicio');
      //  return redirect('https://municipiodeslp.gob.mx/ventanilla/');
    }

    function testimonios(){
      $contenido = DB::table('admpuropotosino'.'.'.'TMContenido')
      ->where('tipo','1')
      ->get();

      $contenido2 = DB::table('admpuropotosino'.'.'.'TMContenido')
      ->where('tipo','2')
      ->get();

        return view('front.testimonios')->with('contenido',$contenido)->with('contenido2',$contenido2);
    }

    function registro(){
        return view('front.registro')->with('Error', null);
    }


}
