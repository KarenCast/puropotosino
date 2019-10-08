<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuariosExternos;
use App\UsuariosInternos;
use App\UsuariosMorales;
use App\Empresas;
use App\Producto;
use App\Roles;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\Datatables\Datatables;

class productoController extends Controller
{

    function viewAltaProducto(){
      $marcas = DB::table('admpuropotosino'.'.'.'TMRegistroMarca')
      ->where('ID_empresa', session('ID_e'))
      ->get();
      return view('User.altaProducto')->with('marcas',$marcas);

    }

    function viewConsultaProducto(){

         return view('User.consultaProducto');

    }


    function storeP(Request $request){

        set_time_limit(0);
        if (session('ID_e')!=null) {
          $cat = DB::table('admpuropotosino'.'.'.'TCProducto')
          ->where('ID_empresa', session('ID_e'))
          ->count();
          $number= $cat + 1;

        $name= session('ID_e');
        $name_arch= strtotime("now");
        $carpeta = storage_path();
        $carpeta = $carpeta.'/app/Files/'.$name.'/Producto';

        $ruta = '/Files//'.$name.'/Producto//';
        if (!file_exists($carpeta)){
          try {
            mkdir($carpeta, 0777, true);
            $res = "";
          }catch (\Exception $e) {
            return "no se creo";
          }

        }

        $fileh = $request->file('tabla');
        if ($fileh!=null) {
          $filenameh = $name_arch.'_TablaNutricional'.'.'.$fileh->getClientOriginalExtension();
        }else{
          $filenameh="";
        }



        $fileimg = $request->file('imagen');
        if ($fileimg!=null) {
          $filenameimg = $name_arch.'_ImagenProducto'.'.'.$fileimg->getClientOriginalExtension();
        }else{
          $filenameimg="";
        }



        try {
          try {
            $producto = new Producto;

            $producto-> nombre = $request->nombre;
            $producto-> descripcion = $request->descripcion;
            $producto-> tabla_nutricional = $filenameh;
            $producto-> imagen = $filenameimg;
            $producto-> ID_marca = $request->marca;
            $producto-> ID_empresa = session('ID_e');
            $producto->save();

          } catch (\Exception $e) {
            return back()->with('Error', 'No se pudo guardar producto');
          }



          if ($fileh!=null) {
            try {
              $rutah = $ruta.$filenameh;
              \Storage::disk('local')->put($rutah,  \File::get($fileh));
            } catch (\Exception $e) {
              return back()->with('Error', 'No se cargar tabla');
            }
          }

        try {




          $carpeta2 = public_path();

          $carpeta2 = $carpeta2.'/Files//'.$name.'//Productos/';
          if (!file_exists($carpeta2)){
            try {
              mkdir($carpeta2, 0777, true);
              $res = "";
            }catch (\Exception $e) {
              return "no se creo";
            }
          }



                try {

                    if(strlen($fileimg->getClientOriginalName()) > 0){

                        $rutaInfo = $carpeta2."/".$filenameimg;
                        $img = Image::make($fileimg->getRealPath());
                        $img->save($rutaInfo, 30);
                      }else {
                       $res = "Fallo al cargar uno o mas archivos";
                       return back()->with('Error', $res);
                      }

                  } catch (\Exception $e) {
                    // session(['Error' => 'No se pudo guardar CV, intenta con otro archivo.']);
                    // return redirect('/TodasVacantes')->with('Error', 'No se pudo guardar CV, intenta con otro archivo.');
                  return back()->with('Error', 'No se pudo guardar imagen');
                  }

                } catch (\Exception $e) {
                  return back()->with('Error', 'No se guardar');
                }

            return redirect('./consultaProductos');
        } catch (\Exception $e) {
          return back()->with('Error', 'No se pudo crear producto');
        }

      }else{
      return back()->with('Error', 'No puedes ser reconocido como empresa, intenta iniciar sesión nuevamente');

      }


    }


      function getProducto( )
      {
          $cat = DB::table('admpuropotosino'.'.'.'TCProducto')
          ->join('admpuropotosino'.'.'.'TMRegistroMarca',function($join){
            $join->on('admpuropotosino'.'.'.'TMRegistroMarca.ID_marca', '=', 'admpuropotosino'.'.'.'TCProducto.ID_marca');
          })
          ->where('admpuropotosino'.'.'.'TCProducto.ID_empresa', session('ID_e'))

          ->get();
          return Datatables::of($cat)
          ->make(true);
      }


      function viewActualizaProducto($n){
        $marcas = DB::table('admpuropotosino'.'.'.'TMRegistroMarca')
        ->where('ID_empresa', session('ID_e'))
        ->get();
        $producto = DB::table('admpuropotosino'.'.'.'TCProducto')
        ->where('ID_producto', $n)
        ->first();
        return view('User.editaProducto')->with('producto', $producto)->with('marcas', $marcas);
      }


      function uproducto(Request $request){


        $name= session('ID_e');
        $name_arch= strtotime("now");
        $carpeta = storage_path();

        $carpeta = $carpeta.'/app/Files/'.$name.'/Producto';

        $ruta = '/Files//'.$name.'/Producto//';
        if (!file_exists($carpeta)){
          try {
            mkdir($carpeta, 0777, true);
            $res = "";
          }catch (\Exception $e) {
            return "no se creo";
          }
        }

        $fileh = $request->file('tabla');
        if ($fileh!=null) {
          $filenameh = $name_arch.'_TablaNutricional'.'.'.$fileh->getClientOriginalExtension();
        }



        $fileimg = $request->file('imagen');
        if ($fileimg!=null) {
          $cat = DB::table('admpuropotosino'.'.'.'TCProducto')
          ->where('ID_producto', $request->id)
          ->first();

          $namep= $cat->imagen;
          $porciones = explode(".", $namep);


          $filenameimg = $name_arch.'_ImagenProducto'.'.'.$fileimg->getClientOriginalExtension();
        }else{
          $filenameimg="";
        }


        if ($fileh!=null) {
            try {
              $rutah = $ruta.$filenameh;
              \Storage::disk('local')->put($rutah,  \File::get($fileh));
              try {
                  $cont = Producto::where('ID_producto', $request->id)
                    ->update([
                      'tabla_nutricional' => $filenameh,
                    ]);
              } catch (\Exception $e) {
                  return back()->with('Error', 'No se pudo actualizar tabla');
              }
            } catch (\Exception $e) {
              return back()->with('Error', 'No se pudo guardar tabla');
            }
          }

        try {

          $carpeta2 = public_path();

          $carpeta2 = $carpeta2.'/Files//'.$name.'//Productos/';
          if (!file_exists($carpeta2)){
            try {
              mkdir($carpeta2, 0777, true);
              $res = "";
            }catch (\Exception $e) {
              return "no se creo";
            }
          }

                try {
                  if ($fileimg!=null) {
                    if(strlen($fileimg->getClientOriginalName()) > 0){

                        $rutaInfo = $carpeta2."/".$filenameimg;
                        $img = Image::make($fileimg->getRealPath());
                        $img->save($rutaInfo, 30);
                        try {
                            $cont = Producto::where('ID_producto', $request->id)
                              ->update([
                                'imagen' => $filenameimg,

                              ]);
                        } catch (\Exception $e) {
                            return back()->with('Error', 'No se pudo guardar imagen');
                        }
                      }else {
                       $res = "Fallo al cargar uno o mas archivos";
                       return back()->with('Error', $res);
                      }
                    }
                  } catch (\Exception $e) {
                    // session(['Error' => 'No se pudo guardar CV, intenta con otro archivo.']);
                    // return redirect('/TodasVacantes')->with('Error', 'No se pudo guardar CV, intenta con otro archivo.');
                    return back()->with('Error', 'No se pudo guardar');
                  }

        } catch (\Exception $e) {
          return back()->with('Error', 'No se completo la solicitud');
        }
        try {
            $cont = Producto::where('ID_producto', $request->id)
              ->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'ID_marca' => $request->marca,
              ]);
        } catch (\Exception $e) {
            return back()->with('Error', 'No se pudo actualizar');
        }

        return view('User.consultaProducto');

      }

function updateimgP(Request $request){
  $name= $request->idempresa;
  $name_arch= strtotime("now");


  $fileimg = $request->file('nuevaimagen');
  if ($fileimg!=null) {
    $cat = DB::table('admpuropotosino'.'.'.'TCProducto')
    ->where('ID_producto', $request->id)
    ->first();

    // $namep= $cat->imagen;
    // $porciones = explode(".", $namep);


    $filenameimg = $name_arch.'_ImagenProducto'.'.'.$fileimg->getClientOriginalExtension();
  }else{
    $filenameimg="";
  }

  try {

    $carpeta2 = public_path();

    $carpeta2 = $carpeta2.'/Files//'.$name.'//Productos/';
    if (!file_exists($carpeta2)){
      try {
        mkdir($carpeta2, 0777, true);
        $res = "";
      }catch (\Exception $e) {
        return "no se creo";
      }
    }

          try {
            if ($fileimg!=null) {
              if(strlen($fileimg->getClientOriginalName()) > 0){

                  $rutaInfo = $carpeta2."/".$filenameimg;
                  $img = Image::make($fileimg->getRealPath());
                  $img->save($rutaInfo, 30);
                  try {
                      $cont = Producto::where('ID_producto', $request->id)
                        ->update([
                          'imagen' => $filenameimg,

                        ]);
                  } catch (\Exception $e) {
                      return back()->with('Error', 'No se pudo guardar imagen');
                  }
                }else {
                 $res = "Fallo al cargar uno o mas archivos";
                 return back()->with('Error', $res);
                }
              }
            } catch (\Exception $e) {
              // session(['Error' => 'No se pudo guardar CV, intenta con otro archivo.']);
              // return redirect('/TodasVacantes')->with('Error', 'No se pudo guardar CV, intenta con otro archivo.');
              return back()->with('Error', 'No se pudo guardar');
            }

  } catch (\Exception $e) {
    return back()->with('Error', 'No se completo la solicitud');
  }
  return redirect('/consultaProductospe/'.$request->idempresa);
}


// PRODUCTO por empresas

function viewConsultaProductope($n){

     return view('admin.consultaProductos')->with('n',$n);

}

function getProductope($n)
{
    $cat = DB::table('admpuropotosino'.'.'.'TCProducto')
    ->join('admpuropotosino'.'.'.'TMRegistroMarca',function($join){
      $join->on('admpuropotosino'.'.'.'TMRegistroMarca.ID_marca', '=', 'admpuropotosino'.'.'.'TCProducto.ID_marca');
    })
    ->where('admpuropotosino'.'.'.'TCProducto.ID_empresa', $n)

    ->get();
    return Datatables::of($cat)
    ->make(true);


}

  }
