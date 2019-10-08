<?php

namespace App\Http\Controllers;

use App\subcat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Image;

class subcatController extends Controller
{
  public function viewSub()
  {
    if (strcmp(session('tipoinicio'), 'admin') == 0) {
      return view('admin.consultasub');
    }else{
      return  redirect ('Login-admin');
    }
  }

  public function getSub()
  {
    if (strcmp(session('tipoinicio'), 'admin') == 0) {
      $cat = DB::table('admpuropotosino'.'.'.'TCSubCategoria')
      ->where('activo', true)
      ->get();

      return Datatables::of($cat)
      ->make(true);
    }else{
      return  redirect ('Login-admin');
    }
  }

  public function altaS()
  {
    if (strcmp(session('tipoinicio'), 'admin') == 0) {
      // $delegacion = DB::table('admcomun'.".".'TCDelegacion')->get();
      // $civil = DB::table('admcomun'.".".'TCEstado_civil')->get();
      $categorias = DB::table('admpuropotosino'.'.'.'TCCategoria')->get();
      // $catresas = DB::table('admbolsa'.".".'TCEmpresas')->where('RFC_camara',session('RFC'))->get();
      return view('admin.altasub')->with('categorias', $categorias);
    } else {
      return redirect('/Login-admin');
    }
  }

  public function actualizaView($id)
  {
    if (strcmp(session('tipoinicio'), 'admin') == 0) {
      $subCat = DB::table('admpuropotosino'.'.'.'TCSubCategoria')
      ->where('ID_subcategoria', $id)
      ->first();
      $categorias = DB::table('admpuropotosino'.'.'.'TCCategoria')->get();
      //dd($subCat);
      return view('admin.altasub')->with('subCat', $subCat)->with('categorias', $categorias);
    }else{
      return  redirect ('Login-admin');
    }
  }

  public function storeS(Request $request)
  {
    //dd($request->all());
    if (isset($request->idSubCat)) {


      $path = public_path()."\subcategorias\\";

      $edit  = subcat::find($request->idSubCat);
      $anterior = str_replace(' ','',$edit->nombre);

      $edit->nombre = $request->nombre;
      $edit->descripcion = $request->desc;
      //$edit->imagen = $filenamei;
      $edit->ID_categoria = $request->id_p;
      if($edit->save()){
        rename($path.$anterior, $path.str_replace(' ','',$edit->nombre));
        return redirect('/consultaSub');
      }
      //dd($edit);
    } else {
      //  return view('bolsatrabajo.bolsatrabajo')->with('Activo', null);
      try {
        //  return "hello";
        $name = $request->nombre;
        $n = str_replace(' ', '', $name);

        $path = public_path()."\subcategorias\\";

        $carpeta = $path.'/'.$n;

        if (!file_exists($carpeta)) {
          try {
            mkdir($carpeta, 0777, true);
            $res = '';
          } catch (\Exception $e) {
            return 'no se creó';
          }
        } else {
          return redirect('/altaSubcategorias')->with('Error', 'Ya existe una Sub-categoria con el mismo nombre');
        }

        $total = DB::table('admpuropotosino'.'.'.'TCSubCategoria')->where('ID_categoria', $request->id_p)->count();
        $total = $total + 1;

        $fileimg = $request->file('imagen');
        $filenamei = $n.'.'.$fileimg->getClientOriginalExtension();
        $ruta = $carpeta.'/'.$filenamei;

        $cat = new subcat();
        $cat->nombre = $request->nombre;
        $cat->descripcion = $request->desc;
        $cat->imagen = $filenamei;
        $cat->ID_categoria = $request->id_p;
        $cat->ID_subcategoria = $total;
        $cat->activo = 1;

        if ($cat->save()) {
          $img = Image::make($fileimg->getRealPath());

          // $img->resize(null, 100);
          $img->save($ruta, 30);
        } else {
          return redirect('/altaSubcategorias')->with('Error', 'Llave repetida');
        }

        return redirect('/consultaSub');
        //   return redirect('/consultaEmpresas')->with('Error', null);
        // }else {
        //   return redirect('/consultaEmpresas')->with('Error', "No se pudo almacenar");
        // }
      } catch (\Exception $e) {
        if (strpos($e->getMessage(), 'Ya existe la llave')) {
          return redirect('/altaSubcategorias')->with('Error', 'Llave repetida');
        }
        echo $e->getMessage();
      }
    }
  }


  public function deleteS(Request $request)
  {
    try {
      $emp = DB::table('admpuropotosino'.'.'.'TCEmpresaPP')
      ->where('ID_categoria', '=', $request->id_cat)
      ->count();

      if ($emp==0){
        $vac = subcat::where('ID_subcategoria', $request->id_cat)
        ->update([
          'activo' => 0,
        ]);
      }else {
        return redirect('/consultaSub')->with('Error', 'No se puede eliminar porque tiene empresas asociadas');
      }
      return redirect('/consultaSub')->with('Error', null);
    } catch (\Exception $e) {
      return redirect('/consultaSub')->with('Error', 'Error al eliminar la vacante');
    }
  }
}
