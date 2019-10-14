@extends('front.header')
@section('content')

@include('front.menu')
@include('front.encabezado')

<style media="screen">
.navbar-light .navbar-nav .nav-link{
  color: white!important;
}
.tab-content{
	width: 100%;
}
  @media (min-width: 1200px){
  .page-template-template-productos>div>div>.container.content-wrapper{
      max-width: 2140px!important;
  }}

    .nav-tabs>li.active, .nav-tabs>li.inactive{
      background-color: #fff!important;
    }

  .nav-tabs>li.active, .nav-tabs>li.active, .nav-tabs>li.active:hover {
      color: #555;
      cursor: default;
      background-color: #ebebeb!important;
      border-top: 1px solid #d1caca!important;
      /* border-left: 1px solid #d1caca!important; */
      /* border-right: 1px solid #d1caca!important; */
      border-bottom-color: rgba(#ffffff, 0)!important;
      padding: 1%;
  }

  .nav-tabs>li, .nav-tabs>li, .nav-tabs>li {
      color: #555;
      cursor: default;
      background-color: #ffffff!important;
      border-top: 1px solid #d1caca!important;
      /* border-left: 1px solid #d1caca!important;
      border-right: 1px solid #d1caca!important; */
      border-bottom-color: rgba(#ffffff, 0)!important;
      padding: 1%;
  }

  .nav-tabs>li>a>p, .nav-tabs>li>a>p, .nav-tabs>li>a>p{
      color: rgb(54, 56, 61)!important;

      font-weight: 600;
      vertical-align: middle!important;

  }

  .nav-tabs>li>a {
    height: 90px!important;

  }

	a>img{
		text-align: center!important;
	}


.nav-tabs.nav-items{
	width: 100%;
}
  div.container {
    width: 100%!important;
  }

	div.imgp{

/* background-image: url(); */
width: 100%;
height: 400px;
background-position: center center;
background-size: cover;
background-repeat: no-repeat;
	}

	.tab-content.col-md-12{
		padding: 5%;
	}

h5{
	text-align: justify;
}

input#cate:hover{
	background-color: white;
}

.nav-items, ul.nav>a#cat {
	width: 12.5%;
}


/*  */

figure {
	padding: 0!important;
	height: 300px;
  overflow: hidden;
  position: relative;
}
figure a {
  display: block;
  overflow: hidden;
  background: black;
}
.img-effect {
	    margin-top: -10%;
  transition: 1s;
	width: 100%;
}

.img-effect.sub {
	    margin-top: 0%;
  transition: 1s;
	width: 100%;
}

figure:hover .img-effect {
  transform: scale(1.25) rotate(10deg);
  opacity: 0.5;
}
figcaption {
	padding: 5%;
  position: absolute;
	font-size: 18px;
	text-align: justify;
  top: 26px;
  left: 36px;
	right: 36px;
  color: white;
  opacity: 0;
  transition: 1s;
  transform: translateY(-50px) scale(2) rotate(-25deg);

}
figure:hover figcaption {
  opacity: 1;
  transform: translateY(0);
}



/*  */

.col-md-4>a>.img-fluid{
	height: 300px;
}

#title{
	padding: 1%;
	background-color: #f1f1f1;
}

#title>h1,#title>h3{
	text-align: center;
}

input[type="submit"]#todos:hover{
	color: white!important;
	border-color: white!important;
}
@media only screen and (max-width: 1000px) {
  .nav-items, ul.nav>a#cat {
  	width: 25%;
  }
}

@media only screen and (max-width: 691px) {
  .nav-items, ul.nav>a#cat {
  	width: 50%;
  }
}



</style>



<!-- <div class="container"> -->

  <div class="col-md-12">
    <ul class="nav nav-tabs nav-center" role="tablist">

      <p style="display: none">{{$i = 0}}</p>
    @foreach($categoria as $rol)

        	@if($i==0)

      		<li class="nav-items" id="{{$rol->ID_categoria}}">
            <a data-toggle="tab" id="cat" href="#me{{$rol->ID_categoria}}" onclick="agregar({{$rol->ID_categoria}})">
      	  @else

       		<li class="nav-items" id="{{$rol->ID_categoria}}">
            <a data-toggle="tab" id="cat" href="#me{{$rol->ID_categoria}}" onclick="agregar({{$rol->ID_categoria}})">
          @endif

              <img src="{{asset('categorias')}}/{{$nombre[$i]}}/{{$rol->titulo}}"/>
			       </a>
          </li>
          <p style="display: none">{{$i++}}</p>

      @endforeach
    </ul>
</div>


  <!-- Tab panes -->
  <div class="tab-content col-md-12">
    <p style="display: none">{{$j = 0}}</p>
		@foreach($categoria as $rol)

      @if($j==0)
				<div id="me{{$rol->ID_categoria}}" class="tab-pane fade in active show" style="padding-left: 5%; padding-right: 5%">
      @else
        <div id="me{{$rol->ID_categoria}}" class="tab-pane fade in show" style="padding-left: 5%; padding-right: 5%">
      @endif

			       <div class='col-md-12' id='title'>
										<h1>{{$rol->nombre}}</h1>
						 </div>

							    <figure class="col-md-12 col-md-3 m-0">
							      <a href="">
											<img class="img-fluid img-effect" src="{{asset('categorias')}}/{{$nombre[$j]}}/{{$rol->imagen}}" alt="">
							      </a>
							      <figcaption>
                      {{$rol->descripcion}}

				            </figcaption>
							    </figure>

            <p style="display: none">{{$j++}}</p>

            <p style="display: none">{{$k = 0}}</p>


            @foreach ($subcat as $rol2)

              @if($rol2->ID_categoria == $rol->ID_categoria)
                <p style="display:none">{{$i = 0}}</p>
                @if($i == 0)
                <div class='col-md-12' id='title'>
                     <h3>Sub-Categorías</h3>
                </div>
                @endif
  										<figure class="col-md-4 p-2">
  											<a href="">
  												<img class="img-fluid img-effect sub" src="{{asset('subcategorias')}}/{{$nombres[$k]}}/{{$rol2->imagen}}" alt="">
  											</a>
  											<figcaption><h1 style="color: white;">{{$rol2->nombre}}</h1><br>
    										</figcaption>
  										</figure>
                      <p style="display:none">{{$i++}}</p>

  							@endif
                <p style="display: none">{{$k++}}</p>
            @endforeach
            </div>
	@endforeach


  </div>





  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function agregar(n){
      element2.classList.add("inactive");
			var element2 = document.getElementById(n);
	  	element2.classList.add("active");


		}
	</script>
@endsection
