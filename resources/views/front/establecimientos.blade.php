@extends('front.header')
@section('content')

@include('front.menu')
@include('front.encabezado')
<div class="row np">
  <div class="col-md-6">
    <h1>ESTABLECIDOS</h1>
  </div>
</div>
<div class="container">

  <div class="row" id="prox">
    <div class="col-md-4 col-6" data-aos="zoom-in">
      <a href="">
        <img src="{{asset('establecidos/LOGOCUESCO.png')}}" alt="">
      </a>
    </div>
    <div class="col-md-4 col-6" data-aos="zoom-in">
      <a href="http://lasuperior.com.mx/">
        <img src="{{asset('establecidos/LOGOLASUPERIOR.png')}}" alt="">
      </a>
    </div>
    <div class="col-md-4 col-6" data-aos="zoom-in">
      <a href="http://www.grupoeuro.com.mx/maxstore">
        <img src="{{asset('establecidos/LOGOMAXSTORE.png')}}" alt="">
      </a>
    </div>

  </div>

  <div class="row" id="prox"  >
    <div class="col-md-4 col-6" data-aos="zoom-in">
      <a href="http://unitienda.uaslp.mx/">
        <img src="{{asset('establecidos/LOGOUNITIENDA.jpg')}}" alt="">
      </a>
    </div>
    <div class="col-md-4 col-6" data-aos="zoom-in">
      <a href="#">
        <!-- <img src="{{asset('establecidos/LOGOUNITIENDA.jpg')}}" alt=""> -->
      </a>
    </div>
    <div class="col-md-4 col-6" data-aos="zoom-in">
      <a href="#">
        <!-- <img src="{{asset('establecidos/LOGOUNITIENDA.jpg')}}" alt=""> -->
      </a>
    </div>


  </div>
</div>




<script>
  AOS.init();
</script>
@endsection
