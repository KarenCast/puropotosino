@extends('front.header')
@section('content')

@include('front.menu')

@include('front.encabezado')
<div class="row np">
    <div class="col-md-6">
        <h1>EVENTOS</h1>
    </div>
</div>
<style media="screen">
*,
*::before,
*::after {
    -moz-box-sizing: border-box;
    box-sizing: border-box;

    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

html,
body {
    margin: 0px;
    padding: 0px;
    font-family: 'Lato', sans-serif;
    font-size: 18px;
    font-weight: 300;
    height: 100%;
}

.container {
    /* width: 1024px; */
    max-width: 100%;
    margin: auto;
    display: block;
    text-align: center;
}

.hero {
    width: 100%;
    height: 40%;
    background: #3498db;
    display: table;
}



figure {
    width: auto;
    max-height: 250px;
    overflow: hidden;
    position: relative;
    display: inline-block;
    vertical-align: top;
    border: 5px solid #fff;
    box-shadow: 0 0 5px #ddd;
    margin: 1em;
}

figcaption {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    text-align: center;
    font-weight: bold;
    width: 100%;
    height: 100%;
    display: table;
}

figcaption div {
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

figcaption div:after {
    position: absolute;
    content: "";
    left: 0;
    right: 0;
    bottom: 40%;
    text-align: center;
    margin: auto;
    width: 0%;
    height: 0px;
    background: #2c3e50;
}

figure img {
    -webkit-transition: all 0.5s linear;
    transition: all 0.5s linear;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
}

figure:hover figcaption {
    background: rgba(255, 255, 255, 0.74);
}

figcaption:hover div {
    opacity: 1;
    top: 0;
}

figure:hover figcaption div {
    opacity: 1;
    top: 0;
}

figcaption:hover div:after {
    width: 50%;
}

figure:hover img {
    -webkit-transform: scale3d(1.2, 1.2, 1);
    transform: scale3d(1.2, 1.2, 1);
}



figure img {
    width: auto;
    height: 100%;
    max-height: 220px;
}


figure#video {
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
    src: local('Lato Hairline'), local('Lato-Hairline'), url(https://themes.googleusercontent.com/static/fonts/lato/v6/boeCNmOCCh-EWFLSfVffDg.woff) format('woff');
}

@font-face {
    font-family: 'Lato';
    font-style: normal;
    font-weight: 300;
    src: local('Lato Light'), local('Lato-Light'), url(https://themes.googleusercontent.com/static/fonts/lato/v6/KT3KS9Aol4WfR6Vas8kNcg.woff) format('woff');
}

@font-face {
    font-family: 'Lato';
    font-style: normal;
    font-weight: 400;
    src: local('Lato Regular'), local('Lato-Regular'), url(https://themes.googleusercontent.com/static/fonts/lato/v6/9k-RPmcnxYEPm8CNFsH2gg.woff) format('woff');
}

@font-face {
    font-family: 'Lato';
    font-style: normal;
    font-weight: 700;
    src: local('Lato Bold'), local('Lato-Bold'), url(https://themes.googleusercontent.com/static/fonts/lato/v6/wkfQbvfT_02e2IWO3yYueQ.woff) format('woff');
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

/*Boton de CAPACITACION */
.btnCapacitacion{
  background-color: #2C3E50;
  color: #FFF;  
  font-weight: 700;
  border-radius: 15px;
  border: 2px solid #2C3E50;
}

.btnCapacitacion:hover{
  background-color: #FFF;
  color: #2C3E50;
  font-weight: 700;
  border-radius: 15px;
  border: 2px solid #2C3E50;
}

.mostrar{display:block}
.ocultar{display:none}
.colorRed{color:#963030}
.colorAzul{color:#2C3E50}
.colorVerde{color:green}
.ancho700{font-weight: 700;}
.sizeSmall{font-size:medium}
@keyframes spinner-border {
    to { transform: rotate(360deg); }
} 
.spinner-border{
    display: inline-block;
    width: 2rem;
    height: 2rem;
    vertical-align: text-bottom;
    border: .25em solid currentColor;
    border-right-color: transparent;
    border-radius: 50%;
    -webkit-animation: spinner-border .75s linear infinite;
    animation: spinner-border .75s linear infinite;
}
.spinner-border-sm{
    height: 1rem;
    border-width: .2em;
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

<div class="">
    <!-- <h1 class="text-center my-3">Eventos del Mes</h1> -->
    <div id="myCarousel" class="container carousel slide" data-ride="carousel">
        <div class="carousel-inner row w-100 mx-auto" id="carouselEvents">

        </div>

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

<!-- Boton para Formulario de Capacitacion -->
<div class="row justify-content-center my-5 mx-4">
    <div class="col-12 col-md-3">
        <button type="button" class="btn btnCapacitacion btn-block" data-toggle="modal" data-target="#modalMsjCapacitacion" >¿Te gustaría otro tipo de capacitación?<br>Dejanos tus comentarios</button>
    </div>
</div>

<!-- Modal para Formulario de Capacitacion -->
<div class="modal fade" id="modalMsjCapacitacion" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Dejanos tus comentarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center"><label id="msjError" class="colorRed sizeSmall ancho700  ocultar" >MsjError</label></div>          
        <form id="formMsjCapacitacion">
          <div class="form-group">
            <label for="recipient" class="col-form-label">Nombre Completo:</label>
            <input type="text" class="form-control form-control-sm" id="nombre" name="nombre">
          </div>
          <div class="form-group">
            <label for="correo" class="col-form-label">Correo Electrónico:</label>
            <input type="text" class="form-control form-control-sm" id="correo" name="correo">
          </div>
          <div class="form-group">
            <label for="telefono" class="col-form-label">Teléfono (Opcional):</label>
            <input type="text" class="form-control form-control-sm" id="telefono" name="telefono" maxlength="10">
          </div>
          <div class="form-group">
            <label for="comentarios" class="col-form-label">Comentarios:</label>
            <textarea class="form-control form-control-sm" id="comentario" name="comentario" rows="3"></textarea>
          </div>
        </form>
        <div class="text-center ocultar" id="msjEspera">
            <div class="spinner-border" role="status" aria-hidden="true">
                <span class="sr-only ">Loading...</span>
            </div><br>
            <label  class="colorAzul sizeSmall ancho700  " >
            Enviando comentarios</label>
        </div>
        <div class="text-center"><label id="msjExito" class="colorVerde sizeSmall ancho700 ocultar " >Tu comentario fue enviado con éxito</label></div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCancelarModal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="validarFormCapacitacion()" id="btnEnviarModal">Enviar</button>
      </div>
    </div>
  </div>
</div>

<div id="calendar"></div>


<div class="modal fade right" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false" data-backdrop="false">
    <div class="modal-dialog modal-lg modal-full-height modal-dialog-centered modal-right modal-notify modal-info"
        role="document">
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
                        <p class="text-center">Lugar: <strong id="lugar"></strong></p>
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
                <h5>Solamente pueden registrarse a los eventos las empresas y personas dadas de alta en SIDEP, si no
                    estas registrado, registrate <strong><a href="{{route('registro')}}">aquí</a></strong></h5>

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