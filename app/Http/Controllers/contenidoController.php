<?php

namespace App\Http\Controllers;
use App\Contenido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Storage;
use Image;
class contenidoController extends Controller
{
  function viewContenido(){
    $n;
    $foo = $_SERVER["REQUEST_URI"];
    if (strpos($foo, 'Recetas') !== false) {
      $n=1;
    }else {
      $n=0;
    }
    return view('admin.altacontenido')->with('n',$n);
  }


  function viewCont(){
    return view('admin.consultacontenido');
  }


  function getCont($n,$t){

  if ($n==1) {
    $contenido = DB::table('admpuropotosino'.'.'.'TMContenido')
    ->where('tipo', $t)
    ->get();
  }else{
    $contenido = DB::table('admpuropotosino'.'.'.'TMContenido')
    ->where('tipo', '0' )
    ->get();
  }
    return Datatables::of($contenido)
    ->make(true);

  }


  function store(Request $request){
    try {
    //  return "hello";
      $name = $request->nombre;
      $n= str_replace(" ","",$name);

      $path =  public_path()."\contenido\\";
      $carpeta = $path;

       if (!file_exists($carpeta)){
         try {
           mkdir($carpeta, 0777, true);
           $res = "";
         }catch (\Exception $e) {
           return "no se creo";
         }
       }

        $fileimg= $request->file('imagen');
        $filenamei = $n.'.'.$fileimg->getClientOriginalExtension();
        $ruta = $carpeta.'/'.$filenamei;


        $cont = new Contenido;
        $cont-> fecha_carga = "Now()";
        $cont-> tipo= $request->tipo;
        $cont-> titulo = $request->nombre;
        $cont-> imagen = $filenamei;
        $cont-> descripcion = $request->desc;



        if($cont -> save()){
          $img = Image::make($fileimg->getRealPath());
          $img->save($ruta, 30);
        }else{
          return redirect('/altaCategorias')->with('Error', 'Llave repetida');
        }
          return redirect('/consultaCat');

    }catch (\Exception $e) {

      if(strpos($e->getMessage(),"Ya existe la llave"))
      return redirect('/altaCategorias')->with('Error', 'Llave repetida');
      echo $e->getMessage();

    }
  }

  function viewActualizaCont($n){

      $test = Contenido::where('ID_contenido', $n)->first();
       return view('admin.actualizacontenido')->with('test',$test);
  }


  function update(Request $request){




    if ($request->imagen!=null || $request->imagen!='') {
      $name = $request->nombre;
      $n= str_replace(" ","",$name);

      $path =  public_path()."\contenido\\";
      $carpeta = $path;

      $fileimg= $request->file('imagen');
      $filenamei = $n.'.'.$fileimg->getClientOriginalExtension();
      $ruta = $carpeta.'/'.$filenamei;

      try {
      $cont = Contenido::where('ID_contenido', $request->id)
      ->update([
        'titulo' => $request->nombre,
        'imagen' => $filenamei,
        'descripcion' => $request->desc
      ]);

    } catch (\Exception $e) {
        return $e->getMessage();
    }

      $img = Image::make($fileimg->getRealPath());
      $img->save($ruta, 30);
    }else {
      try {
        $cont = Contenido::where('ID_contenido', $request->id)
        ->update([
          'titulo' => $request->nombre,
          'descripcion' => $request->desc
        ]);
      } catch (\Exception $e) {
        return $e->getMessage();
      }

    }


    return redirect('/consultaTestimonios');

  }

}