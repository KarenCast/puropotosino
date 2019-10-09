@extends('front.header')
@section('content')

@include('front.menu')
@include('front.encabezado')

<div class="row np">
  <div class="col-md-6">
    <h1>ESTABLECIMIENTOS</h1>
  </div>
</div>
<div class="row" id="prox">
  <div class="col-md-4 col-6" data-aos="zoom-in">
    <a href="#">
      <img src="{{asset('images/sidep.jpg')}}" alt="">
    </a>
  </div>
  <div class="col-md-4 col-6" data-aos="zoom-in">
    <a href="#">
      <img src="{{asset('images/sidep.jpg')}}" alt="">
    </a>
  </div>
  <div class="col-md-4 col-6" data-aos="zoom-in">
    <a href="#">
      <img src="{{asset('images/sidep.jpg')}}" alt="">
    </a>
  </div>

</div>

<div class="row" id="prox"  >
  <div class="col-md-4 col-6" data-aos="zoom-in">
    <a href="#"></a>
      <img src="{{asset('images/sidep.jpg')}}" alt="">
  </div>
  <div class="col-md-4 col-6" data-aos="zoom-in">
    <a href="#">
      <img src="{{asset('images/sidep.jpg')}}" alt="">
    </a>
  </div>
  <div class="col-md-4 col-6" data-aos="zoom-in">
    <a href="#">
      <img src="{{asset('images/sidep.jpg')}}" alt="">
    </a>
  </div>

</div>

<div class="row" id="prox"  >
  <div class="col-md-4 col-6" data-aos="zoom-in">
    <a href="#">
      <img src="{{asset('images/sidep.jpg')}}" alt="">
    </a>
  </div>
  <div class="col-md-4 col-6" data-aos="zoom-in">
    <a href="#">
      <img src="{{asset('images/sidep.jpg')}}" alt="">
    </a>
  </div>
  <div class="col-md-4 col-6" data-aos="zoom-in">
    <a href="#">
      <img src="{{asset('images/sidep.jpg')}}" alt="">
    </a>
  </div>

</div>


<script>
  AOS.init();
</script>
@endsection
