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
}
