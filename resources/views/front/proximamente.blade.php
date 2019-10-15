@extends('front.header')
@section('content')

@include('front.menu')
@include('front.encabezado')

<div class="row np">
  <div class="col-md-6">
    <h1>PRÓXIMAMENTE EN ...</h1>
  </div>
</div>

<div class="container">

  <div class="row" id="prox">
    <div class="col-md-4 col-6" data-aos="zoom-in">
      <a href="#">
        <img src="{{asset('proximamente/LOGOPARADORPOTOSINO.png')}}" alt="">
      </a>
    </div>
    <div class="col-md-4 col-6" data-aos="zoom-in">
      <a href="#">
        <img src="{{asset('proximamente/LOGO.jpg')}}" alt="">
      </a>
    </div>


  </div>


</div>

<script>
  AOS.init();
</script>
@endsection
