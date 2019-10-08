@extends('front.header')
@section('content')

@include('front.menu')
@include('front.encabezado')

<div class="row np">
  <div class="col-md-6">
    <h1>PROGRAMAS</h1>
  </div>
</div>
<div class="row seccion s1 justify-content-center">
  <div class="col-md-6">
    <h1>INSTITUTO DE LA CANTERA</h1>
    <p>
      Descripción:

    </p>
    <p>
      Representante:

    </p>
  </div>
  <div class="col-md-4"  id="programasimg">
    <img src="{{asset('programas/cantera.jpg')}}" alt="" width="100%" style="height: auto; max-width: 250px;">
  </div>

</div>
<div class="row seccion s2 justify-content-center">
  <div class="col-md-4" id="programasimg">
    <img src="{{asset('programas/sanluisartesanal.png')}}" alt="" width="100%" style="height: auto; max-width: 250px;">
  </div>
  <div class="col-md-6">
    <h1>SAN LUIS ARTESANAL</h1>
    <p>
      Descripción:

    </p>
    <p>
      Representante:

    </p>
  </div>

</div>
<div class="row seccion s1 justify-content-center">
  <div class="col-md-6">
    <h1>PEQUEÑO EMPRENDEDOR</h1>
    <p>
      Descripción:

    </p>
    <p>
      Representante:

    </p>
  </div>
  <div class="col-md-4" id="programasimg">
    <img src="{{asset('programas/pequeñoemprendedor.jpg')}}" alt="" width="100%" style="height: auto; max-width: 250px;">
  </div>

</div>
<div class="row seccion s2 justify-content-center">
  <div class="col-md-4" id="programasimg">
    <img src="{{asset('programas/enlacesanluis.png')}}" alt="" width="100%" style="height: auto; max-width: 250px;">
  </div>
  <div class="col-md-6">
    <h1>ENLACE SAN LUIS</h1>
    <p>
      Descripción:

    </p>
    <p>
      Representante:

    </p>
  </div>

</div>


@endsection
