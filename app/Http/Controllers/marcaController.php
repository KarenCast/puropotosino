<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuariosExternos;
use App\UsuariosInternos;
use App\UsuariosMorales;
use App\Empresas;
use App\Marca;
use App\Roles;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\Datatables\Datatables;


class marcaController extends Controller
{

  function viewAltaMarca(){

       return view('User.altaRegistroMarca');

  }

  function viewConsultaMarca(){

       return view('User.consultaRegistroMarca');

  }


  function storeM(Request $request){

      set_time_limit(0);

      $name= session('ID_e');
      $name_arch= strtotime("now");
      $carpeta = storage_path();
      $carpeta = $carpeta.'/app/Files/'.$name.'/Marca';
      $ruta = '/Files//'.$name.'/Marca//';
      if (!file_exists($carpeta)){
        try {
          mkdir($carpeta, 0777, true);
          $res = "";
        }catch (\Exception $e) {
          return "no se creo";
        }
      }

      $fileh = $request->file('registro_marca');
      if ($fileh!=null) {
        $filenameh = $name_arch.'_Marca'.'.'.$fileh->getClientOriginalExtension();
      }else{
        $filenameh="";
      }

      try {
        try {
          $marca = new Marca;

          $marca-> nombre_marca = $request->nombre_marca;
          $marca-> archivo = $filenameh;
          $marca-> ID_empresa = session('ID_e');
          $marca->save();
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

          return redirect('inicioUser');
      } catch (\Exception $e) {
        return $e->getMessage();
      }
  }

    function getMarca( )
    {
        $cat = DB::table('admpuropotosino'.'.'.'TMRegistroMarca')
        ->where('ID_empresa', session('ID_e'))
        ->get();
        return Datatables::of($cat)
        ->make(true);
    }



    function viewActualizamarca($n){
      $marcas = DB::table('admpuropotosino'.'.'.'TMRegistroMarca')
      ->where('ID_marca', $n)
      ->first();


      return view('User.editaMarca')->with('marcas', $marcas);
    }


    function umarca(Request $request){

      $name= session('ID_e');
      $name_arch= strtotime("now");
      $carpeta = storage_path();
      $carpeta = $carpeta.'/app/Files/'.$name.'/Marca';
      $ruta = '/Files//'.$name.'/Marca//';
      if (!file_exists($carpeta)){
        try {
          mkdir($carpeta, 0777, true);
          $res = "";
        }catch (\Exception $e) {
          return "no se creó";
        }
      }

      $fileh = $request->file('registro_marca');
      if ($fileh!=null) {
        $filenameh = $name_arch.'_Marca'.'.'.$fileh->getClientOriginalExtension();
      }

      if ($fileh!=null) {
          try {
            $rutah = $ruta.$filenameh;
            \Storage::disk('local')->put($rutah,  \File::get($fileh));
          } catch (\Exception $e) {
            return $e->getMessage();
          }
          try {
              $cont = Marca::where('ID_marca', $request->id)
                ->update([
                  'nombre_marca' => $request->nombre_marca,
                  'archivo' => $filenameh,
                ]);
          } catch (\Exception $e) {
              return $e->getMessage();
          }
        }else{

      try {
          $cont = Marca::where('ID_marca', $request->id)
            ->update([
              'nombre_marca' => $request->nombre_marca,

            ]);
      } catch (\Exception $e) {
          return $e->getMessage();
      }
}
      return view('User.consultaRegistroMarca');

    }

}
