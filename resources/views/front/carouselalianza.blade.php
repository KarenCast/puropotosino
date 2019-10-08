
<header>

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

</header>

<style>

  .slide-carousel figure {
    position: relative;
    outline: 0;
  }

  .slide-carousel figure:after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* background-color: rgba(0, 0, 0, 0.4); */
    z-index: 1;
    transition: background-color .5s ease;
  }

  .slide-carousel figure:hover:after {
    /* background-color: rgba(0, 0, 0, 0.2); */
  }

  .slick-dots li button:before,
  .slick-dots li.slick-active button:before {
    color: #000;
  }

  .slick-prev:before, .slick-next:before{
    color: rgba(83, 87, 86, 0.52)
  }

</style>

  <div class="container" id="carousel1">
    <div class="slide-carousel">

      <a href="#">
        <figure>

            <img src="" alt="" height="150px">

        </figure>
      </a>

    </div>
  </div>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
  var n;
  if (screen.width < 900)
    n=1;
  else
    n=3;

  $('.slide-carousel').slick({
    slidesToShow: n,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
  });

</script>
