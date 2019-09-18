<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuariosExternos;
use App\UsuariosInternos;
use App\UsuariosMorales;
use App\Empresas;
use App\Contacto;
use App\Roles;

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
   }

     if ($uf==null) {
       $categorias = DB::table('admpuropotosino'.'.'.'TCCategoria')
      ->get();
      $sub = DB::table('admpuropotosino'.'.'.'TCSubCategoria')
     ->get();
       return view('User.etapacero')->with('categorias', $categorias)->with('sub', $sub);
     }else{

      return view('User.inicio')->with('emp', $uf);
     }

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
           // 'name' => $request->nombre_sol,
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




        return "exito";
    } catch (\Exception $e) {
    return $e->getMessage();


    }

}



}
