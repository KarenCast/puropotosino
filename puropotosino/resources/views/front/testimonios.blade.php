@extends('front.header')
@section('content')

@include('front.menu')
@include('front.encabezado')

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

        <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox">
          <figure>
              <img src="http://puropotosino.sanluis.gob.mx/ant/wp-content/uploads/2018/11/puropotosino.jpg" alt="" height="150px">
          </figure>
        </a>
        <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox">
          <figure>
              <img src="http://puropotosino.sanluis.gob.mx/ant/wp-content/uploads/2018/11/PROGRAMA-PURO-POTOSINO-18-FEBRERO..jpg" alt="" height="150px">
          </figure>
        </a>
        <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox">
          <figure>
            <img src="http://puropotosino.sanluis.gob.mx/ant/wp-content/uploads/2018/11/PURO-POTOSINO-2-1.jpg" alt="" height="150px">
          </figure>
        </a>
        <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox">
          <figure>
            <img src="http://puropotosino.sanluis.gob.mx/ant/wp-content/uploads/2018/11/exitoso-puro-potosino-exporta-en-laredo-tx-2.jpg" alt="" height="150px">

          </figure>
        </a>
        <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox">
          <figure>
            <img src="http://puropotosino.sanluis.gob.mx/ant/wp-content/uploads/2018/11/ae608cunnamed-10-1.jpg" alt="" height="150px">
          </figure>
        </a>

    </div>
  </div>
</div>

<div class="row seccion galvideos">
  <div class="col-md-12">
    <h3>Videos Relacionados</h3>
  </div>
  <div class="col-md-3 q1">
    <iframe width="82%" height="auto" src="https://www.youtube.com/embed/p_chWCfhIgw?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  <div class="col-md-3 q2">
    <iframe width="82%" height="auto" src="https://www.youtube.com/embed/p_chWCfhIgw?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  <div class="col-md-3 q3">
    <iframe width="82%" height="auto" src="https://www.youtube.com/embed/p_chWCfhIgw?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  <div class="col-md-3 q4">
    <iframe width="82%" height="auto" src="https://www.youtube.com/embed/p_chWCfhIgw?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  <div class="col-md-3 q1">
    <iframe width="82%" height="auto" src="https://www.youtube.com/embed/p_chWCfhIgw?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  <div class="col-md-3 q2">
    <iframe width="82%" height="auto" src="https://www.youtube.com/embed/p_chWCfhIgw?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  <div class="col-md-3 q3">
    <iframe width="82%" height="auto" src="https://www.youtube.com/embed/p_chWCfhIgw?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  <div class="col-md-3 q4">
    <iframe width="82%" height="auto" src="https://www.youtube.com/embed/p_chWCfhIgw?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
</div>

<div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="modal-content">
            <div class="modal-body" id="modal-info">
                <img src="" alt="" />
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
var n;
if (screen.width < 900)
  n=1;
else
  n=4;

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
  $(document).ready(function() {
    var $lightbox = $('#lightbox');

    $('[data-target="#lightbox"]').on('click', function(event) {
        var $img = $(this).find('img'),
            src = $img.attr('src'),
            alt = $img.attr('alt'),
            css = {
                'maxWidth': '100%',
                'maxHeight': '1000px'
            };

        $lightbox.find('.close').addClass('hidden');
        $lightbox.find('img').attr('src', src);
        $lightbox.find('img').attr('alt', alt);
        $lightbox.find('img').css(css);
    });

    $lightbox.on('shown.bs.modal', function (e) {
        var $img = $lightbox.find('img');

        $lightbox.find('.modal-dialog').css({'width': $img.width()});
        $lightbox.find('.close').removeClass('hidden');
    });
});
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
