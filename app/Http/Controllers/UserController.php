<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuariosExternos;
use App\UsuariosInternos;
use App\UsuariosMorales;
use App\Empresas;
use App\Marca;
use App\Producto;
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
        return back()->with('Error', 'No se pudo actualizar fase');
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
              return back()->with('Error', 'No se pudo enviar correo');
          }




        return redirect('./consultaEmpresas');
    } catch (\Exception $e) {
      return back()->with('Error', 'No se pudo hacer consulta');


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
        return back()->with('Error', 'No se pudo actualizar fase');
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
            return back()->with('Error', 'No se pudo enviar correo');
        }
      return redirect('inicioUser');
  } catch (\Exception $e) {
    return back()->with('Error', 'No se pudo actualizar');
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
    //  return $e->getMessage();
      return back()->with('Error', 'No se pudo actualizar registro');
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
          //return $e->getMessage();
          return back()->with('Error', 'No se pudo enviar correo');
        }

      return redirect('inicioUser');
  } catch (\Exception $e) {
  // return $e->getMessage();
    return back()->with('Error', 'No se pudo actualizar');
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
      //return $e->getMessage();
        return back()->with('Error', 'No se pudo enviar actualizar fase');
    }

    if ($filei!=null) {
      try {
        $rutai = $ruta.$filenamei;
        \Storage::disk('local')->put($rutai,  \File::get($filei));
      } catch (\Exception $e) {
          return back()->with('Error', 'No se pudo guardar archivo de incubación');
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
    //  return $e->getMessage();
            return back()->with('Error', 'No se pudo enviar correo');
        }

      return redirect('inicioUser');
  } catch (\Exception $e) {
    //return $e->getMessage();
      return back()->with('Error', 'No se pudo actualizar');
  }

}


function etapatres(Request $request){

  set_time_limit(0);

  $user = UsuariosMorales::where('correo_electronico', $request->correo)->where('contrasena', sha1($request->contra))->where('RFC', $request->rfc)->first();

  if ($user!=null) {
  session(['RFC' => $request->rfc]);

  $name= session('ID_e');

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


    $uf = Empresas::where('ID_empresa', session('ID_e'))->first();

    if ($uf->comprobante_shcp!=null || $uf->comprobante_shcp!='') {
      try {
        $vac = Empresas::where('ID_empresa', session('ID_e'))
        ->update([
          'fase' => 13,
          'RFC' => $request->rfc,
          'regimen' => $request->regimen]);
      } catch (\Exception $e) {
          return back()->with('Error', 'No se pudo actualizar fase');
      }
    }else{
    try {
      $vac = Empresas::where('ID_empresa', session('ID_e'))
      ->update([
        'fase' => 13,
        'comprobante_shcp' => $filenameh,
        'RFC' => $request->rfc,
        'regimen' => $request->regimen]);
    } catch (\Exception $e) {
      //return $e->getMessage();
        return back()->with('Error', 'No se pudo actualizar fase');
    }
  }
    $mensaje="moral";
    $t=0;



    if ($fileh!=null) {
      try {
        $rutah = $ruta.$filenameh;
        \Storage::disk('local')->put($rutah,  \File::get($fileh));
      } catch (\Exception $e) {
      //  return $e->getMessage();
          return back()->with('Error', 'No se pudo guardar comprobante de DHCP');
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
      //  return $e->getMessage();
          return back()->with('Error', 'No se pudo enviar correo');
        }



      return redirect('inicioUser');
  } catch (\Exception $e) {
    //return $e->getMessage();
      return back()->with('Error', 'No se pudo Actualizar');
  }

}else{

  return back()->with('Error', 'RFC: '.$request->rfc.' no existe.' );
}

}

function etapacuatro(Request $request){

  if ((Marca::where('ID_empresa', session('ID_e'))->count())>0) {
    if ((Producto::where('ID_empresa', session('ID_e'))->count())>0) {
  set_time_limit(0);

  $name= session('ID_e');

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
              //return $e->getMessage();
              return back()->with('Error', 'No se pudo cargar imagen');
          }
      }else{
        $filenameimg="";
      }



} catch (\Exception $e) {
  //return $e->getMessage();
    return back()->with('Error', 'No se pudo actualizar');
}




  try {
    try {
      $vac = Empresas::where('ID_empresa', session('ID_e'))
      ->update([
        'fase' => 14,
        ]);
    } catch (\Exception $e) {
        return back()->with('Error', 'No se pudo actualizar fase');
    }
    $uf = Empresas::where('ID_empresa', session('ID_e'))->first();

    if ($uf->codigo_barras==null || $uf->codigo_barras=='') {
      try {
        $vac = Empresas::where('ID_empresa', session('ID_e'))
        ->update([
          'codigo_barras' => $filecb
          ]);
      } catch (\Exception $e) {
          return back()->with('Error', 'No se pudo actualizar fase');
      }
    }

    if($uf->disenio_imagen==null || $uf->disenio_imagen==''){
      try {
        $vac = Empresas::where('ID_empresa', session('ID_e'))
        ->update([
          'disenio_imagen' => $filenameimg
          ]);
      } catch (\Exception $e) {
          return back()->with('Error', 'No se pudo actualizar fase');
      }
    }



    if ($filecb!=null) {
      try {
        $rutacb = $ruta.$filenamecb;
        \Storage::disk('local')->put($rutacb,  \File::get($filecb));
      } catch (\Exception $e) {
          return back()->with('Error', 'No se pudo cargar codigo de barras');
      }
    }

      $t=0;
      $mensaje = "moral";


      $data_vac = array(
         'id' => session('ID_e'),
         'fase' => '4',
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
            return back()->with('Error', 'No se pudo enviar correo');
        }



      return redirect('inicioUser');
  } catch (\Exception $e) {
    return back()->with('Error', 'No se pudo guardar');
  }
  }else{
    return back()->with('Error', 'No tienes registro de productos' );

    //return "No tienes registro de productos";
  }
}else{
  return back()->with('Error', 'No tienes registro de marcas');
}
}

function etapacinco(Request $request){

  set_time_limit(0);

  $name= session('ID_e');

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

  $filecb = $request->file('fda');
  if ($filecb!=null) {
    $filenamecb = $name.'_FDA'.'.'.$filecb->getClientOriginalExtension();
  }else{
    $filenamecb="";
  }

  try {

    try {
      $vac = Empresas::where('ID_empresa', session('ID_e'))
      ->update([
        'fase' => 15,
        'FDA' => $filenamecb,

        ]);
    } catch (\Exception $e) {
        return back()->with('Error', 'No se pudo actualizar fase');
    }




    if ($filecb!=null) {
      try {
        $rutacb = $ruta.$filenamecb;
        \Storage::disk('local')->put($rutacb,  \File::get($filecb));
      } catch (\Exception $e) {
        //return $e->getMessage();
          return back()->with('Error', 'No se pudo cargar archivo FDA');
      }
    }

      $t=0;
      $mensaje = "moral";


      $data_vac = array(
         'id' => session('ID_e'),
         'fase' => '5',
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
          return back()->with('Error', 'No se pudo enviar correo');
        }



      return redirect('inicioUser');
  } catch (\Exception $e) {
      return back()->with('Error', 'No se pudo Actualizar');
  }

}



}
