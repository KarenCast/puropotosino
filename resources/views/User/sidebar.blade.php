
<div class="navbar-content">
  <!-- start: SIDEBAR -->
  <div class="main-navigation navbar-collapse collapse">
    <!-- start: MAIN MENU TOGGLER BUTTON -->
    <div class="navigation-toggler">
        <img src="{{asset('images/logo.png')}}" alt="" id="icono" >
    </div>
    <!-- end: MAIN MENU TOGGLER BUTTON -->
    <!-- start: MAIN NAVIGATION MENU -->
    <ul class="main-navigation-menu">
      <li id="home">
        <a href="{{route('inicioUser')}}"><i class="clip-home-3" id="home"></i>
          <span class="title">INICIO</span><span class="selected"></span>
        </a>
      </li>

      <!-- Separador -->

      <li id="tramite">
       <strong>SIDEP</strong><span class="selected"></span>
      </li>
      <li>
        <a href="javascript:void(0)"><i class="far fa-building"></i>
          <span class="title"> SEGUIMIENTO </span><i class="icon-arrow"></i>
          <span class="selected"></span>
        </a>
        <ul class="sub-menu">
          <li>
            <a href="{{route('inicioUser')}}">
              <span class="title"><i class="fa fa-search" aria-hidden="true"></i>Mi seguimiento</span>
            </a>
          </li>

          <!-- <li>
            <a href="/altaEmpresas">
              <span class="title"><i class="fa fa-arrow-up" aria-hidden="true"></i> Alta Empresas</span>
            </a>
          </li> -->

        </ul>
      </li>

      <li>
        <a href="javascript:void(0)"><i class="fas fa-briefcase"></i>
          <span class="title"> REGISTRO DE MARCA </span><i class="icon-arrow"></i>
          <span class="selected"></span>
        </a>
        <ul class="sub-menu">
          <li>
            <a href="{{route('consultaMarcas')}}">
              <span class="title"><i class="fa fa-search" aria-hidden="true"></i> Consulta tus Marcas</span>
            </a>
          </li>

          <li>
            <a href="{{route('altaMarca')}}">
              <span class="title"><i class="fa fa-arrow-up" aria-hidden="true"></i> Alta de Marcas</span>
            </a>
          </li>


        </ul>
      </li>
      <li>
        <a href="javascript:void(0)"><i class="fas fa-user-tie"></i>
          <span class="title"> PRODUCTOS </span><i class="icon-arrow"></i>
          <span class="selected"></span>
        </a>
        <ul class="sub-menu">
          <li>
            <a href="{{route('consultaProducto')}}">
              <span class="title"><i class="fa fa-search" aria-hidden="true"></i> Consulta tus productos</span>
            </a>
          </li>

          <li>
            <a href="{{route('altaProducto')}}">
              <span class="title"><i class="fa fa-arrow-up" aria-hidden="true"></i> Alta Productos</span>
            </a>
          </li>


        </ul>
      </li>


      <li>
        <a href="javascript:void(0)"><i class="fa fa-picture-o" aria-hidden="true"></i>
          <span class="title"> ETAPAS </span><i class="icon-arrow"></i>
          <span class="selected"></span>
        </a>
        <ul class="sub-menu">
          <li>
            <a href="{{route('consultaEtapas')}}">
              <span class="title"><i class="fa fa-search" aria-hidden="true"></i> Consulta Etapas</span>
            </a>
          </li>

        </ul>
      </li>




    </ul>


    <!-- end: MAIN NAVIGATION MENU -->
  </div>
  <!-- end: SIDEBAR -->
</div>
