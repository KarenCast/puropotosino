<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use Image;
use App\UsuariosExternos;
use App\UsuariosMorales;
use Illuminate\Support\Facades\Mail;

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
            $path = public_path().'/contenido/eventos/';
            $file = $request->file('fotoE');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $ruta = $path.$filename;
            $img = Image::make($file->getRealPath());
            $img->save($ruta, 30);

            $event = Evento::create($request->all());
            $event->foto = '/contenido/eventos/'.$filename;
            $event->save();

            return redirect('/consultaEventos');
        } else {
            $edit = Evento::findOrFail($request->ID_eventoE);
            //dd($request->file('fotoE'));
            //$path = public_path()."\contenido\Eventos\\";
            $edit->update($request->all());
            if ($request->file('fotoE') !== null) {
                if ($edit->foto != null && $edit->foto != '') {
                    unlink(public_path().$edit->foto);
                }
                $path = public_path().'/contenido/eventos/';
                $file = $request->file('fotoE');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $ruta = $path.$filename;
                $img = Image::make($file->getRealPath());
                $img->save($ruta, 30);
                $edit->foto = '/contenido/eventos/'.$filename;
            }

           
            
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

    public function getEventosMes(Request $request)
    {
        $eventos = Evento::whereMonth('fecha_evento', '=', $request->mes)
      ->whereYear('fecha_evento', '=', $request->anio)
      ->get();

        return response()->json($eventos, 200);
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

    public function LogIn(Request $request)
    {
        $bandera = 0;
        $evento = Evento::where('ID_evento', $request->idEvento)->first();

        $user = UsuariosExternos::where('admseguridad'.'.'.'TCUsuariosExternos.correo_electronico', $request->correo)->where('contrasena', sha1($request->contrasena))
      ->join('admpuropotosino'.'.'.'TCEmpresaPP', function ($join) {
          $join->on('admpuropotosino'.'.'.'TCEmpresaPP.CURP', '=', 'admseguridad'.'.'.'TCUsuariosExternos.CURP');
          $join->join('admpuropotosino'.'.'.'TCContacto', function ($join) {
              $join->on('admpuropotosino'.'.'.'TCContacto.ID_empresa', '=', 'admpuropotosino'.'.'.'TCEmpresaPP.ID_empresa');
          });
      })
      ->select(['TCUsuariosExternos.*', 'TCEmpresaPP.*', 'TCContacto.*', 'TCUsuariosExternos.correo_electronico AS correoruc',  'TCContacto.correo_electronico AS correocontacto'])
      ->where('fase', '>=', '0')
      ->first();

        if ($user != null) {
            $bandera = 1;
            $mensaje = 'fisica';
        } else {
            $user = UsuariosMorales::where('admseguridad'.'.'.'TCPersonasMorales.correo_electronico', $request->correo)->where('contrasena', sha1($request->contraseña))
        ->join('admpuropotosino'.'.'.'TCEmpresaPP', function ($join) {
            $join->on('admpuropotosino'.'.'.'TCEmpresaPP.RFC', '=', 'admseguridad'.'.'.'TCPersonasMorales.RFC');
            $join->join('admpuropotosino'.'.'.'TCContacto', function ($join) {
                $join->on('admpuropotosino'.'.'.'TCContacto.ID_empresa', '=', 'admpuropotosino'.'.'.'TCEmpresaPP.ID_empresa');
            });
        })
        ->select(['TCPersonasMorales.*', 'TCEmpresaPP.*', 'TCContacto.*', 'TCPersonasMorales.correo_electronico AS correoruc',  'TCContacto.correo_electronico AS correocontacto'])
        ->where('fase', '>=', '0')
        ->first();

            if ($user != null) {
                $bandera = 2;
                $mensaje = 'moral';
            }
        }

        if ($bandera != 0) {
            $data_vac = array(
           'id' => $user->ID_empresa,
           'correo' => $user->correo_electronico,
           'fase' => $user->fase,
           'mensaje' => $mensaje,
           'evento' => $evento->nombre_evento,
           'fecha' => $evento->fecha_evento,
        );
            try {
                //  return $emp->correo_contacto;
                Mail::send('emails.registroevento', $data_vac, function ($message) {
                    $message->from('ventanillaunicadigital@sanluis.gob.mx', 'SIDEP. EVENTOS.');
                    $message->to('karencastilloaguilar@gmail.com')->subject('Usuario se registro para evento SIDEP');
                });
            } catch (\Exception $e) {
                //return $e->getMessage();
                return back()->with('Error', 'No se pudo enviar correo');
            }
        } else {
            return back()->with('Error', 'Correo o contraseña incorrectos');
        }

        return back()->with('Exito', 'Te has registrado, espera tu correo de confirmación (Llegará a tu correo de contacto) si existe disponibilidad. Debes presentar el comprobante el día del evento');
    }
}
