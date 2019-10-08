@extends('front.header')
@section('content')

@include('front.menu')
@include('front.encabezado')
<div class="row np">
  <div class="col-md-6">
    <h1>RECETAS</h1>
  </div>
</div>
<div class="main-content " style="padding: 5em;">

    @foreach($recetas as $item)

            <div class="card row" style="margin: 10px;">
                <div class="card-body col-md-12">

                    <div class="row">
                      <div class="col-12 col-md-12">
                        <h3 class="card-title">{{$item->titulo}}</h3>
                      </div>
                        <img class="card-img-bottom col-12 col-md-3" src="{{asset('contenido/'.$item->imagen)}}" alt="Card image cap">
                        <textarea readonly style=" resize: none; border: 0; text-align: justify;" class="card-text col-12 col-md-9">{{$item->descripcion}}</textarea>
                    </div>
                </div>
            </div>

    @endforeach
</div>

@endsection
