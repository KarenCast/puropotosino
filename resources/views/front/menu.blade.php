<header>
    <nav class="row navbar navbar-expand-lg navbar-light ml-auto tagline">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <p class="navbar-toggler-icon"></p>
    <!-- <span class="navbar-toggler-icon"></span> -->
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <img src="{{asset('images/logo2.png')}}" alt="" class="img-fluid" width="300px" height="auto" id="logopp">
    <ul class="navbar-nav justify-content-right">
      <li class="nav-item "  id="inicio">
        <a class="nav-link" href="./">Inicio</a>
      </li>
      <li class="nav-item dropdown" id="acercad">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Productos
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{route('mostrarcategoria')}}">Categorias</a>
          <a class="dropdown-item"  href="javascript:{}" onclick="document.getElementById('verProductosForm').submit();">Todos los productos</a>
        </div>
        <form  id="verProductosForm" class="" method="POST" action="{{ route('verproductos') }}" style="display:none">
            {!! csrf_field() !!}
            <input  name="idCategoria" value="-1" readonly/>
        </form>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{route('recetas')}}">Cocina con Puro Potosino</a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{route('eventos')}}">Eventos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{route('programas')}}">Otros Programas</a>
      </li>

      <li class="nav-item dropdown" id="acercad">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Compras
        </a>
        <div class="dropdown-menu">
      
          <a class="dropdown-item" href="https://xibaria.com/">En línea (xibaria)</a>
          <a class="dropdown-item" href="https://comal.club/">En línea (comal)</a>
          <a class="dropdown-item" href="{{route('establecimientos')}}">Establecimientos</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('testimonios')}}">Testimonios</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" id="iniciarsesion" href="{{route('registro')}}">Iniciar Sesión</a>
      </li>


    </ul>
  </div>
</nav>
</header>
