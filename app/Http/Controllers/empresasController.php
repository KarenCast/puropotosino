<?php

namespace App\Http\Controllers;
use App\Empresas;
use App\UsuariosMorales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\Datatables\Datatables;
use Image;

use Illuminate\Support\Facades\Storage;



class empresasController extends Controller
{
  function storeE(Request $request){

    // Inicializar variables
    $filename="";
    $filenamec="";

    $filenamei="";
    $filenameh="";
    $filenamecb="";
    $filenamef="";
    $filenameimg="";

    $todayh = getdate();
          $d = $todayh['mday'];  $m = $todayh['mon'];  $y = $todayh['year'];
          $fecha = $y."-".$m."-".$d;
      try {



        if (session('RFC')!=null || session('RFC')!='') {
          $name=session('RFC');
        }else {
          $name=session('CURP');
        }

        $carpeta = storage_path();

        $carpeta = $carpeta.'/app/Files/'.$name;

        $ruta = '/Files//'.$name.'/';




         if (!file_exists($carpeta)){
           try {
             mkdir($carpeta, 0777, true);
             $res = "";
           }catch (\Exception $e) {
             return "no se creo";
           }
         }

        $path =  public_path()."\Logos\\";


        $file = $request->file('ine');
        if ($file!=null) {
          $filename = $name.'_INE'.'.'.$file->getClientOriginalExtension();
        }
        $filec = $request->file('cdomicilio');
        if ($filec!=null) {
          $filenamec = $name.'_Comprobante'.'.'.$filec->getClientOriginalExtension();
        }

        $filei = $request->file('incubacion');
        if ($filei!=null) {
          $filenamei = $name.'_Incubacion'.'.'.$filei->getClientOriginalExtension();
        }
        $fileh = $request->file('hacienda');
        if ($fileh!=null) {
          $filenameh = $name.'_Hacienda'.'.'.$fileh->getClientOriginalExtension();
        }
        $filecb = $request->file('codigobarras');
        if ($filecb!=null) {
          $filenamecb = $name.'_CodigoBarras'.'.'.$filecb->getClientOriginalExtension();
        }
        $filef = $request->file('fda');
        if ($filef!=null) {
          $filenamef = $name.'_FDA'.'.'.$filef->getClientOriginalExtension();
        }


        $fileimg= $request->file('logo');
        if ($fileimg!=null) {
          $filenameimg = $name.'_Logo'.'.'.$fileimg->getClientOriginalExtension();
        }


        // $name = $request->nombre_empresa;
        // $path =  public_path()."\Empresas\\";
        // $fileimg= $request->file('logo');
        // $filenamei = $name.'.'.$fileimg->getClientOriginalExtension();
        // $ruta = $path.$filenamei;

          $emp = new Empresas;
          // $vacantes-> RFC = $request->rfcempresa;
          // $vacantes-> Id_vacante = '';
          // $emp-> razon_social = $request->razonsocial;
          $emp-> descripcion = $request->descripcion;
          $emp-> operacion = $request->ope;
          $emp-> tiempo_operacion = $request->operacion;
          $emp-> alta_shcp = $request->altahacienda;
          $emp-> regimen = $request->regimen;

          $emp-> tipo_incubacion = $request->tipoincu;

          $emp-> comprobante_incubacion = $filenamei;
          $emp-> comprobante_shcp = $filenameh;
          $emp-> disenio_imagen = $filenameimg;
          $emp-> codigo_barras = $filenamecb;
          $emp-> FDA= $filenamef;

          // $emp-> tabla_nutricional = $request->tabla;

          $emp-> facebook = $request->facebook;
          $emp-> instagram = $request->instagram;
          $emp-> twitter = $request->twitter;
          $emp-> stio_web = $request->sitio;

          $emp-> ID_categoria = $request->categoria;
          $emp-> ID_subcategoria = $request->subcat;

          $emp-> comprobante_domicilio = $filenamec;
          $emp-> ine = $filename;

          $emp-> fecha_inscripcion = $fecha;
          $emp-> fase = '0';

          $emp-> RFC = session('RFC');
          $emp-> CURP = session('CURP');

          if ($emp -> save()) {


              try {
                $rutaIne = $ruta.$filename;
                \Storage::disk('local')->put($rutaIne,  \File::get($file));
              } catch (\Exception $e) {
                return $e->getMessage();
              }

              try {
                $rutac = $ruta.$filenamec;
                \Storage::disk('local')->put($rutac,  \File::get($filec));
              } catch (\Exception $e) {
                return $e->getMessage();
              }


            if ($filei!=null) {
              try {
                $rutai = $ruta.$filenamei;
                \Storage::disk('local')->put($rutai,  \File::get($filei));
              } catch (\Exception $e) {
                return $e->getMessage();
              }
            }

            if ($fileh!=null) {
              try {
                $rutah = $ruta.$filenameh;
                \Storage::disk('local')->put($rutah,  \File::get($fileh));
              } catch (\Exception $e) {

              }
            }

            if ($filecb!=null) {
              try {
                $rutacb = $ruta.$filenamecb;
                \Storage::disk('local')->put($rutacb,  \File::get($filecb));
              } catch (\Exception $e) {
                return $e->getMessage();
              }
            }

            if ($filef!=null) {
              try {
                $rutaf = $ruta.$filenamef;
                \Storage::disk('local')->put($rutaf,  \File::get($filef));
              } catch (\Exception $e) {
                return $e->getMessage();
              }
            }

            if ($fileimg!=null) {
              try {
                $rutaimg = $path.$filenameimg;
                $img = Image::make($fileimg->getRealPath());
                $img->save($rutaimg, 30);
              } catch (\Exception $e) {
                return $e->getMessage();
              }
            }

          }


        return redirect('/inicioUser')->with('Exito', 'Tú registro será revisado y se te asignara una etapa de acuerdo a tú documentación.
                                          Revisa tú correo de contacto continuamente, se te harán llegar las observaciones correspondientes.');


      } catch (\Exception $e) {
        if(strpos($e->getMessage(),"Ya existe la llave"))
        return redirect('/consultaEmpresas')->with('Error', 'Llave repetida');


        //return redirect('/consultaVacantes')->with('Error', 'Error al cargar la vacante');
        echo $e->getMessage();

      }
  }


  function getEmpresas( )
    {

        $empresa = DB::table('admpuropotosino'.'.'.'TCEmpresaPP')
        ->join('admseguridad'.'.'.'TCUsuariosExternos',function($join){
          $join->on('admseguridad'.'.'.'TCUsuariosExternos.CURP', '=', 'admpuropotosino'.'.'.'TCEmpresaPP.CURP');
        })
        ->get();
        return Datatables::of($empresa)
        ->make(true);

    }


    function getEmpresasM( )
      {

          $empresa = DB::table('admpuropotosino'.'.'.'TCEmpresaPP')
          ->join('admseguridad'.'.'.'TCPersonasMorales',function($join){
            $join->on('admseguridad'.'.'.'TCPersonasMorales.RFC', '=', 'admpuropotosino'.'.'.'TCEmpresaPP.RFC');
          })
          ->get();
          return Datatables::of($empresa)
          ->make(true);

      }


    function viewE($n){

      $empresa = DB::table('admpuropotosino'.'.'.'TCEmpresaPP')
      ->where('ID_empresa', $n)
      ->get();

        return view('admin.verempresa')->with('empresa', $empresa);
    }
}