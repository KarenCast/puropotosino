<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuariosExternos;
use App\UsuariosInternos;
use App\UsuariosMorales;
use App\Empresas;
use App\Contacto;
use App\Roles;
use Image;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
  function LogIn(Request $request){
    $user = UsuariosExternos::where('correo_electronico', $request->username)->where('contrasena', sha1($request->password))->first();

  if($user != null)
  {
    session(['mail' => $request->username]);

    session(['idUsuario' => $user->ID_usuario]);
    session(['CURP' => $user->CURP]);
    session(['nameUser' => $user->nombre]);
    session(['tipo' => 'fisica']);
    session(['log' => true]);


        return redirect('/inicioUser');

  }else {

      $user = UsuariosMorales::where('correo_electronico', $request->username)->where('contrasena', sha1($request->password))->first();
      if($user != null)
      {
        session(['RFC' => $user->RFC]);
        session(['nameUser' => $user->razonsocial]);
        session(['tipo' => 'moral']);

        session(['log' => true]);

          return redirect('/inicioUser');

      }else
      return back()->with('Error', 'Usuario y/o Contraseña incorrectos' )->with('user', $user);
    }
  }


 function redireccion(){

   if (session('RFC')!=null) {
     $uf = Empresas::where('RFC', session('RFC'))->first();

   }else {
     $uf = Empresas::where('CURP', session('CURP'))->first();
     if ($uf != null) {
       if ($uf->RFC != null || $uf->RFC != '') {
         session(['RFC' => $uf->RFC]);
       }
     }

   }

     if ($uf==null) {
       $categorias = DB::table('admpuropotosino'.'.'.'TCCategoria')
      ->get();
      $sub = DB::table('admpuropotosino'.'.'.'TCSubCategoria')
      ->get();
       return view('User.etapacero')->with('categorias', $categorias)->with('sub', $sub);
     }else{
      session(['ID_e' => $uf->ID_empresa]);
      return view('User.inicio')->with('emp', $uf);
     }

 }


  function viewEtapas(){


       return view('User.etapas');


  }





 function LogOut(){
    \Session::flush();
    session(['log' => false]);
    // $request->session()->flush();
    return redirect('/');
  }


  function enviarC(Request $request){

  set_time_limit(0);




  // $emp = Empresas::where('ID_empresa', $request->id)->first();
  $contacto = Contacto::where('ID_empresa', $request->id)->first();

    try {

      try {
        $vac = Empresas::where('ID_empresa', $request->id)
        ->update([
          'fase' => $request->fase]);
      } catch (\Exception $e) {
        return $e->getMessage();
      }


        $data_vac = array(
           'name' => $request->nombre_sol,
           'fase' => $request->fase,

           'mensaje' => $request->mensaje,


        );




          try {

          //  return $emp->correo_contacto;
            Mail::send('emails.notificacion', $data_vac, function ($message) use($contacto) {

              $message->from('ventanillaunicadigital@sanluis.gob.mx', 'SIDEP. Observaciones para avance de fase.');
              $message->to($contacto->correo_electronico)->subject('Observaciones Proceso SIDEP');


            });
          } catch (\Exception $e) {
        // return redirect('/TodasVacantes')->with('Error', 'Imposible cargar CV, intenta de nuevo más tarde');
            return $e->getMessage();
          }




        return redirect('./consultaEmpresas');
    } catch (\Exception $e) {
    return $e->getMessage();


    }

}



function etapacero(Request $request){

set_time_limit(0);
// $emp = Empresas::where('ID_empresa', $request->id)->first();
$contacto = Contacto::where('ID_empresa', $request->id)->first();
  try {
    try {
      $vac = Empresas::where('ID_empresa', session('ID_e'))
      ->update([
        'fase' => 10]);
    } catch (\Exception $e) {
      return $e->getMessage();
    }

    try {
      $vac = Contacto::where('ID_empresa', session('ID_e'))
      ->update([
        'correo_electronico' => $request->correo]);
    } catch (\Exception $e) {

    }

      $mensaje = session('tipo');
      if ($mensaje=='fisica') {
        $t=1;
      }else {
        $t=0;
      }

      $data_vac = array(
         'id' => session('ID_e'),
         'fase' => '0',
         'tip' => $t,
         'mensaje' => $mensaje,
      );

        try {
        //  return $emp->correo_contacto;
          Mail::send('emails.actualizacion', $data_vac, function ($message) use($contacto) {
            $message->from('ventanillaunicadigital@sanluis.gob.mx', 'SIDEP. Actualización.');
            $message->to('karen.castillo@sanluis.gob.mx')->subject('Usuario actualizó su información. Proceso SIDEP');
          });
        } catch (\Exception $e) {
      // return redirect('/TodasVacantes')->with('Error', 'Imposible cargar CV, intenta de nuevo más tarde');
          return $e->getMessage();
        }
      return redirect('inicioUser');
  } catch (\Exception $e) {
  return $e->getMessage();
  }
}

function etapauno(Request $request){

set_time_limit(0);

// $emp = Empresas::where('ID_empresa', $request->id)->first();
//$contacto = Contacto::where('ID_empresa', $request->id)->first();
  try {
    try {
      $vac = Empresas::where('ID_empresa', session('ID_e'))
      ->update([
        'fase' => 11,
        'descripcion' => $request->ideanegocio]);
    } catch (\Exception $e) {
      return $e->getMessage();
    }


      $mensaje = session('tipo');
      if ($mensaje=='fisica') {
        $t=1;
      }else {
        $t=0;
      }

      $data_vac = array(
         'id' => session('ID_e'),
         'fase' => '1',
         'tip' => $t,
         'mensaje' => $mensaje,
      );
        try {
        //  return $emp->correo_contacto;
          Mail::send('emails.actualizacion', $data_vac, function ($message) {

            $message->from('ventanillaunicadigital@sanluis.gob.mx', 'SIDEP. Actualización.');
            $message->to('karen.castillo@sanluis.gob.mx')->subject('Usuario actualizó su información. Proceso SIDEP');

          });
        } catch (\Exception $e) {
      // return redirect('/TodasVacantes')->with('Error', 'Imposible cargar CV, intenta de nuevo más tarde');
          return $e->getMessage();
        }

      return redirect('inicioUser');
  } catch (\Exception $e) {
  return $e->getMessage();
  }

}



function etapados(Request $request){

  set_time_limit(0);
  $name= session('ID_e');
  // if (session('RFC')!=null || session('RFC')!='') {
  //   $name=session('RFC');
  // }else {
  //   $name=session('CURP');
  // }

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

  $filei = $request->file('incubacion');
  if ($filei!=null) {
    $filenamei = $name.'_Incubacion'.'.'.$filei->getClientOriginalExtension();
  }else{
    $filenamei="";
  }

  try {
    try {
      $vac = Empresas::where('ID_empresa', session('ID_e'))
      ->update([
        'fase' => 12,
        'comprobante_incubacion' => $filenamei,
        'tipo_incubacion' => $request->tipoincu]);
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


      $mensaje = session('tipo');
      if ($mensaje=='fisica') {
        $t=1;
      }else {
        $t=0;
      }

      $data_vac = array(
         'id' => session('ID_e'),
         'fase' => '2',
         'tip' => $t,
         'mensaje' => $mensaje,
      );
        try {
        //  return $emp->correo_contacto;
          Mail::send('emails.actualizacion', $data_vac, function ($message) {

            $message->from('ventanillaunicadigital@sanluis.gob.mx', 'SIDEP. Actualización.');
            $message->to('karen.castillo@sanluis.gob.mx')->subject('Usuario actualizó su información. Proceso SIDEP');

          });
        } catch (\Exception $e) {
      // return redirect('/TodasVacantes')->with('Error', 'Imposible cargar CV, intenta de nuevo más tarde');
          return $e->getMessage();
        }

      return redirect('inicioUser');
  } catch (\Exception $e) {
    return $e->getMessage();
  }

}


function etapatres(Request $request){

  set_time_limit(0);

  $user = UsuariosMorales::where('correo_electronico', $request->correo)->where('contrasena', sha1($request->contra))->where('RFC', $request->rfc)->first();

  if ($user!=null) {
  session(['RFC' => $request->rfc]);

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

  $fileh = $request->file('hacienda');
  if ($fileh!=null) {
    $filenameh = $name.'_Hacienda'.'.'.$fileh->getClientOriginalExtension();
  }else{
    $filenameh="";
  }

  try {





    try {
      $vac = Empresas::where('ID_empresa', session('ID_e'))
      ->update([
        'fase' => 13,
        'comprobante_shcp' => $filenameh,
        'RFC' => $request->rfc]);
    } catch (\Exception $e) {
      return $e->getMessage();
    }

    $mensaje="moral";
    $t=0;



    if ($fileh!=null) {
      try {
        $rutah = $ruta.$filenameh;
        \Storage::disk('local')->put($rutah,  \File::get($fileh));
      } catch (\Exception $e) {
        return $e->getMessage();
      }
    }




      $data_vac = array(
         'id' => session('ID_e'),
         'fase' => '3',
         'tip' => $t,
         'mensaje' => $mensaje,
      );
        try {
        //  return $emp->correo_contacto;
          Mail::send('emails.actualizacion', $data_vac, function ($message) {

            $message->from('ventanillaunicadigital@sanluis.gob.mx', 'SIDEP. Actualización.');
            $message->to('karen.castillo@sanluis.gob.mx')->subject('Usuario actualizó su información. Proceso SIDEP');

          });
        } catch (\Exception $e) {
      // return redirect('/TodasVacantes')->with('Error', 'Imposible cargar CV, intenta de nuevo más tarde');
          return $e->getMessage();
        }



      return redirect('inicioUser');
  } catch (\Exception $e) {
    return $e->getMessage();
  }

}else{

  return back()->with('Error', 'RFC: '.$request->rfc.' no existe.' );
}

}

function etapacuatro(Request $request){

  set_time_limit(0);

  if (session('RFC')!=null || session('RFC')!='') {
    $name=session('RFC');
  }else {
    $uf = Empresas::where('CURP', session('CURP'))->first();
    if ($uf->RFC!=null) {
        $name=$uf->RFC;
        session(['RFC' => $uf->RFC]);
    }else {
        $name=session('CURP');
    }

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

  $filecb = $request->file('codigobarras');
  if ($filecb!=null) {
    $filenamecb = $name.'_CodigoBarras'.'.'.$filecb->getClientOriginalExtension();
  }else{
    $filenamecb="";
  }

try {
  $carpeta2 = public_path();

  $carpeta2 = $carpeta2.'//Logos/'.$name;
  if (!file_exists($carpeta2)){
    try {
      mkdir($carpeta2, 0777, true);
      $res = "";
    }catch (\Exception $e) {
      return "no se creo";
    }
  }



      $fileimg = $request->file('logo');
      if ($fileimg!=null) {
        $filenameimg = $name.'_Logo'.'.'.$fileimg->getClientOriginalExtension();
      }else{
        $filenameimg="";
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




  try {

    try {
      $vac = Empresas::where('ID_empresa', session('ID_e'))
      ->update([
        'fase' => 14,
        'codigo_barras' => $filenamecb,
        'disenio_imagen' => $filenameimg
        ]);
    } catch (\Exception $e) {
      return $e->getMessage();
    }




    if ($filecb!=null) {
      try {
        $rutacb = $ruta.$filenamecb;
        \Storage::disk('local')->put($rutacb,  \File::get($filecb));
      } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

      $t=0;
      $mensaje = "moral";


      $data_vac = array(
         'id' => session('ID_e'),
         'fase' => '3',
         'tip' => $t,
         'mensaje' => $mensaje,
      );
        try {
        //  return $emp->correo_contacto;
          Mail::send('emails.actualizacion', $data_vac, function ($message) {

            $message->from('ventanillaunicadigital@sanluis.gob.mx', 'SIDEP. Actualización.');
            $message->to('karen.castillo@sanluis.gob.mx')->subject('Usuario actualizó su información. Proceso SIDEP');

          });
        } catch (\Exception $e) {
      // return redirect('/TodasVacantes')->with('Error', 'Imposible cargar CV, intenta de nuevo más tarde');
          return $e->getMessage();
        }



      return redirect('inicioUser');
  } catch (\Exception $e) {
    return $e->getMessage();
  }

}




}
