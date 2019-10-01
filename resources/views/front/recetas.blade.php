@extends('front.header')
@section('content')

@include('front.menu')

<div class="main-content " style="padding: 5em;">
    <h1> Recetas con productos Potosinos</h1>
    <hr>
    @foreach($recetas as $item)
        
            <div class="card" style="margin: 10px;">
                <div class="card-body">
                <h3 class="card-title">{{$item->titulo}}</h3>
                    <div class="row">
                        <img class="card-img-bottom col-4" src="{{asset('contenido/'.$item->imagen)}}" alt="Card image cap">
                        <textarea readonly style=" resize: none; border: 0;" class="card-text col-8">{{$item->descripcion}}</textarea>
                    </div>
                </div>
            </div>
        
    @endforeach
</div>

@endsection

