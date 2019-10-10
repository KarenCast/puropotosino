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
                html += '<img src=".' + data[i].foto + '" id="src_v" alt="" height="150px">';
                html += '  <p class="card-text">';
                html += '  <small class="text-muted">' + data[i].nombre_evento + '</small>';
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
