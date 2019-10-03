@extends('front.header')
@section('content')

@include('front.menu')
@if(session('Error')!== null)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Error!</strong> {{{session('Error')}}}
</div>
@endif
@if(session('Exito')!== null)
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Exito!</strong> {{{session('Exito')}}}
</div>
@endif
<div id="calendar" style="padding: 11em;"></div>


<div class="modal fade right" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false" data-backdrop="false">
    <div class="modal-dialog modal-lg modal-full-height modal-dialog-centered modal-right modal-notify modal-info" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <i class="fas fa-calendar-day fa-2x mb-3 animated rotateIn"></i>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="row">
                    <img class="card-img-bottom col-8" src="" id="foto" alt="Card image cap">
                    <div class="text-center col-4">

                        <h2 class="text-center"><strong id="nombre_evento"></strong></h2>
                        <hr>
                        <p class="text-center">Fecha/Hora: <strong id="fecha_evento"></strong></p>
                        <p class="text-center">Observaciones: <strong id="observaciones"></strong></p>
                        <p class="text-center">Requisitos: <strong id="requisitos"></strong></p>
                        <p class="text-center">Tema: <strong id="tema"></strong></p>
                        <p class="text-center">Costo: <strong id="costo"></strong></p>
                    </div>
                </div>

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
                <h3>Registro a evento</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form" action="{{route('RegistroEvento')}}" role="form" autocomplete="off" id="formLogin"
                    method="POST">
                    @csrf
                    {{ csrf_field() }}
                    <input type="hidden" id="idEvento" name="idEvento">
                    <div class="form-group">
                        <label for="uname1">Correo</label>
                        <input type="email" class="form-control form-control-lg" name="correo" required="true">
                        <div class="invalid-feedback">Campo necesario.</div>
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control form-control-lg" name="contrasena" required="true"
                            autocomplete="new-password">
                        <div class="invalid-feedback">Campo necesario</div>
                    </div>

                    <div class="form-group py-4">
                        <button class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                            aria-hidden="true">Cancelar</button>
                        <button type="submit" class="btn btn-success btn-lg float-right"
                            id="btnLogin">Registrarse</button>
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
                $('#foto').attr('src', info.event.extendedProps.foto);
                $('#idEvento').val(info.event.id);
                // change the border color just for fun
                //info.el.style.borderColor = 'red';
            },
            events: loadEvents(),
            timezone: "local",
        });

        calendar.render();
    });

    function meInteresa() {


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
                        foto: data[i]['foto'],
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


<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/AmaranJS/css/amaran.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/AmaranJS/css/animate.min.css')}}" />
<script src="{{asset('assets/plugins/AmaranJS/js/jquery.amaran.js')}}"></script>
<script src="{{asset('js/notifications.js')}}"></script>
<link href="{{asset('assets/plugins/core/main.css')}}" rel='stylesheet' />
<link href="{{asset('assets/plugins/daygrid/main.css')}}" rel='stylesheet' />
<script src="{{asset('assets/plugins/core/main.js')}}"></script>
<script src="{{asset('assets/plugins/interaction/main.js')}}"> </script>
<script src="{{asset('assets/plugins/daygrid/main.js')}}"></script>

@endsection
