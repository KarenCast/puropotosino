@extends('front.header')
@section('content')

@include('front.menu')

<style media="screen">
    *, *::before, *::after{
    -moz-box-sizing: border-box;
         box-sizing: border-box;

    -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
    }

    html, body{
    margin: 0px;
    padding: 0px;
    font-family: 'Lato',sans-serif;
    font-size: 18px;
    font-weight: 300;
    height: 100%;
    }

    .container{
    width: 1024px;
    max-width: 100%;
    margin: auto;
    display: block;
    text-align: center;
    }

    .hero{
    width: 100%;
    height: 40%;
    background: #3498db;
    display: table;
    }



    figure{
    width: 400px;
    height: 300px;
    overflow: hidden;
    position: relative;
    display: inline-block;
    vertical-align: top;
    border: 5px solid #fff;
    box-shadow: 0 0 5px #ddd;
    margin: 1em;
    }

    figcaption{
    position: absolute;
    left: 0; right: 0;
    top: 0; bottom: 0;
    text-align: center;
    font-weight: bold;
    width: 100%;
    height: 100%;
    display: table;
    }

    figcaption div{
        padding-top: 45px;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        position: absolute;
        display: table-cell;
        vertical-align: middle;

    opacity: 0;
    color: #2c3e50;
    text-transform: uppercase;
    }

    a#spe {
      position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 100%;
    }

    figcaption div:after{
    position: absolute;
    content: "";
    left: 0; right: 0;
    bottom: 40%;
    text-align: center;
    margin: auto;
    width: 0%;
    height: 0px;
    background: #2c3e50;
    }

    figure img{
    -webkit-transition: all 0.5s linear;
            transition: all 0.5s linear;
    -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
    }

    figure:hover figcaption{
    background: rgba(255, 255, 255, 0.74);
    }

    figcaption:hover div{
    opacity: 1;
    top: 0;
    }

    figure:hover figcaption div{
      opacity: 1;
      top: 0;
    }

    figcaption:hover div:after{
    width: 50%;
    }

    figure:hover img{
    -webkit-transform: scale3d(1.2, 1.2, 1);
            transform: scale3d(1.2, 1.2, 1);
    }



    figure img{
      width: 100%;
      height: auto;
      max-height: 220px;
    }


    figure#video{
    width: 100%;
    height: auto;
    overflow: hidden;
    position: relative;
    display: inline-block;
    vertical-align: top;
    border: 5px solid #fff;
    box-shadow: 0 0 5px #ddd;
    margin: 1em;
    }


    /*font-face*/
    @font-face {
    font-family: 'Lato';
    font-style: normal;
    font-weight: 100;
    src: local('Lato Hairline'), local('Lato-Hairline'), url(http://themes.googleusercontent.com/static/fonts/lato/v6/boeCNmOCCh-EWFLSfVffDg.woff) format('woff');
    }

    @font-face {
    font-family: 'Lato';
    font-style: normal;
    font-weight: 300;
    src: local('Lato Light'), local('Lato-Light'), url(http://themes.googleusercontent.com/static/fonts/lato/v6/KT3KS9Aol4WfR6Vas8kNcg.woff) format('woff');
    }
    @font-face {
    font-family: 'Lato';
    font-style: normal;
    font-weight: 400;
    src: local('Lato Regular'), local('Lato-Regular'), url(http://themes.googleusercontent.com/static/fonts/lato/v6/9k-RPmcnxYEPm8CNFsH2gg.woff) format('woff');
    }

    @font-face {
    font-family: 'Lato';
    font-style: normal;
    font-weight: 700;
    src: local('Lato Bold'), local('Lato-Bold'), url(http://themes.googleusercontent.com/static/fonts/lato/v6/wkfQbvfT_02e2IWO3yYueQ.woff) format('woff');
    }

    @media screen and (min-width: 768px) {
  .carousel-inner .active,
  .carousel-inner .active+.carousel-item {
    display: block;
  }
  .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
  .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item {
    -webkit-transition: none;
    transition: none;
  }
  .carousel-inner .carousel-item-next,
  .carousel-inner .carousel-item-prev {
    position: relative;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  .carousel-inner .active.carousel-item+.carousel-item+.carousel-item+.carousel-item {
    position: absolute;
    top: 0;
    right: -50%;
    z-index: -1;
    display: block;
    visibility: visible;
  }
  /* left or forward direction */
  .active.carousel-item-left+.carousel-item-next.carousel-item-left,
  .carousel-item-next.carousel-item-left+.carousel-item {
    position: relative;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
    visibility: visible;
  }
  /* farthest right hidden item must be abso position for animations */
  .carousel-inner .carousel-item-prev.carousel-item-right {
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    display: block;
    visibility: visible;
  }
  /* right or prev direction */
  .active.carousel-item-right+.carousel-item-prev.carousel-item-right,
  .carousel-item-prev.carousel-item-right+.carousel-item {
    position: relative;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible;
    display: block;
    visibility: visible;
  }
}

/* Desktop and up */

@media screen and (min-width: 992px) {
  .carousel-inner .active,
  .carousel-inner .active+.carousel-item,
  .carousel-inner .active+.carousel-item+.carousel-item {
    display: block;
  }
  .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
  .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item,
  .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left)+.carousel-item+.carousel-item {
    -webkit-transition: none;
    transition: none;
  }
  .carousel-inner .carousel-item-next,
  .carousel-inner .carousel-item-prev {
    position: relative;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
  .carousel-inner .active.carousel-item+.carousel-item+.carousel-item+.carousel-item {
    position: absolute;
    top: 0;
    right: -33.3333%;
    z-index: -1;
    display: block;
    visibility: visible;
  }
  /* left or forward direction */
  .active.carousel-item-left+.carousel-item-next.carousel-item-left,
  .carousel-item-next.carousel-item-left+.carousel-item,
  .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item,
  .carousel-item-next.carousel-item-left+.carousel-item+.carousel-item+.carousel-item {
    position: relative;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
    visibility: visible;
  }
  /* farthest right hidden item must be abso position for animations */
  .carousel-inner .carousel-item-prev.carousel-item-right {
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    display: block;
    visibility: visible;
  }
  /* right or prev direction */
  .active.carousel-item-right+.carousel-item-prev.carousel-item-right,
  .carousel-item-prev.carousel-item-right+.carousel-item,
  .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item,
  .carousel-item-prev.carousel-item-right+.carousel-item+.carousel-item+.carousel-item {
    position: relative;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible;
    display: block;
    visibility: visible;
  }
}

    </style>
@if(session('Error')!== null)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Error!</strong> {{{session('Error')}}}
</div>
@endif
@if(session('Exito')!== null)
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Exito!</strong> {{{session('Exito')}}}
</div>
@endif

<div class="container-fluid">
    <h1 class="text-center my-3">Eventos del Mes</h1>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner row w-100 mx-auto" id="carouselEvents">
       
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mt-4">
            <a class="btn btn-outline-secondary mx-1 prev" href="javascript:void(0)" title="Previous">
              <i class="fa fa-lg fa-chevron-left"></i>
            </a>
            <a class="btn btn-outline-secondary mx-1 next" href="javascript:void(0)" title="Next">
              <i class="fa fa-lg fa-chevron-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="calendar" style="padding: 11em;"></div>


<div class="modal fade right" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false" data-backdrop="false">
    <div class="modal-dialog modal-lg modal-full-height modal-dialog-centered modal-right modal-notify modal-info" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <i class="fas fa-calendar-day fa-2x mb-3 animated rotateIn"></i>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="row">
                    <img class="card-img-bottom col-8" src="" id="foto" alt="Card image cap">
                    <div class="text-center col-4">

                        <h2 class="text-center"><strong id="nombre_evento"></strong></h2>
                        <hr>
                        <p class="text-center">Fecha/Hora: <strong id="fecha_evento"></strong></p>
                        <p class="text-center">Observaciones: <strong id="observaciones"></strong></p>
                        <p class="text-center">Requisitos: <strong id="requisitos"></strong></p>
                        <p class="text-center">Tema: <strong id="tema"></strong></p>
                        <p class="text-center">Costo: <strong id="costo"></strong></p>
                    </div>
                </div>

            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cerrar</a>
                <a type="button" class="btn btn-outline-primary waves-effect" onClick="meInteresa();">Me interesa</a>
            </div>
        </div>
    </div>
</div>

<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Registro a evento</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{route('RegistroEvento')}}" role="form" autocomplete="off" id="formLogin"
                    method="POST">
                    @csrf
                    {{ csrf_field() }}
                    <input type="hidden" id="idEvento" name="idEvento">
                    <div class="form-group">
                        <label for="uname1">Correo</label>
                        <input type="email" class="form-control form-control-lg" name="correo" required="true">
                        <div class="invalid-feedback">Campo necesario.</div>
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control form-control-lg" name="contrasena" required="true"
                            autocomplete="new-password">
                        <div class="invalid-feedback">Campo necesario</div>
                    </div>

                    <div class="form-group py-4">
                        <button class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                            aria-hidden="true">Cancelar</button>
                        <button type="submit" class="btn btn-success btn-lg float-right"
                            id="btnLogin">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/AmaranJS/css/amaran.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/AmaranJS/css/animate.min.css')}}" />
<script src="{{asset('assets/plugins/AmaranJS/js/jquery.amaran.js')}}"></script>

<script src="{{asset('js/notifications.js')}}"></script>
<script src="{{asset('js/FunctionEventosCalendar.js')}}"></script>

<link href="{{asset('assets/plugins/core/main.css')}}" rel='stylesheet' />
<link href="{{asset('assets/plugins/daygrid/main.css')}}" rel='stylesheet' />
<script src="{{asset('assets/plugins/core/main.js')}}"></script>
<script src="{{asset('assets/plugins/interaction/main.js')}}"> </script>
<script src="{{asset('assets/plugins/daygrid/main.js')}}"></script>
<script>

</script>
@endsection
