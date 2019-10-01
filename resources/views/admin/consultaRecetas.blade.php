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
                        Mi Contenido
                    </li>
                    <!-- <li class="search-box">
									<form class="sidebar-search">
										<div class="form-group">
											<input type="text" placeholder="Buscar...">
											<button class="submit">
												<i class="clip-search-3"></i>
											</button>
										</div>
									</form>
								</li> -->
								<ul class="nav navbar-right">

									<li class="dropdown current-user">
										<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
											<img src="{{asset('assets/images/User_Circle.png')}}" class="circle-img" alt="" width="42px">
											<button class="username">{{session('nameUser')}}<i class="clip-chevron-down"></i></button>

										</a>
										<ul class="dropdown-menu">


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
								<!-- <form class="sidebar-search principal">
									<div class="form-group">
										<input type="text" placeholder="Buscar...">
										<button class="submit" id="round">
											<i class="clip-search-3"></i>
										</button>
									</div>
								</form> -->
                </div>
                <!-- <div class="page-header">
                 <h2>Licencia de Funcionamiento y Uso de Suelo Comercial <br>
                 <small>GIROS SARE QUE NO TIENEN IMPACTO AMBIENTAL</small></h2>
							</div> -->
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>

        <!--  Tabla de consulta -->
        <div class="row">
            <div class="col-sm-12" id="panel-proceso">
                <!-- start: FORM WIZARD PANEL -->
                <div class="panel panel-default">
                    <div class="panel-heading	" style="padding-bottom: 10%;">

                        <h3>MI CONTENIDO<br>
                            <small>AQUI PUEDES ENCONTRAR EL HISTORIAL DE CONTENIDO</small></h3>

                    </div>
                    <div class="panel-body proceso">




                        <div class="row">
                            <div class="table-responsive">
                                <input type="text" name="tipoini" id="tipoini" style="display:none;"
                                    value="{{{session('tipoinicio')}}}">
                                <table id="tablerec" name="tablerec" class="table-striped dt-responsive nowrap"
                                    style="width: 100%; ">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Titulo</th>

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
<!-- <script src="{{asset('js/validar.js')}}">  </script> -->
<script src="{{asset('js/FunctionRecetas.js')}}" type="text/javascript"></script>
@endsection
