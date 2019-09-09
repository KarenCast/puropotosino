<div id="div">
          <h1 class="q1">PURO POTOSINO</h1>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
  $(document).ready(function() {

    var contenedor = $('#div');
    var tiempo = 5000;
    contenedor.css({'background-image':'url(http://puropotosino.sanluis.gob.mx/ant/wp-content/uploads/2018/03/arton152.jpg)'});

    function image(){
      setTimeout(function() {
      contenedor.fadeTo('slow', 0.6, function() {
      $(this).css({'background-image':'url(http://puropotosino.sanluis.gob.mx/ant/wp-content/uploads/2018/03/hoteles-en-san-luis-potosi-belleza-ruta-virreinal.jpg)'});
      otra_imagen();}).fadeTo('slow', 1); },tiempo);
    }

    function otra_imagen(){
      setTimeout(function() {
      contenedor.fadeTo('slow', 0.6, function() {
        $(this).css({'background-image':'url(http://puropotosino.sanluis.gob.mx/ant/wp-content/uploads/2018/03/centro-historico-san-luis-potosi.jpg)'});
        otra_img();
      }).fadeTo('slow', 1); },tiempo);
    }

  function otra_img(){
    setTimeout(function() {
    contenedor.fadeTo('slow', 0.6, function() {
      $(this).css({'background-image':'url(http://puropotosino.sanluis.gob.mx/ant/wp-content/uploads/2018/03/arton152.jpg)'});
      image();
    }).fadeTo('slow', 1); },tiempo);
  }

otra_imagen();

});
</script>
