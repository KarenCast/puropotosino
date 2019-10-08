<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;


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

    function productos(){
        return view('front.productos');
    }

    function programas(){
        return view('front.programas');
    }


    function categorias(){

      $cat = DB::table('admpuropotosino'.'.'.'TCCategoria')
      ->where('activo',true)
      ->get();

      $sub = DB::table('admpuropotosino'.'.'.'TCSubCategoria')
      ->where('activo',true)
      ->get();

      $i=0; $n;
      foreach ($cat as $key) {
        $n[$i]= str_replace(" ","",$key->nombre);
        $i++;
      }
      $j=0; $m;
      foreach ($sub as $k) {
        $m[$j]= str_replace(" ","",$k->nombre);
        $j++;
      }
        return view('front.mostrarcategorias')->with('categoria',$cat)->with('nombre', $n)->with('subcat',$sub)->with('nombres', $m);
    }

    function registro(){
        return view('front.registro')->with('Error', null);
    }

    function getProducto(){
      $cat = DB::table('admpuropotosino'.'.'.'TCProducto')
      ->join('admpuropotosino'.'.'.'TMRegistroMarca',function($join){
        $join->on('admpuropotosino'.'.'.'TMRegistroMarca.ID_marca', '=', 'admpuropotosino'.'.'.'TCProducto.ID_marca');
      })
      ->join('admpuropotosino'.'.'.'TCEmpresaPP',function($join){
        $join->on('admpuropotosino'.'.'.'TCEmpresaPP.ID_empresa', '=', 'admpuropotosino'.'.'.'TCProducto.ID_empresa');
        $join->join('admseguridad'.'.'.'TCPersonasMorales',function($join){
          $join->on('admseguridad'.'.'.'TCPersonasMorales.RFC', '=', 'admpuropotosino'.'.'.'TCEmpresaPP.RFC');
        });
      })

      ->where('fase','>=', '3')
      ->where('fase','<=', '7')
      ->Orwhere('fase','>=', '13')
      ->where('fase','<=', '17')
      ->get();
      return Datatables::of($cat)
      ->make(true);
    }


}
