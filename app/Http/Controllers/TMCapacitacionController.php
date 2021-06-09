<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TMCapacitacion;
use Illuminate\Support\Facades\Mail;

class TMCapacitacionController extends Controller
{
    //Hacemos la insercion en l BD
    public function insertComentarioCapa(Request $request){
        $input = $request->all(); //Asiganmos una variable para guardar el request

        $insert = TMCapacitacion::create($input); //Enviamos el input al modelo para la creacion del registro en la BD

        //Comprobamos si fue exitosa la creacion y mandamos los correos tanto al usuario como al encargado del area 
        if($insert->wasRecentlyCreated){
            $response["success"]=true;
            $response["message"]="Su Comentario fue enviada con éxito";
            $response["folio"]=$insert->folio;

        /*Correo a Usuario*/
        Mail::send('front.emailAdminCapacitacion', $input , function ($message) {
            $message->from('anthony.robledo@sanluis.gob.mx', 'Puro Potosino: Comentario de Capacitaciones');
            //$message->to('misael.bravo@sanluis.gob.mx')->subject('Puro Potosino: Comentario de Capacitaciones');
            $message->to('sidep@sanluis.gob.mx')->subject('Puro Potosino: Comentario de Capacitaciones');
        });
        //Correo a Protesta
       /* Mail::send('emails.emailAdminVisor', $input , function ($message){
            $message->from('desarrolloweb@sanluis.gob.mx', 'Quejas y/o Sugerencias Visor Urbano');
            $message->to('misael.bravo@sanluis.gob.mx')->subject('Quejas y/o Sugerencias Visor Urbano');
            //$message->to('visorurbano@sanluis.gob.mx')->subject(' PRUEBA: Quejas y/o Sugerencias Visor Urbano');
            
           // $message->cc($userProtesta[2]);
        });
        Envio de correo pasamos la vista que sera utilizada para enviarle al usuario ,
            $input es la variable con los campos, $message es la variable a utilizar para el envio del msj,
            $user.... se utiliza para pasarle informacion al message como objeto*/

        }else{
            $response["success"]=false;
            $response["message"]= "Lo sentimos, ocurrio un problema. Intentalo de nuevo.";
        }

        return $response;


    }

}
