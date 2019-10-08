@extends('front.header')
@section('content')

@include('front.menu')
@include('front.encabezado')
<style media="screen">
*, *::before, *::after{
-moz-box-sizing: border-box;
     box-sizing: border-box;

-webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
}

html, body{
margin: 0px;
padding: 0px;
font-family: 'Lato',sans-serif;
font-size: 18px;
font-weight: 300;
height: 100%;
}

.container{
width: 1024px;
max-width: 100%;
margin: auto;
display: block;
text-align: center;
}

.hero{
width: 100%;
height: 40%;
background: #3498db;
display: table;
}



figure{
width: 400px;
height: 300px;
overflow: hidden;
position: relative;
display: inline-block;
vertical-align: top;
border: 5px solid #fff;
box-shadow: 0 0 5px #ddd;
margin: 1em;
}

figcaption{
position: absolute;
left: 0; right: 0;
top: 0; bottom: 0;
text-align: center;
font-weight: bold;
width: 100%;
height: 100%;
display: table;
}

figcaption div{
    padding-top: 45px;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    position: absolute;
    display: table-cell;
    vertical-align: middle;

opacity: 0;
color: #2c3e50;
text-transform: uppercase;
}

a#spe {
  position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 100%;
}

figcaption div:after{
position: absolute;
content: "";
left: 0; right: 0;
bottom: 40%;
text-align: center;
margin: auto;
width: 0%;
height: 0px;
background: #2c3e50;
}

figure img{
-webkit-transition: all 0.5s linear;
        transition: all 0.5s linear;
-webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
}

figure:hover figcaption{
background: rgba(255, 255, 255, 0.74);
}

figcaption:hover div{
opacity: 1;
top: 0;
}

figure:hover figcaption div{
  opacity: 1;
  top: 0;
}

figcaption:hover div:after{
width: 50%;
}

figure:hover img{
-webkit-transform: scale3d(1.2, 1.2, 1);
        transform: scale3d(1.2, 1.2, 1);
}



figure img{
  width: 100%;
  height: auto;
  max-height: 220px;
}


figure#video{
width: 100%;
height: auto;
overflow: hidden;
position: relative;
display: inline-block;
vertical-align: top;
border: 5px solid #fff;
box-shadow: 0 0 5px #ddd;
margin: 1em;
}


/*font-face*/
@font-face {
font-family: 'Lato';
font-style: normal;
font-weight: 100;
src: local('Lato Hairline'), local('Lato-Hairline'), url(http://themes.googleusercontent.com/static/fonts/lato/v6/boeCNmOCCh-EWFLSfVffDg.woff) format('woff');
}

@font-face {
font-family: 'Lato';
font-style: normal;
font-weight: 300;
src: local('Lato Light'), local('Lato-Light'), url(http://themes.googleusercontent.com/static/fonts/lato/v6/KT3KS9Aol4WfR6Vas8kNcg.woff) format('woff');
}
@font-face {
font-family: 'Lato';
font-style: normal;
font-weight: 400;
src: local('Lato Regular'), local('Lato-Regular'), url(http://themes.googleusercontent.com/static/fonts/lato/v6/9k-RPmcnxYEPm8CNFsH2gg.woff) format('woff');
}

@font-face {
font-family: 'Lato';
font-style: normal;
font-weight: 700;
src: local('Lato Bold'), local('Lato-Bold'), url(http://themes.googleusercontent.com/static/fonts/lato/v6/wkfQbvfT_02e2IWO3yYueQ.woff) format('woff');
}

</style>


<div class="row np">
  <div class="col-md-6">
    <h1>TESTIMONIOS</h1>
  </div>
</div>

<div class="row seccion carrusel">
  <div class="col-md-12">
    <h3>Galeria</h3>
  </div>
  <div class="col-md-12">
    <div class="slide-carousel">

      @foreach($contenido as $rol)

      <figure >

          <img src="{{asset('contenido')}}/{{$rol->imagen}}" id="src_v" alt="" height="150px">
          <figcaption>
            <div>
              <textarea style="background-color: rgba(194, 194, 194, 0); border: none; text-align: center; min-width: 100%; resize: none; overflow: hidden; ">{{$rol->descripcion}}</textarea>
            </div>
          </figcation>
      </figure>

    @endforeach


    </div>
  </div>
</div>

<div class="row seccion galvideos">
  <div class="col-md-12">
    <h3>Videos Relacionados</h3>
  </div>

  @foreach($contenido2 as $rol2)
  <input type="text" name="" id="vid" value="{{$rol2->descripcion}}" style="display: none;">
  <div class="col-md-3">
  <figure id="video">

          <img src="{{asset('contenido/')}}/{{$rol2->imagen}}" alt="" height="150px">

          <figcaption>
              <a href="#" class="thumbnail" data-toggle="modal" onclick="Mostrar(mimodal);" id="spe">
            <div>
              <h2><i class="fas fa-play"></i></h2>
              <p style="text-align: center">{{$rol2->titulo}}</p>
            </div>
            </a>
          </figcation>

  </figure>

  </div>
  @endforeach
  </div>

<div id="mimodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="modal-content">
            <div class="modal-body" id="modal-info">
                <iframe width="100%" height="400px" id="videoy" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
var n;
if (screen.width < 900)
  n=1;
else
  n=3;

$('.slide-carousel').slick({
// dots: true,
// infinite: true,
// slidesToScroll: 1,
// variableWidth: true,
// speed: 1000,
// autoplaySpeed: 4000
slidesToShow: n,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
});
</script>
<script>
  function Mostrar(x) {
    var n=document.getElementById("vid").value;
    console.log(n);
    document.getElementById("videoy").src = n;
    $(x).modal('show');
  }
</script>

<script type="text/javascript">

  $(document).ready(function(){

    ScrollReveal().reveal('.q1', { delay: 50 });
    ScrollReveal().reveal('.q2', { delay: 100 });
    ScrollReveal().reveal('.q3', { delay: 150 });
    ScrollReveal().reveal('.q4', { delay: 200 });

  });

</script>
@endsection
