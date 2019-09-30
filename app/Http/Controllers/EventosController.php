<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
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
        if ($request->ID_eventoE == 0) {
            $event = Evento::create($request->all());

            /*
            return response()->json([
                'message' => 'Evento Creado',
                'Evento' => $event
            ]);
            */
            return redirect('/consultaEventos');
        } else {
            $edit = Evento::findOrFail($request->ID_eventoE);
            $edit->update($request->all());

            return redirect('/consultaEventos');
        }
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
        }
        else{
            //no envia nada? 
            dd($request->all());
        }
    }
}
