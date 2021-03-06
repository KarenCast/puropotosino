document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var f = new Date();
    loadCarrusel(f.getMonth() + 1, f.getFullYear());

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid'],
        locale: 'es',
        header: {
            left: 'prev,next, today',
            center: 'title',
            right: ''
        },

        businessHours: {
            start: '10:00', // hora final
            end: '18:00', // hora inicial
            dow: [1, 2, 3, 4, 5] // dias de semana, 0=Domingo
        },
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: 'load',
        themeSystem: 'bootstrap',
        selectable: true,

        eventClick: function (info) {

            var time = new Date(info.event.start);
            var timeNow = new Date();
            var dif = (timeNow - time);

            if (dif > 0) {
                notificationWarring('Evento ya no esta disponible');
                return;
            }
            //console.log(dif);
            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
                hour12: 'true'
            };
            var fechaEvento = time.toLocaleString("es-ES", options);
            $('#nombre_evento').html(info.event.title);
            $('#fecha_evento').html(fechaEvento);
            $('#observaciones').html(info.event.extendedProps.observaciones);
            $('#requisitos').html(info.event.extendedProps.requisitos);
            $('#tema').html(info.event.extendedProps.tema);
            $('#lugar').html(info.event.extendedProps.lugar);
            $('#costo').html("$" + info.event.extendedProps.costo);
            $('#myModal').modal('toggle');
            $('#foto').attr('src', '.' + info.event.extendedProps.foto);
            $('#idEvento').val(info.event.id);
            // change the border color just for fun
            //info.el.style.borderColor = 'red';
        },
        events: loadEvents(),
        timezone: "local",
    });

    calendar.render();
    $(".fc-prev-button").click(function () {
        changeCarrusel();
    });

    $(".fc-next-button").click(function () {
        changeCarrusel();
    });

    $(".fc-today-button").click(function () {
        changeCarrusel();
    });

    (function ($) {
        "use strict";
        // Auto-scroll
        $('#myCarousel').carousel({
          interval: 5000
        });

        // Control buttons
        $('.next').click(function () {
          $('.carousel').carousel('next');
          return false;
        });
        $('.prev').click(function () {
          $('.carousel').carousel('prev');
          return false;
        });

        // On carousel scroll
        $("#myCarousel").on("slide.bs.carousel", function (e) {
          var $e = $(e.relatedTarget);
          var idx = $e.index();
          var itemsPerSlide = 3;
          var totalItems = $(".carousel-item").length;
          if (idx >= totalItems - (itemsPerSlide - 1)) {
            var it = itemsPerSlide -
                (totalItems - idx);
            for (var i = 0; i < it; i++) {
              // append slides to end
              if (e.direction == "left") {
                $(
                  ".carousel-item").eq(i).appendTo(".carousel-inner");
              } else {
                $(".carousel-item").eq(0).appendTo(".carousel-inner");
              }
            }
          }
        });
      })
      (jQuery);
});

function changeCarrusel() {
    var moment = $('.fc-center').html().replace('<h2>', '').replace('</h2>', '');
    var meses = new Array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");

    loadCarrusel(meses.indexOf(moment.split(' ')[0]) + 1, moment.split(' ')[2]);
}

function meInteresa() {
    $('#myModal').modal('hide');
    $('#loginModal').modal('toggle');
}

function loadCarrusel(mes, anio) {
    $.ajax({
        url: "./api/getEventosMes",
        async: false,
        dataType: 'json',
        data: {
            mes: mes,
            anio: anio,
        },
        method: 'post',
        success: function (data) {
            var html = "";
            for (var i = 0; i < data.length; i++) {
                if (i == 0)
                    html += '  <div class="carousel-item col-md-4 active">';
                else
                    html += '  <div class="carousel-item col-md-4">';
                html += '  <div class="card-body">';
                html += '  <div class="card">';
                html += '  <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox">';
                html += '   <img src=".' + data[i].foto + '" id="src_v" alt="" >';
                html += '  </a>';
                html += '  <p class="card-text">';
                html += '  </p>';
                html += '  </div>';
                html += '  </div>';
                html += '  </div>';
            }
            $('#carouselEvents').html(html);
        },
        error: function (e) {
            console.error(e);
        }
    });
}

function loadEvents() {
    var arrData = [];
    $.ajax({
        url: "./api/getEventos",
        async: false,
        dataType: 'json',
        method: 'get',
        success: function (data) {
            for (var i = 0; i < data.length; i++)
                arrData[i] = {
                    id: data[i]['ID_evento'],
                    observaciones: data[i]['observaciones'],
                    costo: data[i]['costo'],
                    foto: data[i]['foto'],
                    lugar: data[i]['lugar'],
                    requisitos: data[i]['requisitos'],
                    tema: data[i]['tema'],
                    title: data[i]['nombre_evento'],
                    start: data[i]['fecha_evento'],
                    backgroundColor: '#84b2db'
                }
        },
        error: function () {}
    });
    return arrData;
}

/*FUNCIONES PARA EL BOTON DE CAPACITACION */

function validarFormCapacitacion(){
    
    $("#msjExito").removeClass("mostar").addClass("ocultar");
    nombre= $("#nombre").val();
    correo= $("#correo").val();
    comentario= $("#comentario").val();

    if((nombre.trim()).length>0){
        $("#msjError").removeClass("mostrar").addClass("ocultar");
        if(validarEmail(correo)){
            $("#msjError").removeClass("mostrar").addClass("ocultar");
            if((comentario.trim()).length>0){
                $("#msjError").removeClass("mostrar").addClass("ocultar");
                bloquearForm();
                enviarComentarios();
                
            }else{
                $("#msjError").text("Debes ingresar tu comentario");
                $("#msjError").removeClass("ocultar").addClass("mostrar");
            }
            
        }else{
            $("#msjError").text("Debes ingresar un correo valido");
            $("#msjError").removeClass("ocultar").addClass("mostrar");
        }        
    }else{
        $("#msjError").text("Debes ingresar tu Nombre completo");
        $("#msjError").removeClass("ocultar").addClass("mostrar");
    }
}

 //Funcion para validar correo electronico 
 function validarEmail(valor) {var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;return regex.test(valor) ? true : false;}

 function bloquearForm(){
    document.getElementById("nombre").readOnly = true;
    document.getElementById("correo").readOnly = true;
    document.getElementById("telefono").readOnly = true;
    document.getElementById("comentario").readOnly = true;
    $("#btnCancelarModal").prop("disabled", true);
    $("#btnEnviarModal").prop("disabled", true);
    $("#msjEspera").removeClass("ocultar").addClass("mostrar");
 }

 function habilitarForm(){
    document.getElementById("nombre").readOnly = false;
    document.getElementById("correo").readOnly = false;
    document.getElementById("telefono").readOnly = false;
    document.getElementById("comentario").readOnly = false;
    $("#btnCancelarModal").prop("disabled", false);
    $("#btnEnviarModal").prop("disabled", false);
    $("#msjEspera").removeClass("mostrar").addClass("ocultar");
 }

 function enviarComentarios(){ //Funcion para enviar al controlador la info para guardar el comentario
    var formData = new FormData($('#formMsjCapacitacion')[0]);

    $.ajax({
        type:'POST',
        url:"./api/insertComentarioCapacitacion",        
        processData: false,
        contentType: false, 
        data:formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {                           
                console.log(response)
                if(response.success){
                    $("#msjError").removeClass("mostrar").addClass("ocultar");
                    habilitarForm();   
                    document.forms['formMsjCapacitacion'].reset();
                    $("#msjExito").removeClass("ocultar").addClass("mostrar");
                }else{
                    $("#msjEspera").removeClass("mostrar").addClass("ocultar");
                    $("#msjError").text("Ocurrió algo inesperado, inténtalo de nuevo");
                    $("#msjError").removeClass("ocultar").addClass("mostrar");
                    habilitarForm();
                }
        },
        statusCode: {
        404: function() {
            console.log("400");
            $("#msjEspera").removeClass("mostrar").addClass("ocultar");
            $("#msjError").text("Ocurrió algo inesperado, inténtalo de nuevo");
            $("#msjError").removeClass("ocultar").addClass("mostrar");
            habilitarForm();
               
        },
        500: function(){
            console.log("500");
            $("#msjEspera").removeClass("mostrar").addClass("ocultar");
            $("#msjError").text("Ocurrió algo inesperado, inténtalo de nuevo");
            $("#msjError").removeClass("ocultar").addClass("mostrar");
            habilitarForm();
        }

        },
        error:function(x,xs,xt){
            //nos dara el error si es que hay alguno
        // window.open(JSON.stringify(x));                    
           console.log('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
        }
    });
 }