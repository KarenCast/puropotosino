@extends('admin.main')
@section('content')



<div class="main-content">

    <!-- end: SPANEL CONFIGURATION MODAL FORM -->
    <div class="container">
        @if(session('Error')!== null)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Error!</strong> {{{session('Error')}}}
        </div>
        @endif
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12" id="panel-head">

                <!-- start: PAGE TITLE & BREADCRUMB -->
                <ol class="breadcrumb">
                    <li>
                        <i class="clip-cog-2"></i>
                        <a href="#">
                            SIDEP
                        </a>
                    </li>

                    <li class="active">
                        Mis Empresas
                    </li>
                    <ul class="nav navbar-right">

                        <li class="dropdown current-user">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle"
                                data-close-others="true" href="#">
                                <img src="{{asset('assets/images/User_Circle.png')}}" class="circle-img" alt=""
                                    width="42px">
                                <button class="username">{{session('nameUser')}}<i
                                        class="clip-chevron-down"></i></button>

                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{url('/VentanillaUnica/PerfilUsuario')}}">
                                        <i class="clip-user-2"></i>
                                        &nbsp;Perfil
                                    </a>
                                </li>
                                <li class="divider"></li>

                                <li>
                                    <a href="{{url('/LogOut')}}">
                                        <i class="clip-exit"></i>
                                        &nbsp;Cerrar Sesión
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </ol>
                <div class="page-header">
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>

        <!--  Tabla de consulta -->
        <div class="row">
            <div class="col-sm-12" id="panel-proceso">
                <!-- start: FORM WIZARD PANEL -->
                <div class="panel panel-default">
                    <div class="panel-heading	" style="padding-bottom: 10%;">
                        <h3>MIS Eventos<br>
                            <small>AQUI PUEDES ENCONTRAR TODOS LOS EVENTOS</small></h3>
                    </div>
                    <div class="panel-body proceso">
                        <div class="form-group row vacactivas" id="vacactivas">
                            <div class="col-sm-6">
                                <label for="vac" id="etiqueta1"></label>
                            </div>
                            <div class="col-sm-6">
                                <div class="col" style="text-align:right;">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-secondary" href="" data-toggle="modal"
                                            data-target="#ModalAddNew" id="btnNuevo" role="button">Nuevo</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="table-responsive">
                                <input type="text" name="tipoini" id="tipoini" style="display:none;"
                                    value="{{{session('tipoinicio')}}}">
                                <table id="DTEventos" name="DTEventos"
                                    class="table-hover table-condensed table-responsive table-striped dt-responsive nowrap"
                                    style="width: 100%; ">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Fecha</th>
                                            <th>Nombre</th>
                                            <th>Costo</th>
                                            <th>Tema</th>
                                            <th>Observaciones</th>
                                            <th>Requisitos</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: FORM WIZARD PANEL -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalAddNew" tabindex="-1" role="dialog" aria-labelledby="AgregarNuevo" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AgregarNuevo">Nuevo Evento
                </h5>
                <button type="button" style="color: #999;" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="BodyModalContent">

                    <form class="form-horizontal" method="post" id="eventoSave" action="{{route('saveEvento')}}"
                            enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="ID_eventoE" id="ID_evento" value="0">
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="hora_inicio" class="col-sm-12 control-label">Fecha/Hora</label>
                                <div class="col-sm-12">
                                    <input type="text" id="fecha_evento" readonly name="fecha_evento"
                                        class="form-control" required>
                                    <script type="text/javascript">
                                    var today, datepicker;
                                    today = new Date();
                                    $('#fecha_evento').datetimepicker({

                                        startDate: new Date(),
                                        autoclose: true,
                                    });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="nombre_evento">Nombre del Evento</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nombre_evento" name="nombre_evento">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="costo">Costo</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="costo"
                                    onkeypress="return soloNumeros(event)" name="costo">
                                <p>maximo 10,000</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="tema">Tema</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="tema" name="tema">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="observaciones">Observaciones</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="observaciones" name="observaciones">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="requisitos">Requisitos</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="requisitos" name="requisitos">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="foto">Fotografia</label>
                            <div class="col-sm-12">
                                <img id="blah" src="" alt="foto de evento"  style="max-width: -moz-available;" />
                                <input type='file' class="form-control" accept="image/*" id="foto" name="fotoE" />                               
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="col-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="myModalLabel">Confirmar</h2>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <i class="title"></i>
                <a>¿Desea continuar?</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger btn-ok">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/FunctionsEventos.js')}}" type="text/javascript"></script>

<style>
.modal.loading .modal-content:before {
    content: 'Cargando...';
    text-align: center;
    line-height: 155px;
    font-size: 20px;
    background: rgba(0, 0, 0, .8);
    position: absolute;
    top: 55px;
    bottom: 0;
    left: 0;
    right: 0;
    color: #EEE;
    z-index: 1000;
}
</style>
<!-- <script src="{{asset('js/validar.js')}}">  </script> 
<script src="{{asset('js/FunctionEmpresas.js')}}" type="text/javascript"></script> -->
@endsection