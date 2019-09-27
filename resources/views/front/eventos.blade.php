@extends('front.header')
@section('content')

@include('front.menu')

<div id="calendar" style="padding: 11em;"></div>


<div class="modal fade right" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Evento</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-calendar-day fa-2x mb-3 animated rotateIn"> <strong
                            id="nombre_evento"></strong></i>
                </div>
                <hr>
                <p class="text-center">Fecha/Hora: <strong id="fecha_evento"></strong></p>
                <p class="text-center">Observaciones: <strong id="observaciones"></strong></p>
                <p class="text-center">Requisitos: <strong id="requisitos"></strong></p>
                <p class="text-center">Tema: <strong id="tema"></strong></p>
                <p class="text-center">Costo: <strong id="costo"></strong></p>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cerrar</a>
                <a type="button" class="btn btn-outline-primary waves-effect" onClick="meInteresa();">Me interesa</a>
            </div>
        </div>
    </div>
</div>

<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Login</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                    <div class="form-group">
                        <label for="uname1">Correo</label>
                        <input type="email" class="form-control form-control-lg" name="uname1" id="uname1" required="">
                        <div class="invalid-feedback">Campo necesario.</div>
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control form-control-lg" id="pwd1" required="" autocomplete="new-password">
                        <div class="invalid-feedback">Campo necesario</div>
                    </div>
                   
                    <div class="form-group py-4">
                        <button class="btn btn-outline-secondary btn-lg" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                        <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<head>
    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid'],
            locale: 'es',
            header: {
                left: 'prevYear,prev,next,nextYear today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek,dayGridDay'
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
            eventClick: function(info) {
                $('#nombre_evento').html(info.event.title);

                $('#fecha_evento').html(info.event.start);
                $('#observaciones').html(info.event.extendedProps.observaciones);
                $('#requisitos').html(info.event.extendedProps.requisitos);
                $('#tema').html(info.event.extendedProps.tema);
                $('#costo').html("$" + info.event.extendedProps.costo);

                $('#myModal').modal('toggle');

                // change the border color just for fun
                //info.el.style.borderColor = 'red';
            },
            events: loadEvents(),
            timezone: "local",
        });

        calendar.render();
    });

    function meInteresa(){
        $('#myModal').modal('hide');
        $('#loginModal').modal('toggle');
    }

    function loadEvents() {
        var arrData = [];
        $.ajax({
            url: "./api/getEventos",
            async: false,
            dataType: 'json',
            method: 'get',
            success: function(data) {
               
                for (var i = 0; i < data.length; i++)
                
                    arrData[i] = {
                        id: data[i]['ID_evento'],
                        observaciones: data[i]['observaciones'],
                        costo: data[i]['costo'],
                        requisitos: data[i]['requisitos'],
                        tema: data[i]['tema'],
                        title: data[i]['nombre_evento'],
                        start: data[i]['fecha_evento'],
                        //end: '2019-08-18T19:00:00',
                        backgroundColor: '#84b2db'
                    }
                // console.log(data);
            },
            error: function() {
                console.error('error');
            }
        });
        return arrData;
    }
    </script>
</head>


<link href="{{asset('assets/plugins/core/main.css')}}" rel='stylesheet' />
<link href="{{asset('assets/plugins/daygrid/main.css')}}" rel='stylesheet' />
<script src="{{asset('assets/plugins/core/main.js')}}"></script>
<script src="{{asset('assets/plugins/interaction/main.js')}}"> </script>
<script src="{{asset('assets/plugins/daygrid/main.js')}}"></script>

@endsection