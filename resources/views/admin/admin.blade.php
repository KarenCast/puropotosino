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

                        <h3>MIS EMPRESAS<br>
                            <small>AQUI PUEDES ENCONTRAR EL HISTORIAL EMPRESAS</small></h3>

                    </div>
                    <div class="panel-body proceso">
                        <div class="form-group row vacactivas" id="vacactivas">
                            <div class="col-sm-6">
                                <label for="vac" id="etiqueta1"></label>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">

                                        <label class="switch ">
                                            <input type="checkbox" class="primary" value="0" id="activas" name="activas"
                                                onchange="getEmpresas();">
                                            <span class="slider a round"></span>
                                        </label>

                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- <div class="form-group row vacactivas" id="vacactivas">
						<div class="col-sm-6">
							<label for="vac" id="etiqueta1"></label>
						</div>
						<div class="col-sm-6">
							<ul class="list-group list-group-flush">
								<li class="list-group-item">

									 <label class="switch ">
										 <input type="checkbox" class="primary" value="0" id="activas" name="activas" onchange="getVacantes();">
										 <span class="slider a round"></span>
									 </label>

								</li>
							</ul>
						</div>
					</div> -->

                        <div class="row">
                            <div class="table-responsive">
                                <input type="text" name="tipoini" id="tipoini" style="display:none;"
                                    value="{{{session('tipoinicio')}}}">
                                <table id="tableemp" name="tableemp" class="table-striped dt-responsive nowrap"
                                    style="width: 100%; ">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th id="curp_rfc">CURP</th>
                                            <th id="nombre_rs">Nombre</th>
                                            <th id="nombre_rs">Ver</th>


                                            <!-- "ID_empresa", "RFC_camara", url_bolsa, correo_contacto, nombre_empresa,  -->
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


<div class="modal fade" id="modaleliminarvac" tabindex="-1" role="dialog" aria-labelledby="modal-lici"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white" style="margin-top:0px;">Eliminar Vacante</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="bnClose">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <!-- <div id="sendmessage"> Dado de alta exitosamente </div> -->
                        <h4><strong>¿Seguro que desea eliminar el siguiente registro?</strong></h4>
                        <div class="row" style="border-top: 1px solid #ddd;">
                            <div class="form-group col-md-12">
                                <p style="text-align: center"><strong>Vacante:</strong></p>
                                <input style="width: 100%; text-align:center;" readonly style="text-align: center"
                                    required class="inoborder" type="text" name="id_emp" id="id_emp"
                                    data-rule="required" placeholder=""
                                    data-msg="Verifica que este campo no esté vacio y contenga informción correcta" />
                                <div class="validation"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <input style="width: 100%; text-align: center" readonly style="text-align: center"
                                    required class="inoborder" type="text" name="desc_e" id="desc_e"
                                    data-rule="required" placeholder=""
                                    data-msg="Verifica que este campo no esté vacio y contenga informción correcta" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <button style="text-align: center; width: 100%;" type="submit"
                            class="btn btn-primary btn-lg btn-block login-btn">Aceptar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaleliminarvac" tabindex="-1" role="dialog" aria-labelledby="modal-lici"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white" style="margin-top:0px;">Eliminar Vacante</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="bnClose">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <!-- <div id="sendmessage"> Dado de alta exitosamente </div> -->
                        <h4><strong>¿Seguro que desea eliminar el siguiente registro?</strong></h4>
                        <div class="row" style="border-top: 1px solid #ddd;">
                            <div class="form-group col-md-12">
                                <p style="text-align: center"><strong>Vacante:</strong></p>
                                <input style="width: 100%; text-align:center;" readonly style="text-align: center"
                                    required class="inoborder" type="text" name="id_vac" id="id_vac"
                                    data-rule="required" placeholder=""
                                    data-msg="Verifica que este campo no esté vacio y contenga informción correcta" />
                                <div class="validation"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <input style="width: 100%; text-align: center" readonly style="text-align: center"
                                    required class="inoborder" type="text" name="desc_v" id="desc_v"
                                    data-rule="required" placeholder=""
                                    data-msg="Verifica que este campo no esté vacio y contenga informción correcta" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <button style="text-align: center; width: 100%;" type="submit"
                            class="btn btn-primary btn-lg btn-block login-btn">Aceptar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalreactivavac" tabindex="-1" role="dialog" aria-labelledby="modal-lici"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white" style="margin-top:0px;">Reactivar Vacante</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="bnClose">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <!-- <div id="sendmessage"> Dado de alta exitosamente </div> -->
                        <h4><strong>Vacante</strong></h4>
                        <div class="row" style="border-top: 1px solid #ddd;">
                            <div class="form-group col-md-6">

                                <input style="width: 100%; text-align:center;" readonly style="text-align: center"
                                    required class="inoborder" type="text" name="id_vacr" id="id_vacr"
                                    data-rule="required" placeholder=""
                                    data-msg="Verifica que este campo no esté vacio y contenga informción correcta" />
                                <div class="validation"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <input style="width: 100%; text-align: center" readonly style="text-align: center"
                                    required class="inoborder" type="text" name="desc_vr" id="desc_vr"
                                    data-rule="required" placeholder=""
                                    data-msg="Verifica que este campo no esté vacio y contenga informción correcta" />
                                <div class="validation"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <p style="text-align: center"><strong>Nueva fecha de inicio:</strong></p>
                                <input style="width: 100%; text-align: center" style="text-align: center" required
                                    class="" type="date" name="fechair" id="fechair" data-rule="required" placeholder=""
                                    data-msg="Verifica que este campo no esté vacio y contenga informción correcta"
                                    onchange="validarFechaA();" />
                                <div class="validation"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <p style="text-align: center"><strong>Nueva fecha de expiración:</strong></p>
                                <input style="width: 100%; text-align: center" style="text-align: center" required
                                    class="" type="date" name="fechafr" id="fechafr" data-rule="required" placeholder=""
                                    data-msg="Verifica que este campo no esté vacio y contenga informción correcta"
                                    onchange="validarMayorA();" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <button style="text-align: center; width: 100%;" type="submit"
                            class="btn btn-primary btn-lg btn-block login-btn">Aceptar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- <script src="{{asset('js/validar.js')}}">  </script> -->
<script src="{{asset('js/FunctionEmpresas.js')}}" type="text/javascript"></script>
@endsection