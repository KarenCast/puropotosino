@extends('front.header')
@section('content')

@include('front.menu')
@include('front.encabezado')

<style media="screen">
a {
  cursor: pointer;
  text-decoration: none;
}

.contenedor-redes-sociales {
  margin: 20px 0;
  padding: 5px;
  text-align: center;
}

.contenedor-redes-sociales a {
  position: relative;
  display: inline-block;
  height: 40px;
  width: 130px;
  line-height: 35px;
  padding: 0;
  color: #fff;
  border-radius: 50px;
  background: #fff;
  margin: 5px;
  text-shadow: 2px 2px rgba(0, 0, 0, 0.1);
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.12), 0 2px 4px rgba(0, 0, 0, 0.24);
}

.contenedor-redes-sociales a:hover span.circulo {
  left: 100%;
  margin-left: -35px;
  background: #fff;
}

.contenedor-redes-sociales a:hover span.titulo {
  opacity: 0;
}

.contenedor-redes-sociales a:hover span.titulo-hover {
  opacity: 1;
  color: #fff;
}

.contenedor-redes-sociales a span.titulo-hover {
  opacity: 0;
}

.contenedor-redes-sociales a span.circulo {
  display: block;
  color: #fff;
  position: absolute;
  float: left;
  margin: 3px;
  line-height: 30px;
  height: 30px;
  width: 30px;
  top: 0;
  left: 0;
  transition: all 0.5s;
  border-radius: 50%;
}

.contenedor-redes-sociales a span.circulo i {
  width: 100%;
  text-align: center;
  font-size: 16px;
  line-height: 30px;
}

.contenedor-redes-sociales a span.titulo, .contenedor-redes-sociales a span.titulo-hover {
  position: absolute;
  text-align: center;
  margin: 0 auto;
  font-size: 16px;
  font-weight: 400;
  transition: .5s;
}

.contenedor-redes-sociales a span.titulo {
  right: 15px
}

.contenedor-redes-sociales a span.titulo-hover {
  left: 15px
}


/*----------Colores de los botones----------*/

.contenedor-redes-sociales .facebook {
  border: 2px solid #9a9ea6;
}
.contenedor-redes-sociales .facebook span.circulo{
  background: #b5b5b5;
}

.contenedor-redes-sociales .facebook:hover, .contenedor-redes-sociales .facebook:hover span.circulo {
  background: #3b5998;
  border: 2px solid #3b5998;
  color: #fff;
}

.contenedor-redes-sociales .facebook:hover span.circulo, .contenedor-redes-sociales .facebook span.titulo {
  color:  #959191;
}



.contenedor-redes-sociales .twitter {
  border: 2px solid #9a9ea6;
}

.contenedor-redes-sociales .twitter span.circulo{
  background: #b5b5b5;
}

.contenedor-redes-sociales .twitter:hover, .contenedor-redes-sociales .twitter:hover span.circulo {
  background: #1da1f2;
  border: 2px solid #1da1f2;
  color: #fff;
}

.contenedor-redes-sociales .twitter:hover span.circulo, .contenedor-redes-sociales .twitter span.titulo {
  color: #959191;
}

.contenedor-redes-sociales .gplus {
  border: 2px solid #9a9ea6;
}

.contenedor-redes-sociales .gplus span.circulo{
  background: #b5b5b5;
}

.contenedor-redes-sociales .gplus:hover, .contenedor-redes-sociales .gplus:hover span.circulo {
  background: #541df2;
  border: 2px solid #541df2;
  color: #fff;
}

.contenedor-redes-sociales .gplus:hover span.circulo, .contenedor-redes-sociales .gplus span.titulo {
  color: #959191;
}




.contenedor-redes-sociales .gplus2 {
  border: 2px solid #9a9ea6;
}

.contenedor-redes-sociales .gplus2 span.circulo{
  background: #b5b5b5;
}

.contenedor-redes-sociales .gplus2:hover, .contenedor-redes-sociales .gplus2:hover span.circulo {
  background: #f21d37;
  border: 2px solid #f21d37;
  color: #fff;
}

.contenedor-redes-sociales .gplus2:hover span.circulo, .contenedor-redes-sociales .gplus2 span.titulo {
  color: #959191;
}

input#nombre_e{
  font-size: 26px;
border: none;
color: #fff;
background-color: rgba(255, 255, 255, 0);
}
/*--------------Mediaqueries--------------*/

@media screen and (max-width: 480px) {
  .contenedor-redes-sociales a {
      width: 100%;
      margin: 0;
      margin-bottom: 10px;
  }
}
</style>

<div class="row np">
  <div class="col-md-6">
    <h1>PRODUCTOS</h1>
  </div>
</div>



				<!-- end: SPANEL CONFIGURATION MODAL FORM -->


					<div class="row" style="margin: 5%;">
            <div class="col-md-1">

            </div>
						<div class="col-md-10">
              <div class="table-responsive">

  							 <table id="tableproductos" name= "tableproductos" class="table-striped dt-responsive nowrap" style="width: 100%; ">
                    <thead class="thead-light">
                     	<tr>

                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Empresa</th>
                              <th></th>
  										  <th>Imagen</th>
                        <th></th>
                       </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>

  							</div>
            </div>
					</div>

          <div class="row seccion s2">
            <div id="alianzas" class="col-md-12" style="margin-bottom: 20px">
              <h3>COLABORADORES</h3>
            </div>
            <div class="col-md-2  col-3"  id="alianza">
              <img src="{{asset('alianzas/logocjm.png')}}" alt="" width="100%" height="auto">
            </div>
            <div class="col-md-2  col-3" id="alianza">
              <img src="{{asset('alianzas/canaco.png')}}" alt="" width="100%" height="auto">
            </div>
            <div class="col-md-2  col-3" id="alianza">
              <img src="{{asset('alianzas/logocomce.png')}}" alt="" width="100%" height="auto">
            </div>
            <div class="col-md-2  col-3" id="alianza">
              <img src="{{asset('alianzas/ucuau.png')}}" alt="" width="100%" height="auto">
            </div>
            <div class="col-md-2  col-3" id="alianza">
              <img src="{{asset('alianzas/proyecta.png')}}" alt="" width="100%" height="auto">
            </div>
            <div class="col-md-2  col-3" id="alianza">
              <img src="{{asset('alianzas/enture.jpeg')}}" alt="" width="100%" height="auto">
            </div>
          </div>





      <div class="modal fade" id="modalverproducto" tabindex="-1" role="dialog" aria-labelledby="modal-lici" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">



                 <div class="modal-header" style="background-color: #1c3150; color: #fff;">
                   <input readonly type="text" name="nombre_e" id="nombre_e"  class="inoborder form-control"/>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                      </button>
                 </div>
                 <div class="modal-body">
                      <div class="container">

                              <form action="" method="post" id="candvac">
                                @csrf
                                {{ csrf_field() }}

                                <div class="row " style="border-top: 1px solid #ddd; padding:2em;">
                                      <div class="form-group col-md-12" style="text-align:center">
                                        <img src="" name="img_e" id="img_e" alt="" width="60%">
                                      </div>
                                      <div class="form-group col-md-12">
                                            <p><strong>Descripción:</strong></p>
                                            <textarea name="desc_e" id="desc_e" rows="3" cols="80" class="form-control" readonly style="border:none"></textarea>
                                      </div>
                                     <div class="form-group col-md-5">
                                           <p><strong>Nombre de marca:</strong></p>
                                           <input readonly type="text" name="marca_e" id="marca_e"  class="inoborder form-control"/>

                                     </div>
                                     <div class="form-group col-md-5">
                                           <p><strong>Empresa:</strong></p>
                                           <input readonly type="text" name="empresa_e" id="empresa_e"  class="inoborder form-control"/>

                                     </div>
                                     <div class="form-group col-md-2">
                                           <!-- <p><strong>Logo:</strong></p> -->
                                           <img id="logo_e" name="logo_e" src="" alt="" width="100%">

                                     </div>



                                  </div>

                                   <div class="row " style="border-top: 1px solid #ddd; padding:1em 2em;">
                                     <div class="contenedor-redes-sociales" style="width: 100%;">
                                         	<a class="facebook" id="facebook" href="" target="_blank">
                                         		<span class="circulo"><i class="fab fa-facebook-f"></i></span>
                                         		<span class="titulo">Facebook</span>
                                         		<span class="titulo-hover">Visitar</span>
                                         	</a>

                                    		<a class="twitter" id="twitter" href="" target="_blank">
                                    			<span class="circulo"><i class="fab fa-twitter"></i></span>
                                    			<span class="titulo">Twitter</span>
                                    			<span class="titulo-hover">Visitar</span>
                                    		</a>

                                    		<a class="gplus" id="instagram" href="" target="_blank">
                                    			<span class="circulo"><i class="fab fa-instagram"></i></span>
                                    			<span class="titulo">Instagram</span>
                                    			<span class="titulo-hover">Visitar</span>
                                    		</a>

                                        <a class="gplus2" id="sitio" href="" target="_blank" >
                                    			<span class="circulo"><i class="fas fa-link"></i></span>
                                    			<span class="titulo">Sitio Web</span>
                                    			<span class="titulo-hover">Visitar</span>
                                    		</a>
                                      </div>
                                     </div>


                            </div>
                            <div class="row justify-content-center">
                              <div class="col-md-4">

                              </div>
                              <!-- <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-block login-btn aplicar">Visualizar Candidatos</button>
                              </div> -->
                            </div>
                          </form>
                       </div>
                       <div class="modal-footer">
                        <div class="row justify-content-center">



                        </div>

                      </div>

                  </div>
             </div>
        </div>
        <script src="{{asset('js/FunctionProductos.js')}}" type="text/javascript"></script>
@endsection
