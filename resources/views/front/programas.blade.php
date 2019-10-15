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
      <strong>Descripción:</strong><br>
      El Instituto de la Cantera es un programa de la Dirección de Desarrollo Económico que pretende impulsar a todos los maestros canteros de nuestra Ciudad con espacios de exposición y venta, capacitación continua, equipamiento y mantenimiento de sus maquinarias, para así lograr la profesionalización y posicionamiento de la Industria de la Cantera de San Luis Potosí a nivel local, nacional e internacional.
    </p>
    <p>
      <strong>Responsable:</strong><br>
      Abdias Araus Alonso  tel. 8345486 ext. 3003

    </p>
  </div>
  <div class="col-md-4"  id="programasimg" data-aos="fade-left">
    <img src="{{asset('programas/cantera.jpg')}}" alt="" width="100%" style="height: auto; max-width: 250px;">
  </div>

</div>
<div class="row seccion s2 justify-content-center">
  <div class="col-md-4" id="programasimg" data-aos="fade-right">
    <img src="{{asset('programas/sanluisartesanal.png')}}" alt="" width="100%" style="height: auto; max-width: 250px;">
  </div>
  <div class="col-md-6">
    <h1>SAN LUIS ARTESANAL</h1>
    <p>
      <strong>Descripción:</strong><br>
      Es un programa de apoyo a los artesanos radicados en San Luis Potosí, que provienen de distintas etnias o grupos originarios mexicanos, para su impulso a la profesionalización, exposición y venta de sus productos, así como capacitación continua.

    </p>
    <p>
      <strong>Responsable:</strong>
      <br>Abdias Araus Alonso  tel. 8345486 ext. 3003
    </p>
  </div>

</div>
<div class="row seccion s1 justify-content-center">
  <div class="col-md-6">
    <h1>PEQUEÑO EMPRENDEDOR</h1>
    <p>
      <strong>Descripción:</strong><br>
      Taller dedicado a niños y jóvenes entre los 8 y 13 años de edad, diseñado para inculcar el emprendimiento desde edades tempranas como parte del ecosistema emprendedor pretendido en nuestro Municipio, en donde desde una perspectiva constructivista se instruyen diversas técnicas y metodologías de creatividad, innovación y emprendimiento.
    </p>
    <p>
      <strong>Responsable:</strong><br>
      Gabriela Betancourt Dibildox  tel. 8345486
    </p>
  </div>
  <div class="col-md-4" id="programasimg" data-aos="fade-left">
    <img src="{{asset('programas/pequeñoemprendedor.jpg')}}" alt="" width="100%" style="height: auto; max-width: 250px;">
  </div>

</div>
<div class="row seccion s2 justify-content-center">
  <div class="col-md-4" id="programasimg" data-aos="fade-right">
    <img src="{{asset('programas/enlacesanluis.png')}}" alt="" width="100%" style="height: auto; max-width: 250px;">
  </div>
  <div class="col-md-6">
    <h1>ENLACE SAN LUIS</h1>
    <p>
      <strong>Descripción:</strong><br>
      Es un encuentro de negocios entre empresas proveedoras de servicios y comercializadoras potosinas y toda aquella empresa pequeña,mediana, grande, multinacional, transnacional o local que tenga necesidades específicas en su industria que aún no han sido cubiertas del todo o que requieran de una logística o cadena de proveeduría local que otorga mayor inmediatez.

    </p>
    <p>
      <strong>Responsable:</strong><br>
      Roxana Olvera Rosillo  tel. 8345486 ext. 3003

    </p>
  </div>

</div>
<script>
  AOS.init();
</script>

@endsection
