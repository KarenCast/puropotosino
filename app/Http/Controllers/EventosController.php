<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use Image;
use App\UsuariosExternos;

class EventosController extends Controller
{
    public function consultaEventos()
    {
        return view('admin.catEventos');
    }

    public function getEventos()
    {
        $reporte = Evento::all();

        return response()->json($reporte, 200);
    }

    public function store(Request $request)
    {
        //dd($request->all());

        if ($request->ID_eventoE == 0) {
            $path = public_path()."\contenido\\eventos\\";
            $file = $request->file('fotoE');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $ruta = $path.$filename;
            $img = Image::make($file->getRealPath());
            $img->save($ruta, 30);

            $event = Evento::create($request->all());
            $event->foto = "\contenido\\eventos\\".$filename;
            $evento->save();

            return redirect('/consultaEventos');
        } else {

            $edit = Evento::findOrFail($request->ID_eventoE);
            //$path = public_path()."\contenido\Eventos\\";
            if($edit->foto !== null)
                unlink($edit->foto);
            $path = public_path()."\contenido\\eventos\\";
            $file = $request->file('fotoE');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $ruta = $path.$filename;
            $img = Image::make($file->getRealPath());
            $img->save($ruta, 30);

            $edit->update($request->all());
            $edit->foto = "\contenido\\eventos\\".$filename;
            $edit->save();
            return redirect('/consultaEventos');
        }

        /*
        return response()->json([
            'message' => 'Evento Creado',
            'Evento' => $event
        ]);
        */
        //dd($request->all());
    }

    public function delete(Request $request)
    {
        $delete = Evento::findOrFail($request->ID_evento);
        $delete->delete();
    }

    public function registro(Request $request)
    {
        $user = UsuariosExternos::where('correo_electronico', $request->correo)->where('contrasena', sha1($request->contrasena))->first();

        if ($user != null) {
            //envia correo
            dd($user);
        } else {
            //no envia nada?
            dd($request->all());
        }
    }

    function LogInA(Request $request){
      $request->session()->flush();
      $sistema = 54;
      $rol_usuario = 98;

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
}
