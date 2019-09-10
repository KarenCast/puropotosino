<?php


namespace App\Http\Controllers;
use App\Empresas;
use App\UsuariosMorales;
use App\subcat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\Datatables\Datatables;
use Image;

use Illuminate\Support\Facades\Storage;



class subcatController extends Controller
{
  function viewSub(){
      return view('admin.consultasub');
  }

  function getSub( )
  {

      $cat = DB::table('admpuropotosino'.'.'.'TCSubCategoria')
      ->get();
      return Datatables::of($cat)
      ->make(true);

  }


  function altaS(){
    if (strcmp(session('tipoinicio'), 'admin')==0) {
      // $delegacion = DB::table('admcomun'.".".'TCDelegacion')->get();
      // $civil = DB::table('admcomun'.".".'TCEstado_civil')->get();
      $categorias = DB::table('admpuropotosino'.".".'TCCategoria')->get();
      // $catresas = DB::table('admbolsa'.".".'TCEmpresas')->where('RFC_camara',session('RFC'))->get();
      return view('admin.altasub')->with('categorias', $categorias);
    }else{
      return redirect('/Login-admin');
    }
  }


  function storeS(Request $request){

      //  return view('bolsatrabajo.bolsatrabajo')->with('Activo', null);
          try {
          //  return "hello";
            $name = $request->nombre;
            $n= str_replace(" ","",$name);

            $path =  public_path()."\subcategorias\\";

            $carpeta = $path.'/'.$n;

             if (!file_exists($carpeta)){
               try {
                 mkdir($carpeta, 0777, true);
                 $res = "";
               }catch (\Exception $e) {
                 return "no se creó";
               }
             }else {
                return redirect('/altaSubcategorias')->with('Error', 'Ya existe una Sub-categoria con el mismo nombre');
             }


             $total = DB::table('admpuropotosino'.".".'TCSubCategoria')->where('ID_categoria', $request->id_p)->count();
             $total=$total+1;

            $fileimg= $request->file('imagen');
            $filenamei = $n.'.'.$fileimg->getClientOriginalExtension();
            $ruta = $carpeta.'/'.$filenamei;

            $cat = new subcat;
            $cat-> nombre = $request->nombre;
            $cat-> descripcion = $request->desc;
            $cat-> imagen = $filenamei;
            $cat-> ID_categoria = $request->id_p;
            $cat-> ID_subcategoria = $total;

              if($cat -> save()){
              $img = Image::make($fileimg->getRealPath());

              // $img->resize(null, 100);
              $img->save($ruta, 30);

              }else {
                return redirect('/altaSubcategorias')->with('Error', 'Llave repetida');
              }

              return redirect('/consultaSub');
            //   return redirect('/consultaEmpresas')->with('Error', null);
            // }else {
            //   return redirect('/consultaEmpresas')->with('Error', "No se pudo almacenar");
            // }


          } catch (\Exception $e) {
            if(strpos($e->getMessage(),"Ya existe la llave"))
            return redirect('/altaSubcategorias')->with('Error', 'Llave repetida');
            echo $e->getMessage();

          }
      }



      public function deleteS(Request $request)
      {
          try {
            $eli = cat::find($request->id_cat);
            $eli->delete();
            return redirect('/consultaSub')->with('Error', null);
          } catch (\Exception $e) {

            return redirect('/consultaSub')->with('Error', 'Error al eliminar la vacante');
          }

      }


}