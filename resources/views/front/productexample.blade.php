@extends('front.header')
@section('content')

@include('front.menu')
@include('front.encabezado')
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('product/fonts/icomoon/style.css')}} ">

  <link rel="stylesheet" href="{{asset('product/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('product/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('product/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('product/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('product/css/owl.theme.default.min.css')}}">


  <link rel="stylesheet" href="{{asset('product/css/aos.css')}}">

  <link rel="stylesheet" href="{{asset('product/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('eiser/style.css')}}">
</head>
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
  background: #f21d37!important;
  border: 2px solid #f21d37!important;
  color: #fff!important;
}

.contenedor-redes-sociales .gplus2:hover span.circulo, .contenedor-redes-sociales .gplus2 span.titulo {
  color: #959191!important;
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


.navbar-light .navbar-nav .nav-link{
  color: white!important;
}

img.card-img{
  min-height: 200px;
    max-height: 201px;
}




</style>
<div class="row np">
  <div class="col-md-6">
    <h1>PRODUCTOS</h1>
  </div>
</div>
<div class="site-wrap">
  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-9 order-2 order-lg-1">
          <div class="row align">
            <div class="col-md-6">
              <div class="container-fluid">
                <div class="row no-gutters ">
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="busqueda" id="busqueda" value="" onkeyup="mayus(this);">

                  </div>
                  <div class="col-md-3">
                    <button type="button" class="btn" onclick="loadProducts(-1, 3)">
                      Buscar
                    </button>
                  </div>
                </div>
                <input type="text" name="totalpa" id="totalpa" value="{{$totales}}" style="display: none">
              </div>

            </div>
            <div class="col-md-3 mb-5">

                <div class="dropdown mr-1 ml-md-auto" style="width: 100%;">

                  <button type="button" class="btn btn-white btn-sm dropdown" style="width: 100%">

                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="width: 100%; color: rgb(92, 92, 92);">
                        Nombre
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" onclick="loadProducts(-1, 1)">Ascendente</a>
                        <a class="dropdown-item" href="#" onclick="loadProducts(-1, 2)">Descendente</a>

                      </div>

                  </button>
                </div>
            </div>
            <div class="col-md-3 mb-5">

                <div class="dropdown mr-1 ml-md-auto" style="width: 100%;">

                  <button type="button" class="btn btn-white btn-sm dropdown" style="width: 100%">

                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="width: 100%; color: rgb(92, 92, 92);">
                        Mostrar
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" onclick="todos();">Todos</a>
                        <a class="dropdown-item" href="#" onclick="showperpage(1);">Por página</a>

                      </div>

                  </button>
                </div>


            </div>
          </div>
          <div class="row mb-5">
            <div class="products-wrap border-top-0" style="width: 100%;">
              <div class="container-fluid">
                <div class="row no-gutters products" id="contentPrd">

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <div class="site-block-27"  id="numeros" style="display: none;">
                <ul>
                  <li><a href="#">&lt;</a></li>
                  @for ($i = 1; $i <= $totales; $i++)
                    <li class="" value="{{$i}}" onclick="showperpage({{$i}});" id="page{{$i}}"><span>{{$i}}</span></li>
                  @endfor


                  <!-- <li class="active" value="1" onclick="showperpage(page1);" id="page1"><span>1</span></li>
                  <li value="2" onclick="showperpage(page2);" id="page2"><span>2</span></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li> -->

                  <li><a href="#">&gt;</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 order-1 order-lg-2 mb-5 mb-lg-0">
          <div class="border mb-4">
            <h3 class="mt-2  p-3  h6 text-uppercase d-block">Categorias</h3>
            <ul class="list-unstyled mb-0">
                <li class="mb-1 lines "><a href="javascript:void(0);"  onclick="loadProducts(-1, 0)" class="d-flex">
                    <span>Todas</span><span class="text-black ml-auto">({{$total}})</span></a>
                </li>
                @foreach($cat as $rol)
                  <li class="mb-1 lines"><a href="javascript:void(0);"  onclick="loadProducts({{$rol->ID_categoria}}, 0)" class="d-flex">
                    <span>{{$rol->nombre}}</span>
                    <span class="text-black ml-auto">({{$number[$rol->ID_categoria]}})</span></a>
                  </li>
                @endforeach
            </ul>
          </div>
          <div class="border p-3 mb-4">
            <div class="mb-4 form-group">
              <h3 class="mb-3 h6 text-uppercase d-block">Empresa</h3>
              <select name="selectEmpresa" id="selectEmpresa" class="form-control">
                <option value="-1">Todas</option>
              </select>
            </div>
            <div class="mb-4 form-group">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Marca</h3>
              <select name="selectMarca" id="selectMarca" class="form-control" >
                <option value="-1">Todas</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="" id="resultado"></div>

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
                                     <p><strong>Marca registrada:</strong></p>
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


<!--<![endif]-->

<script type="text/javascript">
function mayus(e) {
  e.value = e.value.toUpperCase();
}
</script>
<script src="{{asset('js/FunctionsProductosEC.js')}}"></script>



<script src="{{asset('product/js/popper.min.js')}}"></script>

<script src="{{asset('product/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('product/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('product/js/aos.js')}}"></script>

<!-- <script src="{{asset('product/js/main.js')}}"></script> -->

@endsection
