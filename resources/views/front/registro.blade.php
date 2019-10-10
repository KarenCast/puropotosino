@extends('front.header')
@section('content')

@include('front.menu')
@include('front.encabezado')

<div class="row np">
  <div class="col-md-6">
    <h1>INSCRIPCIÓN SIDEP</h1>
  </div>
</div>

<div class="row" style="margin-top: 50px;">
  <div class="col-md-12" style="text-align:center;">
    <h4 style="text-align:center;">
      Para tener acceso a SIDEP debes registrarte previamente
    </h4>
    <a href="https://sitio.sanluis.gob.mx/VentanillaSLP/public/Registro" target="_blank" >
      <button type="button" class="btn btn-primary regis" name="button" id="">
        <h5 style="text-align:center;">
          Registro <i class="far fa-hand-point-left"></i>

      </button>

    </a>
  </div>
</div>

<div class="row justify-content-center seccion">

  <div class="col-md-6 inicios">

    @if(session('Error')!== null)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Error!</strong> {{{session('Error')}}}
        </div>
        @endif

    <h3 style="text-align:center;">Iniciar Sesión</h3>
    <form action="{{route('LogIn')}}" method="post" id="login">
          {!! csrf_field() !!}
          <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Correo" required="required">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Contraseña" required="required">
          </div>
          <div class="form-group entrar">
            <div class="row">
              <div class="col-md-3 cuadroslog">

              </div>
              <div class="col-md-6 btnentrarlog">
                <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Entrar</button>
              </div>
            </div>

          </div>
        </form>
        <form action="{{route('RecuperaC')}}" method="post" id="recuperar" style="display: none;">
          {!! csrf_field() !!}
          <button type="button" class="close" onclick="login();" aria-hidden="true">&times;</button>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Correo" required="required">
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-3 cuadroslog">

              </div>
              <div class="col-md-6 btnentrarlog">
                <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Enviar</button>
              </div>
            </div>

            <!-- <button type="button" class="btn btn-primary btn-lg btn-block login-btn" onclick="login();">Iniciar Sesion</button> -->
          </div>
        </form>
        <div class="row">
          <div class="col-2"></div>
          <div class="col-4">
            <a href="https://sitio.sanluis.gob.mx/VentanillaSLP/public/Registro" target="_blank">  <img  src="{{asset('images/ICONOREGISTRO.png')}}" alt=""></a>
          </div>
          <div class="col-4">
            <!-- href="{{url('/nuevaContrasena')}}"  -->
            <a  onclick="olvidepass();"><img  src="{{asset('images/ICONOCONTRA.png')}}" alt=""></a>
          </div>
          <div class="col-2"></div>
        </div>



  </div>
  <div class="col-md-6">
    <h1>Beneficios</h1><br><br>
    <ul>
      <li>
        <h5>Profesionalización</h5>
      </li>
      <li>
        <h5>Eventos de exhibición y venta de productos</h5>
      </li>
      <li>
        <h5>Capacitaciones</h5>
      </li>
      <li>
        <h5>Vinculación a créditos</h5>
      </li>
      <li>
        <h5>Asesoría empresarial</h5>
      </li>
      <li>
        <h5>Eventos de networking</h5>
      </li>
      <li>
        <h5>Apoyo en la comercialización</h5>
      </li>
      <li>
        <h5>Registro + usuario y contraseña</h5>
      </li>
    </ul>
  </div>
</div>



<!-- <script src="{{asset('js/mostrar.js')}}"></script> -->
<script type="text/javascript">
function olvidepass()
{
  $(".modal-title").html("Recuperar Contraseña");
  $('#recuperar').show();
  $("#login").hide();
}
function login()
{
  $(".modal-title").html("Iniciar Sesion");
  $('#recuperar').hide();
  $("#login").show();
}
</script>
@endsection
