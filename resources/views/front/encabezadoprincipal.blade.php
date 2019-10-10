<div id="div" >
          <h1 class="q1" data-aos="fade-up">PURO POTOSINO</h1>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
  $(document).ready(function() {

    var contenedor = $('#div');
    var tiempo = 5000;
    contenedor.css({'background-image':'url(./images/arton152.jpg)'});

    function image(){
      setTimeout(function() {
      contenedor.fadeTo('slow', 0.6, function() {
      $(this).css({'background-image':'url(./images/slp.jpg)'});
      otra_imagen();}).fadeTo('slow', 1); },tiempo);
    }

    function otra_imagen(){
      setTimeout(function() {
      contenedor.fadeTo('slow', 0.6, function() {
        $(this).css({'background-image':'url(./images/arton152.jpg)'});
        otra_img();
      }).fadeTo('slow', 1); },tiempo);
    }

  function otra_img(){
    setTimeout(function() {
    contenedor.fadeTo('slow', 0.6, function() {
      $(this).css({'background-image':'url(./images/slp.jpg)'});
      image();
    }).fadeTo('slow', 1); },tiempo);
  }

otra_imagen();

});
</script>
