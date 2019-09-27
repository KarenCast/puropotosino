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

        $name= session('ID_e');

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
          $filenameh = $name.'_TablaNutricional'.'.'.$fileh->getClientOriginalExtension();
        }else{
          $filenameh="";
        }



        $fileimg = $request->file('imagen');
        if ($fileimg!=null) {
          $cat = DB::table('admpuropotosino'.'.'.'TCProducto')
          ->where('ID_empresa', session('ID_e'))
          ->count();

          $number= $cat + 1;
          $filenameimg = $name.'_'.$number.'_ImagenProducto'.'.'.$fileimg->getClientOriginalExtension();
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
            return $e->getMessage();
          }



          if ($fileh!=null) {
            try {
              $rutah = $ruta.$filenameh;
              \Storage::disk('local')->put($rutah,  \File::get($fileh));
            } catch (\Exception $e) {
              return $e->getMessage();
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
                    return $e->getMessage();
                  }

                } catch (\Exception $e) {
                  return $e->getMessage();
                }

            return redirect('inicioUser');
        } catch (\Exception $e) {
          return $e->getMessage();
        }

      }else{
      //  return back()->with('Error', 'No se pudo guardar' );

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





  }
