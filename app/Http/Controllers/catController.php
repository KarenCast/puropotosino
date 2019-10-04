<?php


namespace App\Http\Controllers;
use App\Empresas;
use App\UsuariosMorales;
use App\cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Storage;
use Image;

class catController extends Controller
{

  function viewCat(){
      return view('admin.consultacat');
  }

  function viewEditCat($id){
    $cat = DB::table('admpuropotosino'.'.'.'TCCategoria')
    ->where('ID_categoria', $id)->first();
    $carpeta = str_replace(" ","",$cat->nombre);
      return view('admin.editarcat')->with('cat',$cat)->with('carp',$carpeta);
  }

  function getCat( )
  {
      $cat = DB::table('admpuropotosino'.'.'.'TCCategoria')
      ->where('activo', true)
      ->get();
      return Datatables::of($cat)
      ->make(true);
  }


  function altaC(){
    if (strcmp(session('tipoinicio'), 'admin')==0) {
      // $delegacion = DB::table('admcomun'.".".'TCDelegacion')->get();
      // $civil = DB::table('admcomun'.".".'TCEstado_civil')->get();
      // $nivel = DB::table('admcomun'.".".'TCNivelacademico')->get();
      // $catresas = DB::table('admbolsa'.".".'TCEmpresas')->where('RFC_camara',session('RFC'))->get();
      return view('admin.altacat');
    }else{
      return redirect('/Login-admin');
    }
  }


  function storeC(Request $request){

      //  return view('bolsatrabajo.bolsatrabajo')->with('Activo', null);
          try {
          //  return "hello";
            $name = $request->nombre;
            $n= str_replace(" ","",$name);

            $path =  public_path()."\categorias\\";

            $carpeta = $path.'/'.$n;

             if (!file_exists($carpeta)){
               try {
                 mkdir($carpeta, 0777, true);
                 $res = "";
               }catch (\Exception $e) {
                 return "no se creo";
               }
             }else {
               // code...
             }


            $fileimg= $request->file('imagen');
            $fileimg2= $request->file('titulo');

            $filenamei = $n.'.'.$fileimg->getClientOriginalExtension();
            $filenamei2 = $n.'title.'.$fileimg->getClientOriginalExtension();

            $ruta = $carpeta.'/'.$filenamei;
            $ruta2 = $carpeta.'/'.$filenamei2;

              $cat = new cat;

              $cat-> nombre = $request->nombre;
              $cat-> descripcion = $request->desc;
              $cat-> imagen = $filenamei;
              $cat-> titulo = $filenamei2;
              $cat-> activo = 1;

              if($cat -> save()){
              $img = Image::make($fileimg->getRealPath());
              $img2 = Image::make($fileimg2->getRealPath());
              // $img->resize(null, 100);
              $img->save($ruta, 30);
              $img2->save($ruta2, 30);
              }else {
                return redirect('/altaCategorias')->with('Error', 'Llave repetida');
              }

              return redirect('/consultaCat');
            //   return redirect('/consultaEmpresas')->with('Error', null);
            // }else {
            //   return redirect('/consultaEmpresas')->with('Error', "No se pudo almacenar");
            // }


          } catch (\Exception $e) {
            if(strpos($e->getMessage(),"Ya existe la llave"))
            return redirect('/altaCategorias')->with('Error', 'Llave repetida');
            echo $e->getMessage();

          }
      }



      public function deleteC(Request $request)
      {
          try {
            $emp = DB::table('admpuropotosino'.'.'.'TCEmpresaPP')
            ->where('ID_categoria', '=', $request->id_cat)
            ->count();

            if ($emp==0){
            $vac = cat::where('ID_categoria', $request->id_cat)
            ->update([
              'activo' => 0
              ]);
            }else {
              return redirect('/consultaCat')->with('Error', 'No se puede eliminar porque tiene empresas asociadas');
            }
            return redirect('/consultaCat')->with('Error', null);
          } catch (\Exception $e) {

            return redirect('/consultaCat')->with('Error', 'Error al eliminar la vacante');
          }

      }

      public function update(Request $request)
      {
        $name = $request->nombre;
        $n= str_replace(" ","",$name);
        $path = public_path()."\categorias\\";
        $carpeta = $path.'/'.$n;

          if ($request->imagen != null || $request->imagen != '') {
              $fileimg = $request->file('imagen');
              $filenamei = $n.'.'.$fileimg->getClientOriginalExtension();
              $ruta = $carpeta.'/'.$filenamei;
              $cont = cat::where('ID_categoria', $request->id)
                ->update([
                  'imagen' => $filenamei,
                ]);
          }

          if ($request->titulo != null || $request->titulo != '') {
              $fileimg2= $request->file('titulo');
              $filenamei2 = $n.'title.'.$fileimg->getClientOriginalExtension();
              $ruta2 = $carpeta.'/'.$filenamei2;
              $cont = cat::where('ID_categoria', $request->id)
                ->update([
                  'titulo' => $filenamei2,
                ]);
          }
              try {
                  
                  $cont = cat::where('ID_categoria', $request->id)->first();
                  $anterior = str_replace(' ','',$cont->nombre);
                  $cont->update([
                      'nombre' => $request->nombre,
                      'descripcion' => $request->desc,
                    ]);
                  rename($path.$anterior, $path.str_replace(' ','',$cont->nombre));
                    
              } catch (\Exception $e) {
                    return back()->with('Error', 'No se pudo actualizar');
              }

          if ($request->imagen != null || $request->imagen != '') {
              $img = Image::make($fileimg->getRealPath());
              $img->save($ruta, 30);
          }
          if ($request->titulo != null || $request->titulo != '') {
              $img2 = Image::make($fileimg2->getRealPath());
              $img->save($ruta2, 30);
          }


          return redirect('/consultaCat');
      }

}
