@extends('User.main')
@section('content')

<div class="main-content">

				<div class="container">
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
									Alta Marca
								</li>

								<ul class="nav navbar-right">

									<li class="dropdown current-user">
										<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
											<img src="{{asset('assets/images/User_Circle.png')}}" class="circle-img" alt="" width="42px">
											<button class="username">{{session('nameUser')}}<i class="clip-chevron-down"></i></button>

										</a>
										<ul class="dropdown-menu">

											<li>
												<a href="{{route('verPerfil')}}">
													<i class="fas fa-store"></i>
													&nbsp;Perfil
												</a>
											</li>
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
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">
						<div class="col-sm-12" id="panel-proceso">
							<!-- start: FORM WIZARD PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading	" style="padding-bottom: 10%;">

									<h3>REGISTRO DE MARCAS<br>
	                 <small>Da de alta las marcas registradas con las que cuentas</small></h3>
								</div>
								<div class="panel-body proceso">
									<form action="{{ route('marca') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form" class="row">
									  {!! csrf_field() !!}
									  <h4>Información general de marca</h4>
									  <hr width="100%" color="black"/>

									  <div class="form-group col-sm-6">
									    <label class="">
									      Nombre de Marca<span class="symbol required"></span>
									    </label>
									    <input required type="text" required class="form-control" id="nombre_marca" name="nombre_marca" placeholder="">
									  </div>
									  <div class="form-group col-sm-6">
									    <label class="">
									      Comprobante de registro de marca<span class="symbol required"></span>
									    </label>
									    <input required type="file" class="form-control" accept="application/pdf" id="registro_marca" name="registro_marca" placeholder="">
									  </div>


									  <div class="form-group col-sm-6">
									    <input type="submit" name="enviar" value="Registrar">
									  </div>
									</form>

								</div>
							</div>
							<!-- end: FORM WIZARD PANEL -->
						</div>
					</div>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>
<script src="{{asset('js/validar.js')}}">  </script>


@endsection
