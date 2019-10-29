<?php

namespace App\Http\Controllers;
use App\Empresas;
use App\Contacto;
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



        // if (session('RFC')!=null || session('RFC')!='') {
        //   $name=session('RFC');
        // }else {
        //   $name=session('CURP');
        // }

        if ($request->regimen == 'otro') {
                $reg=$request->tipo_regimen22;
        }else {
            $reg=$request->regimen;

        }

        if ( $request->tipoincu == 'otro') {
          $inc =$request->tipoincu2;
        }else{
          $inc =$request->tipoincu;
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
          $emp-> regimen = $reg;

          $emp-> tipo_incubacion =$inc;



          $emp-> facebook = $request->facebook;
          $emp-> instagram = $request->instagram;
          $emp-> twitter = $request->twitter;
          $emp-> stio_web = $request->sitio;

          $emp-> ID_categoria = $request->categoria;
          $emp-> ID_subcategoria = $request->subcat;


          $emp-> fecha_inscripcion = $fecha;
          $emp-> fase = '10';

          $emp-> RFC = session('RFC');
          $emp-> CURP = session('CURP');

          if ($emp -> save()) {
            $name= $emp->ID_empresa;

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

            try {

              $vac = Empresas::where('ID_empresa', $emp->ID_empresa)
              ->update([
                'comprobante_incubacion' => $filenamei,
                'comprobante_shcp' => $filenameh,
                'disenio_imagen' => $filenameimg,
                'codigo_barras' => $filenamecb,
                'FDA' => $filenamef,
              ]);

            } catch (\Exception $e) {
                return back()->with('Error', 'No se pudieron cargar archivos');
            }




            if ($filei!=null) {
              try {
                $rutai = $ruta.$filenamei;
                \Storage::disk('local')->put($rutai,  \File::get($filei));
              } catch (\Exception $e) {
                  return back()->with('Error', 'No se pudo guardar comprobante_incubacion');
              }
            }

            if ($fileh!=null) {
              try {
                $rutah = $ruta.$filenameh;
                \Storage::disk('local')->put($rutah,  \File::get($fileh));
              } catch (\Exception $e) {
                  return back()->with('Error', 'No se pudo guardar comprobante_shcp');
              }
            }

            if ($filecb!=null) {
              try {
                $rutacb = $ruta.$filenamecb;
                \Storage::disk('local')->put($rutacb,  \File::get($filecb));
              } catch (\Exception $e) {
                  return back()->with('Error', 'No se pudo guardar codigo de barras');
              }
            }

            if ($filef!=null) {
              try {
                $rutaf = $ruta.$filenamef;
                \Storage::disk('local')->put($rutaf,  \File::get($filef));
              } catch (\Exception $e) {
                  return back()->with('Error', 'No se pudo guardar FDA');
              }
            }

            if ($fileimg!=null) {
              try {
                $rutaimg = $path.$filenameimg;
                $img = Image::make($fileimg->getRealPath());
                $img->save($rutaimg, 30);
              } catch (\Exception $e) {
                  return back()->with('Error', 'No se pudo guardar LOGO');
              }
            }

            try {
              $con = new Contacto;

              $con-> nombre = $request->nombre_c;
              $con-> APaterno = $request->ap_c;
              $con-> AMaterno = $request->am_c;
              $con-> celular = $request->celular_c;
              $con-> correo_electronico = $request->correo_c;
              $con-> direccion = $request->direccion_c;
              $con-> telefono = $request->tel_c;
              $con-> ID_empresa = $emp->ID_empresa;
              $con -> save();

            } catch (\Exception $e) {
                return back()->with('Error', 'No se pudo Guardar tu información en SIDEP');
            }


          }

          $data_vac = array(
             'id' => $emp->ID_empresa,
             'tip' => session('tipo'),
          );

          try {


                Mail::send('emails.nuevo', $data_vac, function ($message) {

                  $message->from('ventanillaunicadigital@sanluis.gob.mx', 'SIDEP. Nuevo registro.');
                  $message->to('sidep@sanluis.gob.mx')->subject('Se ha registrado una nueva empresa. Proceso SIDEP');

                });

          } catch (\Exception $e) {
              return back()->with('Error', 'No se pudo enviar correo');
          }



        return redirect('/inicioUser')->with('Exito', 'Tú registro será revisado y se te asignara una etapa de acuerdo a tú documentación.
                                          IMPORTANTE: Revisa tú correo de contacto continuamente, se te harán llegar las observaciones correspondientes.');


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
        ->where('RFC',null)
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


    function viewE($n, $tipo){

      if (strcmp(session('tipoinicio'), 'admin') == 0) {
      if ($tipo==1) {

        $user = Empresas::where('ID_empresa', $n)->first();

        $empresa = DB::table('admpuropotosino'.'.'.'TCEmpresaPP')

        ->join('admseguridad'.'.'.'TCUsuariosExternos',function($join){
          $join->on('admseguridad'.'.'.'TCUsuariosExternos.CURP', '=', 'admpuropotosino'.'.'.'TCEmpresaPP.CURP');
        })
        ->join('admpuropotosino'.'.'.'TCContacto',function($join){
          $join->on('admpuropotosino'.'.'.'TCContacto.ID_empresa', '=', 'admpuropotosino'.'.'.'TCEmpresaPP.ID_empresa');
        })

        ->where('TCEmpresaPP.ID_empresa', $n)
        ->get();
      }else{
        $empresa = DB::table('admpuropotosino'.'.'.'TCEmpresaPP')
        ->join('admseguridad'.'.'.'TCPersonasMorales',function($join){
          $join->on('admseguridad'.'.'.'TCPersonasMorales.RFC', '=', 'admpuropotosino'.'.'.'TCEmpresaPP.RFC');
        })
        ->join('admpuropotosino'.'.'.'TCContacto',function($join){
          $join->on('admpuropotosino'.'.'.'TCContacto.ID_empresa', '=', 'admpuropotosino'.'.'.'TCEmpresaPP.ID_empresa');
        })
        ->where('TCEmpresaPP.ID_empresa', $n)
        ->get();
      }
        return view('admin.verempresa')->with('empresa', $empresa);
    }
  else{
    return redirect('Login-admin');
  }}




  function viewP(){

      $user = Empresas::where('ID_empresa', session('ID_e'))->first();
      if ($user->RFC !=null || $user->RFC !='') {
        $empresa = DB::table('admpuropotosino'.'.'.'TCEmpresaPP')
        ->join('admseguridad'.'.'.'TCPersonasMorales',function($join){
          $join->on('admseguridad'.'.'.'TCPersonasMorales.RFC', '=', 'admpuropotosino'.'.'.'TCEmpresaPP.RFC');
        })
        ->join('admpuropotosino'.'.'.'TCContacto',function($join){
          $join->on('admpuropotosino'.'.'.'TCContacto.ID_empresa', '=', 'admpuropotosino'.'.'.'TCEmpresaPP.ID_empresa');
        })
        ->where('TCEmpresaPP.ID_empresa', session('ID_e'))
        ->get();
      }else{

        $empresa = DB::table('admpuropotosino'.'.'.'TCEmpresaPP')
        ->join('admseguridad'.'.'.'TCUsuariosExternos',function($join){
          $join->on('admseguridad'.'.'.'TCUsuariosExternos.CURP', '=', 'admpuropotosino'.'.'.'TCEmpresaPP.CURP');
        })
        ->join('admpuropotosino'.'.'.'TCContacto',function($join){
          $join->on('admpuropotosino'.'.'.'TCContacto.ID_empresa', '=', 'admpuropotosino'.'.'.'TCEmpresaPP.ID_empresa');
        })
        ->where('TCEmpresaPP.ID_empresa', session('ID_e'))
        ->get();
      }
      return view('User.perfil')->with('empresa', $empresa);
  }




}
