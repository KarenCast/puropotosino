@extends('User.main')
@section('content')

<div class="main-content">

				<div class="container">
          @if(session('Error')!== null)
          <div class="alert alert-danger alert-dismissible show" role="alert">
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
									ESTATUS
								</li>

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
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">
						<div class="col-sm-12" id="panel-proceso">
							<!-- start: FORM WIZARD PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading	" style="padding-bottom: 10%;">

									<h3>REGISTRO<br>
	                 <small>Registrate para ser parte de SIDEP</small></h3>
								</div>
								<div class="panel-body proceso">


									<div class="smart-wizard form-horizontal" id="form">

										<div id="wizard" class="swMain">
                      <ul>
												<li>
												@if(($emp->fase>=0 && $emp->fase<=9) || $emp->fase>=10)
													<a href="#step-0" class="selected" isdone="1" rel="1">
												@else
													<a href="#step-0" class="">
												@endif
														<div class="stepNumber">
															<p><strong>0</strong></p>
														</div>
														<span class="stepDesc">

															<small>Pre-registro</small> </span>
													</a>
												</li>
												<li>
												@if(($emp->fase>=1 && $emp->fase<=9) || $emp->fase>=11)
													<a href="#step-1" class="selected" isdone="1" rel="1">
												@else
													<a href="#step-1" class="">
												@endif
														<div class="stepNumber">
															<p><strong>1</strong></p>
														</div>
														<span class="stepDesc">
															<small>Idea de negocio</small> </span>
													</a>
												</li>
												<li>
													@if(($emp->fase>=2 && $emp->fase<=9) || $emp->fase>=12)
														<a href="#step-2" class="selected" isdone="1" rel="1">
													@else
														<a href="#step-2" class="">
													@endif
														<div class="stepNumber">
																<p><strong>2</strong></p>
														</div>
														<span class="stepDesc">

															<small>Proceso de incubacion</small> </span>
													</a>
												</li>
												<li>
													@if(($emp->fase>=3 && $emp->fase<=9) || $emp->fase>=13)
														<a href="#step-3" class="selected" isdone="1" rel="1">
													@else
														<a href="#step-3" class="">
													@endif
														<div class="stepNumber">
																<p><strong>3</strong></p>
														</div>
														<span class="stepDesc">

															<small>Dar de alta en SHCP</small> </span>
													</a>
												</li>
												<li>
													@if(($emp->fase>=4 && $emp->fase<=9) || $emp->fase>=14)
														<a href="#step-4" class="selected" isdone="1" rel="1">
													@else
														<a href="#step-4" class="">
													@endif
														<div class="stepNumber">
																<p><strong>4</strong></p>
														</div>
														<span class="stepDesc">

															<small>Comercializa</small> </span>
													</a>
												</li>
												<li>
													@if(($emp->fase>=5 && $emp->fase<=9) || $emp->fase>=15)
														<a href="#step-5" class="selected" isdone="1" rel="1">
													@else
														<a href="#step-5" class="">
													@endif
														<div class="stepNumber">
																<p><strong>5</strong></p>
														</div>
														<span class="stepDesc">

															<small>Exporta y promocionate</small> </span>
													</a>
												</li>
												<li>
													@if(($emp->fase>=6 && $emp->fase<=9) || $emp->fase>=16)
														<a href="#step-6" class="selected" isdone="1" rel="1">
													@else
														<a href="#step-6" class="">
													@endif
														<div class="stepNumber">
																<p><strong>5</strong></p>
														</div>
														<span class="stepDesc">

															<small>Evoluciona tú negocio</small> </span>
													</a>
												</li>


											</ul>
											<!-- <div class="progress progress-striped active progress-sm">
												<div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar progress-bar-success step-bar">
													<span class="sr-only"> 0% Complete (success)</span>
												</div>
											</div> -->
											@if($emp->fase=='0')
											<div class="row justify-content-center" id="step-0" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-0"  style="display: none;">
											@endif
												<h1>Etapa 0</h1>
												<p>Si continuas en etapa 0 es porque tú documentación inicial es incorrecta, (revisa información de perfil)
													o no respondiste el correo de registro.</p>
												<div class="col-md-12">
													<form action="{{ route('etapacero') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form">
														 {!! csrf_field() !!}
														<div class="form-group col-sm-6">
															<input type="mail" name="correo" id="correo" value="">
															<input type="submit" name="enviar" value="Guardar">
														</div>
													</form>
												</div>

											</div>

											@if($emp->fase==1)
											<div class="row justify-content-center" id="step-1" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-1"  style="display: none;">
											@endif
												<h1>Etapa 1</h1>
												<form action="{{ route('etapauno') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form">
													 {!! csrf_field() !!}
													<label for="">Describe tu idea de negocio</label><span class="symbol required"></span>
													<textarea class="form-control" required  name="ideanegocio" rows="10" cols="80" id="ideanegocio"></textarea>
													<div class="form-group col-sm-6">
												    <input type="submit" name="enviar" value="Guardar">
												  </div>
												</form>

											</div>
											@if($emp->fase=='2')
											<div class="row justify-content-center" id="step-2" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-2"  style="display: none;">
											@endif
											<h1>Etapa 2</h1>
											<form action="{{ route('etapados') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form">
												 {!! csrf_field() !!}
												<div class="form-group col-sm-12">
											    <label class="">
											    Comprobante de programa de incubación (Archivo .pdf)
											    </label><br>

											    <input type="file" name="incubacion" required id="incubacion" class="form-control" accept="application/pdf"><br>
												</div>

											  <div class="form-group col-sm-6" id="tipo_incu">
											    <label class="">
											      ¿Tipo de incubación?<span class="symbol required"></span>
											    </label>
											    <input type="text" required class="form-control" id="tipoincu" name="tipoincu" placeholder="">
											  </div>

												<div class="form-group col-sm-6">
													<label for=""></label>
													<br>
													<input type="submit" name="enviar" value="Guardar">
												</div>
											</form>


											</div>
											@if($emp->fase=='3')
											<div class="row justify-content-center" id="step-3" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-3"  style="display: none;">
											@endif
											<h1>Etapa 3</h1>

											<form action="{{ route('etapatres') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form">
												 {!! csrf_field() !!}
												<div class="form-group col-sm-12">
													<label class="">
														Alta hacienda (Archivo .pdf)<span class="symbol required"></span>
													</label>
												    <input type="file" required name="hacienda" id="hacienda" class="form-control" accept="application/pdf"><br>
												</div>
												@if(session('tipo')=='fisica')
												<div class="form-group col-sm-12">
													<label class="">
														RFC<span class="symbol required"></span><br>
														<i>El RFC que des de alta, debe estar registrado previamente <a href="http://sitio.sanluis.gob.mx:8060/Registro" target="_blank"><strong style="font-size: 20px"> aquí</strong></a> como persona Moral</i>
													</label>

													<input type="text"  required class="form-control" id="rfc" name="rfc" placeholder="">
												</div>
												<div class="form-group col-sm-6">
													<label class="">
														Correo<span class="symbol required"></span><br>
													</label>
													<input type="text" required  class="form-control" id="correo" name="correo" placeholder="">
												</div>
												<div class="form-group col-sm-6" id="tipo_incu">
													<label class="">
														Contraseña<span class="symbol required"></span><br>
													</label>

													<input type="password" required  class="form-control" id="contra" name="contra" placeholder="">

												</div>
												@endif
												<div class="form-group col-sm-6">
													<label for=""></label>
													<br>
													<input type="submit" name="enviar" value="Guardar">
												</div>
											</form>

											</div>
											@if($emp->fase=='4')
											<div class="row justify-content-center" id="step-4" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-4"  style="display: none;">
											@endif

											<h1>Etapa 4</h1>
											<form action="{{ route('etapacuatro') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form">
												 {!! csrf_field() !!}
												<div class="form-group col-sm-6">
											    <label class="">
														Diseño de imagen corporativa (logotipo en formato .png o .jpg)<br>
													</label>
												    <input type="file" name="logo" id="logo" class="form-control" accept="image/jpeg, image/x-png"><br>
												</div>

											  <div class="form-group col-sm-6" id="tipo_incu">
											    <label class="">
											      Código de barras (Archivo .pdf)<span class="symbol required"></span>
											    </label>
											    	<input type="file" name="codigobarras" id="codigobarras" class="form-control" accept="application/pdf"><br>
											  </div>

												<strong>
													Para pasar a la siguiente etapa, debes tener por lo menos un registro de marca y un producto dados de alta.<br>x
													Dalos de alta desde tú menú lateral, (Apartados de Registro de marca y productos).
												</strong>
												<div class="form-group col-sm-6">
													<label for=""></label>
													<br>
													<input type="submit" name="enviar" value="Guardar">
												</div>
											</form>



											</div>
											@if($emp->fase=='5')
											<div class="row justify-content-center" id="step-5" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-5"  style="display: none;">
											@endif
											<h1>Etapa 5</h1>
											<form class="" action="index.html" method="post">
												 {!! csrf_field() !!}
												<div class="form-group col-sm-12">
													<label class="">
														Carga archivo FDA (Solo para empresas de categoría Gastronomía)<br>
													</label>
													<input type="file" name="fda" id="fda" class="form-control" accept="application/pdf"><br>
												</div>

												<div class="form-group col-sm-6">
													<label for=""></label>
													<br>
													<input type="submit" name="enviar" value="Guardar">
												</div>
											</form>


											</div>

											@if($emp->fase=='6')
											<div class="row justify-content-center" id="step-6" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-6"  style="display: none;">
											@endif
												<h1>Etapa 6</h1>
												<div class="col-md-1">

												</div>
													<div class="col-md-10">
														<h3>Tu información esta siendo revisada</h3>
														<h4>Esta es la ultima etapa del proceso<br><br>
																¡Felicidades, tu negocio esta en proceso de evolución!.<br>

															</h4>
														<br>
														<h4><strong>Importante: <br>Revisa tú bandeja de entrada o SPAM.</strong></h4>
													</div>

											</div>




<!-- FASES DE REVISIÓN -->
											@if($emp->fase=='10')
											<div class="row justify-content-center" id="step-0" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-0"  style="display: none;">
											@endif
												<h1>Etapa 0</h1>
												<div class="col-md-1">

												</div>
													<div class="col-md-10">
														<h3>Tu información esta siendo revisada</h3>
														<h4>Requisitos para avanzar a fase 1:<br><br>
																-Contar con un INE y comprobante de domicilio validos. (Registro RUC)<br>
																-Correo electronico valido, el cuál deber revisar constantemente para continuar en el proceso.<br>
															</h4>
														<br>
														<h4><strong>Importante: <br>Revisa tú bandeja de entrada o SPAM.</strong></h4>
													</div>
											</div>


											@if($emp->fase=='11')
											<div class="row justify-content-center" id="step-0" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-0"  style="display: none;">
											@endif
												<h1>Etapa 1</h1>
												<div class="col-md-1">

												</div>
													<div class="col-md-10">
														<h3>Tu información esta siendo revisada</h3>
														<h4>Requisitos para avanzar a fase 2:<br><br>
																-Contar con una idea de negocio clara y explicada<br>

															</h4>
														<br>
														<h4><strong>Importante: <br>Revisa tú bandeja de entrada o SPAM.</strong></h4>
													</div>
											</div>

											@if($emp->fase=='12')
											<div class="row justify-content-center" id="step-0" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-0"  style="display: none;">
											@endif
												<h1>Etapa 2</h1>
												<div class="col-md-1">

												</div>
													<div class="col-md-10">
														<h3>Tu información esta siendo revisada</h3>
														<h4>Requisitos para avanzar a fase 3:<br><br>
																-Contar con un comprobante de incubación valido<br>

															</h4>
														<br>
														<h4><strong>Importante: <br>Revisa tú bandeja de entrada o SPAM.</strong></h4>
													</div>
											</div>

											@if($emp->fase=='13')
											<div class="row justify-content-center" id="step-0" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-0"  style="display: none;">
											@endif
												<h1>Etapa 3</h1>
												<div class="col-md-1">

												</div>
													<div class="col-md-10">
														<h3>Tu información esta siendo revisada</h3>
														<h4>Requisitos para avanzar a fase 4:<br><br>
																-Estar dado de alta en hacienda y cargar el comprobante correspondiente<br>

															</h4>
														<br>
														<h4><strong>Importante: <br>Revisa tú bandeja de entrada o SPAM.</strong></h4>
													</div>
											</div>

											@if($emp->fase=='14')
											<div class="row justify-content-center" id="step-0" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-0"  style="display: none;">
											@endif
												<h1>Etapa 4</h1>
												<div class="col-md-1">

												</div>
													<div class="col-md-10">
														<h3>Tu información esta siendo revisada</h3>
														<h4>Requisitos para avanzar a fase 5:<br><br>
																-Cargar codigo de barras correcto<br>
																-Cargar logotipo de empresa<br>
																-Contar con al menos un registro de marca y un producto<br>
															</h4>
														<br>
														<h4><strong>Importante: <br>Revisa tú bandeja de entrada o SPAM.</strong></h4>
													</div>
											</div>

											@if($emp->fase=='15')
											<div class="row justify-content-center" id="step-0" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-0"  style="display: none;">
											@endif
												<h1>Etapa 5</h1>
												<div class="col-md-1">

												</div>
													<div class="col-md-10">
														<h3>Tu información esta siendo revisada</h3>
														<h4>Requisitos para avanzar a fase 6:<br><br>
																-Cargar archivo FDA (En caso de que seas una empresa de giro alimenticio).<br>

															</h4>
														<br>
														<h4><strong>Importante: <br>Revisa tú bandeja de entrada o SPAM.</strong></h4>
													</div>
											</div>
											@if($emp->fase=='16')
											<div class="row justify-content-center" id="step-0" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-0"  style="display: none;">
											@endif
												<h1>Etapa 5</h1>
												<div class="col-md-1">

												</div>
													<div class="col-md-10">
														<h3>Tu información esta siendo revisada</h3>
														<h4>Esta es la ultima etapa del proceso<br><br>
																¡Felicidades, tu negocio esta en proceso de evolución!.<br>

															</h4>
														<br>
														<h4><strong>Importante: <br>Revisa tú bandeja de entrada o SPAM.</strong></h4>
													</div>
											</div>


										</div>
									</div>
								</div>
							</div>

							<!-- end: FORM WIZARD PANEL -->
						</div>
					</div>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>


@endsection
