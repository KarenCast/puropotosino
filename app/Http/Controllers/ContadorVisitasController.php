<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TMRegistroContadorPP;

class ContadorVisitasController extends Controller
{
    //
    public static function contadorVisitas(){

        
        if(session()->has('contadorActivo')){
            session(['contadorActivo' => true]);
        }else{
            session(['contadorActivo' => false]);
        }
        

        if (isset($_SERVER["HTTP_CLIENT_IP"])){
            $ip= $_SERVER["HTTP_CLIENT_IP"];
        }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $ip= $_SERVER["HTTP_X_FORWARDED_FOR"];
        }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){
            $ip= $_SERVER["HTTP_X_FORWARDED"];
        }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){
            $ip= $_SERVER["HTTP_FORWARDED_FOR"];
        }elseif (isset($_SERVER["HTTP_FORWARDED"])){
            $ip= $_SERVER["HTTP_FORWARDED"];
        }else{
            $ip= $_SERVER["REMOTE_ADDR"];
        }
        
       
        $ip   = $ip;
        $host   = gethostbyaddr($ip);
        $navegador  = $_SERVER['HTTP_USER_AGENT'];
        $ciudad  = null;
        $pais  = null;
        $cp  = null;
        $latitud  = null;
        $longitud  = null;
        $time  = date('H:i:s');
        $fecha  = date('y/m/d');
        $usuario  = 0;
        $web        = $_SERVER['HTTP_HOST'];//obtenerdominio($_POST['web']);        
        $pagina     = 'Index-ppotosino';//obtenerpagina($_POST['web']);
        $type       = 0; //intval($_POST['type']);/*0 entrada, 1 salida*/
        
        $input['ip']=$ip;
        $input['host']=$host;
        $input['navegador']=$navegador;
        $input['ciudad']=$ciudad;
        $input['pais']=$pais;
        $input['cp']=$cp;
        $input['latitud']=$latitud;
        $input['longitud']=$longitud;
        $input['time']=$time;
        $input['fecha']=$fecha;
        $input['usuario']=$usuario;
        $input['web']=$web;
        $input['pagina']=$pagina;
        $input['type']=$type;


        if( session('contadorActivo')==true){
            $contador =TMRegistroContadorPP::select('ip','fecha')->distinct()->get()->count(); 
            $contador2 =TMRegistroContadorPP::where('ip','==','100.000.112.254')->select('ip','fecha')->distinct()->get()->count(); 
            $contadorTotal=$contador+$contador2;
        }else{
       
            $insert = TMRegistroContadorPP::create($input); //Enviamos el input al modelo para la creacion del registro en la BD
            if($insert->wasRecentlyCreated){
                $contador =TMRegistroContadorPP::select('ip','fecha')->distinct()->get()->count(); 
                $contador2 =TMRegistroContadorPP::where('ip','==','100.100.112.254')->select('ip','time','fecha')->distinct()->get()->count(); 
                $contadorTotal=$contador+$contador2;
            }else{
               
                $contador =TMRegistroContadorPP::select('ip','fecha')->distinct()->get()->count(); 
                $contador2 =TMRegistroContadorPP::where('ip','==','100.000.112.254')->select('ip','fecha')->distinct()->get()->count(); 
                $contadorTotal=$contador+$contador2;
            }
        }
        

        
        
        return $contadorTotal;
    }
    
}
