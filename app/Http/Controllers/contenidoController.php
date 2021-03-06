<?php

namespace App\Http\Controllers;

use App\Contenido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Image;

class contenidoController extends Controller
{
    public function viewContenido()
    {
        if (strcmp(session('tipoinicio'), 'admin') == 0) {
        $n;
        $foo = $_SERVER['REQUEST_URI'];
        if (strpos($foo, 'Recetas') !== false) {
            $n = 1;
        } else {
            $n = 0;
        }

        return view('admin.altacontenido')->with('n', $n);
      }else{
          return redirect('Login-admin');
        }
    }

    public function viewCont()
    {
      if (strcmp(session('tipoinicio'), 'admin') == 0) {
        return view('admin.consultacontenido');
      }else{
          return redirect('Login-admin');
        }
    }

    public function viewRecetas()
    {
      if (strcmp(session('tipoinicio'), 'admin') == 0) {
        return view('admin.consultaRecetas');
      }else{
          return redirect('Login-admin');
        }
    }

    public function deleteR(Request $request)
    {
        $recetas = Contenido::where('ID_contenido', $request->Id_delete)->first();
        $path = public_path().'\\contenido\\'.$recetas->imagen;

        try {
            unlink($path);
            $recetas->delete();

            return 'eliminado';
        } catch (\Throwable $th) {
        }
        //return $recetas;
    }

    public function viewRecetasFront()
    {

        $recetas = DB::table('admpuropotosino'.'.'.'TMContenido')
                            ->where('tipo', '0')
                            ->get();

        return view('front.recetas')->with('recetas', $recetas);
    
    }

    public function getCont($n, $t)
    {
      if (strcmp(session('tipoinicio'), 'admin') == 0) {
        if ($n == 1) {
            $contenido = DB::table('admpuropotosino'.'.'.'TMContenido')
              ->where('tipo', $t)
              ->get();
                  } else {
                      $contenido = DB::table('admpuropotosino'.'.'.'TMContenido')
              ->where('tipo', '0')
              ->get();
                  }

                  return Datatables::of($contenido)
              ->make(true);
      }else{
        return redirect('Login-admin');
      }
    }

    public function getRec()
    {
      if (strcmp(session('tipoinicio'), 'admin') == 0) {
        $contenido = DB::table('admpuropotosino'.'.'.'TMContenido')
        ->where('tipo', '0')
        ->get();

        return Datatables::of($contenido)
        ->make(true);
      }else{
        return redirect('Login-admin');
      }
    }

    public function store(Request $request)
    {
        try {
            //  return "hello";
            $name = $request->nombre;
            $n = str_replace(' ', '', $name);

            $path = public_path()."\contenido\\";
            $carpeta = $path;

            if (!file_exists($carpeta)) {
                try {
                    mkdir($carpeta, 0777, true);
                    $res = '';
                } catch (\Exception $e) {
                    return 'no se creo';
                }
            }

            $fileimg = $request->file('imagen');
            $filenamei = $n.'.'.$fileimg->getClientOriginalExtension();
            $ruta = $carpeta.'/'.$filenamei;

            $cont = new Contenido();
            $cont->fecha_carga = 'Now()';
            $cont->tipo = $request->tipo;
            $cont->titulo = $request->nombre;
            $cont->imagen = $filenamei;
            $cont->descripcion = $request->desc;

            if ($cont->save()) {
                $img = Image::make($fileimg->getRealPath());
                $img->save($ruta, 30);
            } else {
                return redirect('/altaCategorias')->with('Error', 'Llave repetida');
            }

            return redirect('/consultaCat');
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'Ya existe la llave')) {
                return redirect('/altaCategorias')->with('Error', 'Llave repetida');
            }
            echo $e->getMessage();
        }
    }

    public function viewActualizaCont($n)
    {
      if (strcmp(session('tipoinicio'), 'admin') == 0) {
        $test = Contenido::where('ID_contenido', $n)->first();

        return view('admin.actualizacontenido')->with('test', $test);
      }else{
        return redirect('Login-admin');
      }
    }

    public function delete(Request $request)
    {
        $cont = Contenido::where('ID_contenido', $request->Id_delete)->first();

        $path = public_path().'\\contenido\\'.$cont->imagen;

        try {
            unlink($path);
            $cont->delete();

            return 'eliminado';
        } catch (\Throwable $th) {
        }
        //$cont->delete();
        return $cont;

    }

    public function update(Request $request)
    {
        if ($request->imagen != null || $request->imagen != '') {
            $name = $request->nombre;
            $n = str_replace(' ', '', $name);

            $path = public_path()."\contenido\\";
            $carpeta = $path;

            $fileimg = $request->file('imagen');
            $filenamei = $n.'.'.$fileimg->getClientOriginalExtension();
            $ruta = $carpeta.'/'.$filenamei;

            try {
                $cont = Contenido::where('ID_contenido', $request->id)
                        ->update([
                            'titulo' => $request->nombre,
                            'imagen' => $filenamei,
                            'descripcion' => $request->desc,
                        ]);
            } catch (\Exception $e) {
                return back()->with('Error', 'No se pudo actualizar');
            }

            $img = Image::make($fileimg->getRealPath());
            $img->save($ruta, 30);
        } else {
            try {
                $cont = Contenido::where('ID_contenido', $request->id)
                        ->update([
                        'titulo' => $request->nombre,
                        'descripcion' => $request->desc,
                        ]);
            } catch (\Exception $e) {
                return back()->with('Error', 'No se pudo actualizar');
            }
        }

        return redirect('/consultaTestimonios');
    }
}
