@extends('front.header')
@section('content')

@include('front.menu')
@include('front.encabezadoprincipal')

<div class="row seccion s1 justify-content-center">
  <div class="col-md-5 line">
    <h1>¿QUE ES PURO POTOSINO?</h1>
  </div>
  <div class="col-md-12">
    <br><h4>
      Puro Potosino es un programa de la Dirección de Desarrollo Económico creado para impulsar en su crecimiento y desarrollo a las Mypymes tanto a nivel local, nacional como internacional.
    </h4>
  </div>
</div>

<div class="row seccion s2">
  <div class="col-md-6">
    <h1>Objetivos</h1>
    <ul>
      <li>
        <h4>Posicionamiento de marca</h4>
        <p>
            Promocionar y difundir los productos y servicios elaborados e
            industrializados en San Luis Potosí, con el prestigio de la marca
            con la que los avala el programa Puro Potosino®.
        </p>
      </li>
      <li>
        <h4>Patrimonio</h4>
        <p>
            Generar un sentimiento de identidad y de orgullo con
            los productos y servicios elaborados en la ciudad de San Luis Potosí.
        </p>
      </li>
      <li>
        <h4>Impulsa al progreso</h4>
        <p>
            Promover  el desarrollo de las empresas así como llevar al empresario
            a un crecimiento sostenido que lo vuelva mas competitivo.
        </p>
      </li>
    </ul>
  </div>
  <div class="col-md-6 logotipo" style="text-align: center;">
      <img src="{{asset('images/logo.png')}}" alt="">
  </div>
</div>
<div class="row seccion s1 justify-content-center">
  <div class="col-md-5 line">
      <h1>INTRODUCCIÓN A SIDEP</h1>
  </div>
  <div class="col-md-12">
  <br>
    <h4>
      Los programas del H . Ayuntamiento de SLP a través de la Dirección de
      Desarrollo Económico nacieron con el objetivo de impulsar el crecimiento
      económico en San Luis Potosí, apoyando a emprendedores con sus ideas y negocios,
      así como fomentando el desarrollo de empresas potosinas.
    </h4>
  </div>
</div>

<div class="row seccion s3">
  <div class="col-md-6 logotipo" style="text-align: center;">
    <img src="{{asset('images/sidep.jpg')}}" alt="" class="sidep">
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

@endsection
