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
									Seguimiento
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

									<h3>SEGUIMIENTO<br>
	                 <small>Carga la documentación necesaria para avanzar en el proceso de SIDEP</small></h3>
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
																<p><strong>6</strong></p>
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

												<div class="col-md-12">
													<h1 style="margin-bottom: 2em;">Etapa 0: <span style="font-weight: 200;">Pre-registro</span></h1>
													<p>Si continuas en etapa 0 es porque no pudimos contactarte.</p><br><br>
													<form action="{{ route('etapacero') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form">
														 {!! csrf_field() !!}
														 <h3>Información de contacto</h3>
														 <div class="form-group col-md-4">
 															<label for="">Nombre</label><span class="symbol required"></span>
 															<input class="form-control" type="text" name="nombrec" id="nombrec" value="{{$emp->nombre}}">

 														</div>
														<div class="form-group col-md-4">
														 <label for="">Apellido Paterno</label><span class="symbol required"></span>
														 <input class="form-control" type="text" name="apellidopc" id="apellidopc" value="{{$emp->APaterno}}">

													 </div>
													 <div class="form-group col-md-4">
														<label for="">Apellido Materno</label><span class="symbol required"></span>
														<input class="form-control" type="text" name="apellidomc" id="apellidomc" value="{{$emp->AMaterno}}">
													</div>
														<div class="form-group col-md-4">
															<label for="">Correo Electrónico</label><span class="symbol required"></span>
															<input class="form-control" type="mail" name="correoc" id="correoc" value="{{$emp->correo_electronico}}">

														</div>
														<div class="form-group col-md-4">
															<label for="">Teléfono</label><span class="symbol required"></span>
															<input class="form-control" type="number" name="telefonoc" id="telefonoc" value="{{$emp->telefono}}">

														</div>
														<div class="form-group col-md-4">
															<label for="">Celular</label><span class="symbol required"></span>
															<input class="form-control" type="number" name="celularc" id="celularc" value="{{$emp->celular}}">

														</div>
														<div class="form-group col-md-12">
															<label for="">Dirección</label><span class="symbol required"></span>
															<input class="form-control" type="text" name="direccionc" id="direccionc" value="{{$emp->direccion}}">

														</div>
														<h3>Redes sociales</h3>
														<div class="form-group col-md-6">
														 <label for="">Facebook</label><span class="symbol required"></span>
														 <input class="form-control" type="text" name="facebook" id="facebook" value="{{$emp->facebook}}">

													 </div>
													 <div class="form-group col-md-6">
														<label for="">Instagram</label><span class="symbol required"></span>
														<input class="form-control" type="text" name="instagram" id="instagram" value="{{$emp->instagram}}">

													</div>
													<div class="form-group col-md-6">
													 <label for="">Twitter</label><span class="symbol required"></span>
													 <input class="form-control" type="text" name="twitter" id="twitter" value="{{$emp->twitter}}">
												 </div>
													 <div class="form-group col-md-6">
														 <label for="">Sitio Web</label><span class="symbol required"></span>
														 <input class="form-control" type="mail" name="sitio" id="sitio" value="{{$emp->stio_web}}">
													 </div>
														<div class="form-group col-sm-12" id="guardaretapa">
														 <input class="btn btn-primary" type="submit" name="enviar" value="Guardar">
														</div>
													</form>
												</div>

											</div>

											@if($emp->fase==1)
											<div class="row justify-content-center" id="step-1" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-1"  style="display: none;">
											@endif
												<div class="col-md-12">
													<h1 style="margin-bottom: 2em;">Etapa 1: <span style="font-weight: 200;">Idea de negocio</span></h1>

													<form action="{{ route('etapauno') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form">
														 {!! csrf_field() !!}
														<label for="">Describe tu idea de negocio</label><span class="symbol required"></span>
														<textarea class="form-control" required  name="ideanegocio" rows="10" cols="80" id="ideanegocio">{{$emp->descripcion}}</textarea>
														<div class="form-group col-sm-12" id="guardaretapa">
													    <input class="btn btn-primary" type="submit" name="enviar" value="Guardar">
													  </div>
													</form>
												</div>

											</div>
											@if($emp->fase=='2')
											<div class="row justify-content-center" id="step-2" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-2"  style="display: none;">
											@endif

												<div class="col-md-12">

													<h1 style="margin-bottom: 2em;">Etapa 2: <span style="font-weight: 200;">Proceso de incubacion</span></h1>
													<form action="{{ route('etapados') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form">
														 {!! csrf_field() !!}
														<div class="form-group col-sm-12">
															<label class="">
															Comprobante de programa de incubación (Archivo .pdf)
															</label><br>
															@if($emp->comprobante_incubacion!=null)
															<a href="../../link/{{$emp->ID_empresa}}/{{$emp->comprobante_incubacion}}"> <h4>Comprobante de incubación actual (Máximo 2MB, archivo .pdf)</h4> </a>
															<input type="file" name="incubacion"  id="incubacion" class="form-control" accept="application/pdf"><br>

															@else
															<input type="file" name="incubacion" required id="incubacion" class="form-control" accept="application/pdf"><br>

															@endif


														</div>

														<div class="form-group col-sm-6" id="tipo_incu">
															<label class="">
																¿Tipo de incubación?<span class="symbol required"></span>
															</label>
															<select class="form-control" name="tipoincu" id="tipoincu" onchange="myValidate2();">
																<option value="Curso de innovación y emprendimiento">Curso de innovación y emprendimiento</option>
																<option value="Academia SIFIDE">Academia SIFIDE</option>
																<option value="Otro">Otro</option>
															</select>
															<label class="">
																En caso de seleccionar otro, especifique<span class="symbol required"></span>
															</label>
															<input type="text" class="form-control" id="tipoincu_o" name="tipoincu_o" placeholder="" style="display: none">

														</div>

														<div class="form-group col-sm-12" id="guardaretapa">
															<label for=""></label>
															<br>
															<input class="btn btn-primary" type="submit" name="enviar" value="Guardar">
														</div>
													</form>
												</div>




											</div>
											@if($emp->fase=='3')
											<div class="row justify-content-center" id="step-3" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-3"  style="display: none;">
											@endif

											<h1 style="margin-bottom: 2em;">Etapa 3: <span style="font-weight: 200;">Dar de alta en SHCP</span></h1>

											<form action="{{ route('etapatres') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form">
												 {!! csrf_field() !!}
												<div class="form-group col-sm-6">

													<label class="">
														Alta hacienda (Archivo .pdf)<span class="symbol required"></span>
													</label>

														@if($emp->comprobante_shcp!=null || $emp->comprobante_shcp!='')
														<input type="file"  name="hacienda" id="hacienda" class="form-control" accept="application/pdf"><br>
														<a href="./link/{{$emp->ID_empresa}}/{{$emp->comprobante_shcp}}"> <h4>Comprobante de hacienda actual (Máximo 2MB, archivo .pdf)</h4> </a>
														@else
														<input type="file" required name="hacienda" id="hacienda" class="form-control" accept="application/pdf"><br>
														@endif
												</div>
												<div class="form-group col-sm-6">
													<label class="">
														Regimen hacienda<span class="symbol required"></span><br>
													</label>
													<select class="form-control" name="regimen" id="regimen" onchange="myValidate();">
														<option value="RIF (Regimen de incorporación fiscal)">RIF (Regimen de incorporación fiscal)</option>
														<option value="SAS (Sociedad de acciones simplificadas)">SAS (Sociedad de acciones simplificadas)</option>
														<option value="Persona física con actividad empresarial">Persona física con actividad empresarial</option>
														<option value="S.A. de C.V.">S.A. de C.V.</option>
														<option value="Otro">Otro</option>
													</select>
													<label class="">
														En caso de seleccionar otro:<span class="symbol required"></span><br>
													</label>
													<input type="text" class="form-control" id="regimen_o" name="regimen_o" placeholder="" value="{{$emp->regimen}}" style="display: none">

												</div>
												@if(session('tipo')=='fisica')
												<div class="form-group col-sm-12">
													<label class="">
														RFC<span class="symbol required"></span><br>
														<i>El RFC que des de alta, debe estar registrado previamente <a href="https://sitio.sanluis.gob.mx/VentanillaSLP/public/Registro" target="_blank"><strong style="font-size: 20px"> aquí</strong></a> como persona Moral</i>
													</label>
													@if($emp->RFC!=null)
													<input type="text"  required class="form-control" id="rfc" name="rfc" placeholder="" value="{{$emp->RFC}}">
													@else
													<input type="text"  required class="form-control" id="rfc" name="rfc" placeholder="">
													@endif
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
												<div class="form-group col-sm-12" id="guardaretapa">
													<label for=""></label>
													<br>
													<input class="btn btn-primary" type="submit" name="enviar" value="Guardar">
												</div>
											</form>

											</div>
											@if($emp->fase=='4')
											<div class="row justify-content-center" id="step-4" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-4"  style="display: none;">
											@endif


											<h1 style="margin-bottom: 2em;">Etapa 4: <span style="font-weight: 200;">Comercializa</span></h1>

											<br>
											<a href="#" style="float: right"><i><h4>Descarga tu constancia del programa</i><i class="fas fa-download"></h4></i></a>

											<br><br><br>
											<form action="{{ route('etapacuatro') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form">
												 {!! csrf_field() !!}
												<div class="form-group col-sm-6">
											    <label class="">
														Diseño de imagen corporativa (Logotipo en formato .png o .jpg, Máximo 2MB)<br>
													</label>

														@if($emp->disenio_imagen!=null)
															<input type="file" name="logo" id="logo" class="form-control" accept="image/jpeg, image/x-png"><br>

															<img src="{{asset('Logos')}}/{{$emp->ID_empresa}}/{{$emp->disenio_imagen}}" id='fileimg' style="height: auto; width: 200px;"/>
														@else
															<input required type="file" name="logo" id="logo" class="form-control" accept="image/jpeg, image/x-png"><br>

															<img  id='fileimg' style="height: auto; width: 200px;"/>
														@endif
												</div>

											  <div class="form-group col-sm-6" id="tipo_incu">

											    <label class="">
											      Código de barras (Máximo 2MB, archivo .pdf)<span class="symbol required"></span>
											    </label>
														@if($emp->codigo_barras!=null)
														<input type="file" name="codigobarras" id="codigobarras" class="form-control" accept="application/pdf"><br>

														<a href="../../link/{{$emp->ID_empresa}}/{{$emp->codigo_barras}}"> <h4>Código de barras actual</h4> </a>
														@else
														<input type="file" required name="codigobarras" id="codigobarras" class="form-control" accept="application/pdf"><br>

														@endif
												</div>

												<div class="class-sm-12">
													<strong>
														Para pasar a la siguiente etapa, debes tener por lo menos un registro de marca y un producto dados de alta.<br>
														Dalos de alta desde tú menú lateral, (Apartados de Registro de marca y productos).
													</strong>
												</div>
												<div class="form-group col-sm-12" id="guardaretapa">
													<label for=""></label>
													<br>
													<input class="btn btn-primary" type="submit" name="enviar" value="Guardar">
												</div>
											</form>



											</div>
											@if($emp->fase=='5')
											<div class="row justify-content-center" id="step-5" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-5"  style="display: none;">
											@endif
											<h1 style="margin-bottom: 2em;">Etapa 5: <span style="font-weight: 200;">Exporta y promocionate</span></h1>

											<form action="{{ route('etapacinco') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form">
												 {!! csrf_field() !!}
												<div class="form-group col-sm-12">
													<label class="">
														Carga archivo FDA (Solo para empresas de las categorías: Gastronomía, Salud y Bienestar y Agro-productos. Máximo 2MB, archivo .pdf)<br>
													</label>
													@if($emp->FDA!=null)
													<input type="file" name="fda" id="fda" class="form-control" accept="application/pdf"><br>

													<a href="./link/{{$rol->ID_empresa}}/{{$rol->FDA}}"> <h4>FDA actual</h4> </a>
													@else
													<input type="file" required name="fda" id="fda" class="form-control" accept="application/pdf"><br>

													@endif
												</div>

												<div class="form-group col-sm-12" id="guardaretapa">
													<label for=""></label>
													<br>
													<input class="btn btn-primary" type="submit" name="enviar" value="Guardar">
												</div>
											</form>


											</div>

											@if($emp->fase=='6')
											<div class="row justify-content-center" id="step-6" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-6"  style="display: none;">
											@endif


													<div class="col-md-12">
														<h1 style="margin-bottom: 2em;">Etapa 6: <span style="font-weight: 200;">Evoluciona tú negocio</span></h1>


														<h3>Esta es la ultima etapa del proceso. ¡Felicidades, tu negocio esta en proceso de evolución!.<br>

															</h3>
														<br>
														<h4 style="text-align: justify"><strong>Importante:</strong> Continua revisando tú <strong>bandeja de entrada o SPAM</strong> para cualquier información.</h4>

													</div>

											</div>




<!-- FASES DE REVISIÓN -->
											@if($emp->fase=='10')
											<div class="row justify-content-center" id="step-0" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-0"  style="display: none;">
											@endif

													<div class="col-md-12">
														<h1 style="margin-bottom: 2em;">Etapa 0: <span style="font-weight: 200;">Pre-registro</span></h1>

														@include('User.informacion')
													</div>
											</div>


											@if($emp->fase=='11')
											<div class="row justify-content-center" id="step-0" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-0"  style="display: none;">
											@endif
											<div class="col-md-12">
												<h1 style="margin-bottom: 2em;">Etapa 1: <span style="font-weight: 200;">Idea de negocio</span></h1>

												@include('User.informacion')
											</div>
											</div>

											@if($emp->fase=='12')
											<div class="row justify-content-center" id="step-0" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-0"  style="display: none;">
											@endif

													<div class="col-md-12">
														<h1 style="margin-bottom: 2em;">Etapa 2: <span style="font-weight: 200;">Proceso de incubación</span></h1>
														@include('User.informacion')
													</div>
											</div>

											@if($emp->fase=='13')
											<div class="row justify-content-center" id="step-0" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-0"  style="display: none;">
											@endif
											<div class="col-md-12">
												<h1 style="margin-bottom: 2em;">Etapa 3: <span style="font-weight: 200;">Alta SHCP</span></h1>
												@include('User.informacion')
											</div>
											</div>

											@if($emp->fase=='14')
											<div class="row justify-content-center" id="step-0" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-0"  style="display: none;">
											@endif
											<div class="col-md-12">
												<h1 style="margin-bottom: 2em;">Etapa 4: <span style="font-weight: 200;">Comercializa</span></h1>
												@include('User.informacion')
											</div>
											</div>

											@if($emp->fase=='15')
											<div class="row justify-content-center" id="step-0" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-0"  style="display: none;">
											@endif
											<div class="col-md-12">
												<h1 style="margin-bottom: 2em;">Etapa 5: <span style="font-weight: 200;">Exporta y promocionate</span></h1>
												@include('User.informacion')
											</div>
											</div>
											@if($emp->fase=='16')
											<div class="row justify-content-center" id="step-0" style="display: block;">
											@else
											<div class="row justify-content-center" id="step-0"  style="display: none;">
											@endif
											<div class="col-md-12">
												<h1 style="margin-bottom: 2em;">Etapa 6: <span style="font-weight: 200;">Evoluciona tú negocio</span></h1>
												@include('User.informacion')
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

			<script type="text/javascript">
			$(document).ready( function() {


			     $(document).on('change', '.btn-file :file', function() {
			          var input = $(this),
			          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			          input.trigger('fileselect', [label]);
			     });

			     $('.btn-file :file').on('fileselect', function(event, label) {
			          var input = $(this).parents('.input-group').find(':text'),
			          log = label;
			          if( input.length ) {
			               input.val(log);
			          }
								//  else {
			          //      if( log ) alert(log);
			          // }
			     });

			     function readURL(input) {
			          if (input.files && input.files[0]) {
			               var reader = new FileReader();
			               reader.onload = function (e) {
			                    $('#fileimg').attr('src', e.target.result);
			               }
			               reader.readAsDataURL(input.files[0]);
			          }
			     }



			     $("#logo").change(function(){
			          readURL(this);
			     });


			});
			</script>
			<script type="text/javascript">
					function myValidate(){
						var x = document.getElementById("regimen").value;
						if (x=='Otro') {
							document.getElementById("regimen_o").style.display = "block";
						}else {
							document.getElementById("regimen_o").style.display = "none";
						}
					}

					function myValidate2(){
						var y = document.getElementById("tipoincu").value;
						if (y=='Otro') {
							document.getElementById("tipoincu_o").style.display = "block";
						}else {
							document.getElementById("tipoincu_o").style.display = "none";
						}
					}
			</script>
@endsection
