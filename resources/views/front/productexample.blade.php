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
.navbar-light .navbar-nav .nav-link{
  color: white!important;
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
            <div class="col-md-12 mb-5">
              <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">
                  <button type="button" class="btn btn-white btn-sm dropdown-toggle px-4" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ÚLTIMOS
                  </button>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-white btn-sm dropdown-toggle px-4" id="dropdownMenuReference" data-toggle="dropdown">
                    Nombre
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-5">
            <div class="products-wrap border-top-0">
              <div class="container-fluid">
                <div class="row no-gutters products" id="contentPrd">

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <div class="site-block-27">
                <ul>
                  <li><a href="#">&lt;</a></li>
                  <li class="active"><span>1</span></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&gt;</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 order-1 order-lg-2 mb-5 mb-lg-0">
          <div class="border p-4 mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Categorias</h3>
            <ul class="list-unstyled mb-0">
              @foreach($cat as $rol)
              <li class="mb-1"><a href="javascript:void(0);"  onclick="loadProducts({{$rol->ID_categoria}})" class="d-flex">
                <span>{{$rol->nombre}}</span>
                <span class="text-black ml-auto">{{$number[$rol->ID_categoria]}}</span></a>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="border p-4 mb-4">
            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Empresa</h3>
              <select name="selectEmpresa" id="selectEmpresa">
                <option value="-1">Todas</option>
              </select>
            </div>
            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Marca</h3>
              <select name="selectMarca" id="selectMarca">
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


<script>

function loadProducts(CategoriaId){
  //console.log(CategoriaId);
  var htmlPrd = "";

  $('#selectEmpresa').empty();
  $('#selectMarca').empty();
  $('#selectEmpresa').append( new Option( 'Todas', '-1' ));
  $('#selectMarca').append( new Option(  'Todas', '-1'));

  $.ajax({
    url: "./api/getProductosFilter",
    dataType: 'json',
    method: 'post',
    data:{
      ID_categoria: CategoriaId
    },
    success: function (data) {
      if(data.data.length == 0)
        htmlPrd = '<h1>Categoria Sin Productos</h1>';
      else
        for (let index = 0; index < data.data.length; index++) {
          const element = data.data[index];
          //console.log(element);
          //$('#selectEmpresa').append('<option value="' + element['ID_empresa'] + '">' + element['razonsocial'] + '</option>');

          if ( $("#selectEmpresa option[value=" + element['ID_empresa'] + "]").length == 0 ){
            $('#selectEmpresa').append( new Option(element['razonsocial'],  element['ID_empresa']));
          }
          if ( $("#selectMarca option[value=" + element['ID_marca'] + "]").length == 0 ){
            $('#selectMarca').append( new Option(element['nombre_marca'],  element['ID_marca']));
          }

          htmlPrd += ' <div class="col-6 col-md-4 col-lg-4 E' + element['ID_empresa'] + ' M' +element['ID_marca'] + ' border-top </div>">'
                  + ' <div class="single-product">'
                  + ' <div class="product-img item">'
                  + ' <img'
                  + ' class="card-img img-fluid"'
                  + ' src="./Files/' + element['ID_empresa'] + '/Productos/' + element['imagen'] + '"'
                  + ' alt="" />'
                  + ' <div class="p_icon">'
                  + ' <a href="#"> <i class="far fa-eye"></i></a></div></div><div class="product-btm"><a href="#" class="d-block">'
                  + ' <h4>' + element['nombre'] + '</h4>'
                  + ' </a><div class="mt-3"><span class="mr-4">' + element['nombre_marca'] + '</span>'
                  + '<del>$35.00</del></div></div></div></div>';
          }
        $('#contentPrd').html(htmlPrd);
    },
    error: function () {
      console.error('error');
    }
  });
}

</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!--<![endif]-->

<script src="{{asset('assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{asset('assets/plugins/blockUI/jquery.blockUI.js')}}"></script>
<script src="{{asset('assets/plugins/iCheck/jquery.icheck.min.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/plugins/less/less-1.5.0.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-cookie/jquery.cookie.js')}}"></script>

<script src="{{asset('js/ejemplo.js')}}"></script>
<script src="{{asset('product/js/popper.min.js')}}"></script>
<script src="{{asset('product/js/bootstrap.min.js')}}"></script>
<script src="{{asset('product/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('product/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('product/js/aos.js')}}"></script>

<!-- <script src="{{asset('product/js/main.js')}}"></script> -->

@endsection
