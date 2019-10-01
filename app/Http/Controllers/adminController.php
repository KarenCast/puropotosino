<?php

namespace App\Http\Controllers;
//
// use App\UsuariosExternos;
use App\UsuariosInternos;
// use App\UsuariosMorales;
use App\Roles;
// use App\Logo;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class adminController extends Controller
{

  function viewAdmin(){
      return view('admin.login');
    }

  function LogInA(Request $request){
    $request->session()->flush();
    $sistema = 53;
    $rol_usuario = 95;

    $user = UsuariosInternos::where('RUE', $request->username)->where('contrasena', sha1($request->password))->first();

    $rol = Roles::where('RUE', $request->username)->where('ID_rol', $rol_usuario)->where('Id_sistemas', $sistema)->first();

    if($user != null && $rol != null)
    {
      session(['log' => true]);
      session(['RUE' => $request->username]);
      session(['tipoinicio' => 'admin']);

      return redirect('/consultaEmpresas');
    }else {
      echo "error";
    }

  }

  function recuperarContrasena(Request $request){
    $user = UsuariosExternos::where('correo_electronico', $request->email)->first();
    if($user != null){
      $user->token = bin2hex(random_bytes(5));
      $user->intentos = 0;
      $user->fecha_token = "Now()";
      $user->save();

      $data = array(
        'name' => $user->nombre,
        'token' => $user->token,
        'id' => $user->ID_usuario
      );

      Mail::send('emails.Recuperar', $data, function ($message) use($user) {
        $message->from('ventanillaunicadigital@sanluis.gob.mx', 'Ventanilla Unica');
        $message->to($user->correo_electronico)->subject('Recuperar Contraseña');
      });
      return redirect('/');
    }
    else {
      $user = UsuariosMorales::where('correo_electronico', $request->email)->first();
      if($user != null){
        $user->token = bin2hex(random_bytes(5));
        $user->intentos = 0;

        $user->save();

        $data = array(
          'name' => $user->razonsocial,
          'token' => $user->token,
          'id' => $user->RFC,
        );

        Mail::send('emails.Recuperar', $data, function ($message) use($user) {
          $message->from('ventanillaunicadigital@sanluis.gob.mx', 'Ventanilla Unica');
          $message->to($user->correo_electronico)->subject('Recuperar Contraseña');
        });
        return redirect('/');
      }
      else {
        return back()->with('Error', 'Correo incorrecto, no existe usuario con el correo '.$request->email );
      }
    }
  }

  function consultae(){
    // if (strcmp(session('tipoinicio'), 'vacante')!==0) {
    //   return redirect('/VentanillaUnica');
    // }else{
    // $delegacion = DB::table('admcomun'.".".'TCDelegacion')->get();
    // $civil = DB::table('admcomun'.".".'TCEstado_civil')->get();
    // $nivel = DB::table('admcomun'.".".'TCNivelacademico')->get();
    //
    // return view('admin.misvacantes')->with('delegaciones', $delegacion)->with('niveles', $nivel)->with('edocivil', $civil);
    // }

    if (strcmp(session('tipoinicio'), 'admin')==0) {
      // $delegacion = DB::table('admcomun'.".".'TCDelegacion')->get();
      // $civil = DB::table('admcomun'.".".'TCEstado_civil')->get();
      // $nivel = DB::table('admcomun'.".".'TCNivelacademico')->get();

      return view('admin.admin');
    }else{
      return redirect('/registro');
    }
  }

  function eventos(){
    return view('front.eventos');
  }


  function link($arch,$id){

      $ruta = '/Files';
      $path = storage_path().'/app'.$ruta.'/'.$arch.'/'.$id;
      $docs = \File::get($path);
      // echo $path;
      $link = response()->file($path, [
        'Content-Disposition' => 'inline; filename="Comprobante.pdf"'
      ]);

      return $link;
  }

  function linkprod($arch,$id){

      $ruta = '/Files';
      $path = storage_path().'/app'.$ruta.'/'.$arch.'/Producto//'.$id;
      $docs = \File::get($path);
      // echo $path;
      $link = response()->file($path, [
        'Content-Disposition' => 'inline; filename="Comprobante.pdf"'
      ]);

      return $link;
  }

  function linkmarca($arch,$id){

      $ruta = '/Files';
      $path = storage_path().'/app'.$ruta.'/'.$arch.'/Marca//'.$id;
      $docs = \File::get($path);
      // echo $path;
      $link = response()->file($path, [
        'Content-Disposition' => 'inline; filename="Comprobante.pdf"'
      ]);

      return $link;
  }


}
