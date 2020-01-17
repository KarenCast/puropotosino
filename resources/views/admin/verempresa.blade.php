@extends('admin.main')
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
									Empresa
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
                  @foreach($empresa as $rol)

									<form action="{{ route('empresa') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form" class="row">
									  {!! csrf_field() !!}

										<div class="form-group col-sm-4">
											<label class="">
											 TIPO DE PERSONA<span class="symbol required"></span>
											</label><br>
											@if($rol->fisica == false)
												<h4>PERSONA MORAL</h4>
											</div>
											<div class="form-group col-sm-4">
											</div>
												<div class="form-group col-sm-4">
												<label class="">
												 RAZÓN SOCIAL<span class="symbol required"></span>
												</label><br>
												<h4> {{$rol->razonsocial}}</h4>

											@else
												<h4>PERSONA FÍSICA</h4>
											</div>
											<div class="form-group col-sm-4">
											</div>
											<div class="form-group col-sm-4">
												<label class="">
												 	NOMBRE<span class="symbol required"></span>
												</label><br>
												<h4> {{$rol->nombre}} {{$rol->apellido_paterno}} {{$rol->apellido_materno}} </h4>

											@endif
										</div>

									  <h4>Información general de negocio</h4>
									  <hr width="100%" color="black"/>
									  <!-- <div class="form-group col-sm-12">
									    <label class="">
									      Razón social (Nombre Empresa)<span class="symbol required"></span>
									    </label>
									    <input type="text" required class="form-control" id="razonsocial" name="razonsocial" placeholder="">
									  </div> -->
									  <div class="form-group col-sm-12">
									    <label class="">
									     Idea de negocio<span class="symbol required"></span>
									    </label><br>
									    <textarea  class="form-control" disabled  name="descripcion" id="descripcion" rows="3" cols="100%">{{$rol->descripcion}}</textarea>
									  </div>

                    @if($rol->tiempo_operacion!=null)
									  <div class="form-group col-sm-12" id="fechaope">
									    <label class="" ><p>Fecha en que comenzó a estar en operación<span class="symbol required"></span></p>

									    </label><br>
									    <input type="date" disabled required class="form-control" id="operacion" name="operacion" placeholder="" value="{{$rol->tiempo_operacion}}">
									  </div>
                    @endif

									  <h4>Información de contacto</h4>
									  <hr width="100%" color="black"/>
									  <div class="form-group col-sm-4">
									    <label class="">
									      Nombre<span class="symbol required"></span>
									    </label>
									    <input type="text" disabled value="{{$rol->nombre}}" required class="form-control" id="razonsocial" name="razonsocial" placeholder="">
									  </div>
									  <div class="form-group col-sm-4">
									    <label class="">
									      Apellido paterno<span class="symbol required"></span>
									    </label>
									    <input type="text" disabled value="{{$rol->APaterno}}" required class="form-control" id="razonsocial" name="razonsocial" placeholder="">
									  </div>
									  <div class="form-group col-sm-4">
									    <label class="">
									      Apellido materno<span class="symbol required"></span>
									    </label>
									    <input type="text" disabled value="{{$rol->AMaterno}}" required class="form-control" id="razonsocial" name="razonsocial" placeholder="">
									  </div>
									  <div class="form-group col-sm-4">
									    <label class="">
									      Correo Electrónico<span class="symbol required"></span>
									    </label>
									    <input type="email" disabled value="{{$rol->correo_electronico}}" required class="form-control" id="razonsocial" name="razonsocial" placeholder="">
									  </div>
									  <div class="form-group col-sm-4">
									    <label class="">
									      Teléfono<span class="symbol required"></span>
									    </label>
									    <input type="text" disabled value="{{$rol->telefono}}" required class="form-control" id="razonsocial" name="razonsocial" placeholder="">
									  </div>
									  <div class="form-group col-sm-4">
									    <label class="">
									        Celular<span class="symbol required"></span>
									    </label>
									    <input type="text" disabled value="{{$rol->celular}}" required class="form-control" id="razonsocial" name="razonsocial" placeholder="">
									  </div>
									  <div class="form-group col-sm-12">
									    <label class="">
									        Dirección<span class="symbol required"></span>
									    </label>
									    <input type="text" disabled value="{{$rol->direccion}}" required class="form-control" id="razonsocial" name="razonsocial" placeholder="">
									  </div>



									  <h4>Información SIDEP</h4>
									  <hr width="100%" color="black"/>

									  <div class="form-group col-sm-6" id="tipo_regimen" >
									    <label class="">
									      Regimen de alta en DHCP<span class="symbol required"></span>
									    </label>
									    <input type="text" disabled required class="form-control" id="regimen" name="regimen" placeholder="" value="{{$rol->regimen}}">
									  </div>
									  <!-- <div class="form-group col-sm-4">
									    <label class="">
									      RFC<span class="symbol required"></span>
									    </label>
									    <input type="text" class="form-control" id="rfc" name="rfc" placeholder="">
									  </div> -->

									  <div class="form-group col-sm-6" id="tipo_incu" style="">
									    <label class="">
									      Tipo de incubación<span class="symbol required"></span>
									    </label>
									    <input type="text" disabled required class="form-control" id="tipoincu" name="tipoincu" placeholder="{{$rol->tipo_incubacion}}">
									  </div>
									  <div class="form-group col-sm-12">
									    <label class="">
									    <h4>Documentación con la que cuenta <span class="symbol required"></span></h4> <br>
									    </label><br>


												@if($rol->comprobante_incubacion!=null)
												<a href="../../link/{{$rol->ID_empresa}}/{{$rol->comprobante_incubacion}}"> <h4>Comprobante de incubación</h4> </a>
												@endif

												@if($rol->comprobante_shcp!=null || $rol->comprobante_shcp!='')
													<a href="../../link/{{$rol->ID_empresa}}/{{$rol->comprobante_shcp}}"> <h4>Comprobante de hacienda (Constancia de situación fiscal)</h4> </a>
												@endif


											@if($rol->disenio_imagen!=null || $rol->disenio_imagen!='')
												Diseño de imagen corporativa (logotipo en formato .png o .jpg)<br>
										    <img src="{{asset('Logos')}}/{{$rol->ID_empresa}}/{{$rol->disenio_imagen}}" alt="" width="30%" height="auto"><br>
											@endif


											@if($rol->codigo_barras!=null || $rol->codigo_barras!='')
												<a href="../../link/{{$rol->ID_empresa}}/{{$rol->codigo_barras}}"> <h4>Código de barras</h4> </a>
											@endif


											@if($rol->FDA!=null || $rol->FDA!='')
												<a href="../../link/{{$rol->ID_empresa}}/{{$rol->FDA}}"> <h4>Archivo FDA</h4> </a>
											@endif

											@if($rol->comprobante_exportacion!=null || $rol->comprobante_exportacion!='')
												<a href="../../link/{{$rol->ID_empresa}}/{{$rol->comprobante_exportacion}}"> <h4>Comprobante Exportación</h4> </a>
											@endif
									  </div>

									  <h4>Redes sociales</h4>
									  <hr width="100%" color="black"/>
									  <div class="form-group col-sm-6">
									    <label class="">
									      Instagram (URL)
									    </label>
									    <input type="text"  class="form-control" id="instagram" name="instagram" placeholder="" value="{{$rol->instagram}}" disabled>

										</div>
									  <div class="form-group col-sm-6">
									    <label class="">
									      Facebook (URL)
									    </label>
									    <input type="text"  class="form-control" id="facebook" name="facebook" placeholder="" value="{{$rol->facebook}}" disabled>
									  </div>
									  <div class="form-group col-sm-6">
									    <label class="">
									      Twitter (Usuario)
									    </label>
									    <input type="text"  class="form-control" id="twitter" name="twitter" placeholder="" value="{{$rol->twitter}}" disabled>
									  </div>
										<div class="form-group col-sm-6">
										 <label class="">
											 Sitio Web (URL)
										 </label>
										 <input type="text"  class="form-control" id="sitio" name="sitio" placeholder="" value="{{$rol->stio_web}}" disabled>
									 </div>
									 <h4>Clasificación</h4>
									 <hr width="100%" color="black"/>
									 <div class="form-group col-sm-6">
										 <label class="">
											 Catagoría a la que pertenece tú empresa<span class="symbol required"></span>
										 </label>

										 <select class="form-control" id="categoria" name="categoria" onchange="versub();" disabled>
											 <option value="{{$rol->ID_categoria}}" selected disabled hidden>{{$rol->ID_categoria}}</option>

											</select>
									 </div>
									 <div class="form-group col-sm-6">
										 <label class="">
											 Sub-categoría<span class="symbol required"></span>
										 </label>
										 <select class="form-control" id="subcat" name="subcat" disabled>
											 <option value="{{$rol->ID_subcategoria}}" selected  hidden>{{$rol->ID_subcategoria}}</option>

											</select>
									 </div>

									  <h4>Documentación Inicial Obligatoria</h4>
									  <hr width="100%" color="black"/>
									  <div class="form-group col-sm-6">


											@if($rol->comprobante_domicilio!=null || $rol->comprobante_domicilio!='')
											<label class="">
									      Comprobante de domicilio (Archivo .pdf)<span class="symbol required"></span>
									    </label>
												@if($rol->RFC!=null)
												<a href="../../link/{{$rol->RFC}}/{{$rol->comprobante_domicilio}}"> <h4>Comprobante de domicilio</h4> </a>

												@else
												<a href="../../link/{{$rol->CURP}}/{{$rol->comprobante_domicilio}}"> <h4>Comprobante de domicilio</h4> </a>

												@endif
											@endif
									  </div>
									  <div class="form-group col-sm-6">

											@if($rol->comprobante_domicilio!=null || $rol->comprobante_domicilio!='')
											<label class="">
									      INE (Archivo .pdf)<span class="symbol required"></span>
									    </label>
												@if($rol->RFC!=null)
												<a href="../../link/{{$rol->RFC}}/{{$rol->comprobante_domicilio}}"> <h4>Comprobante de domicilio</h4> </a>

												@else
												<a href="../../link/{{$rol->CURP}}/{{$rol->comprobante_domicilio}}"> <h4>Comprobante de domicilio</h4> </a>

												@endif
											@endif

									  </div>

									<div class="form-group col-sm-6" style="text-align: center; padding-top: 3em;">
										<a href="../../consultaMarcaspe/{{$rol->ID_empresa}}">
											<button class="btn btn-info" type="button" name="button">VER REGISTROS DE MARCA</button>
										</a>
									</div>
									<div class="form-group col-sm-6" style="text-align: center; padding-top: 3em;">
										<a href="../../consultaProductospe/{{$rol->ID_empresa}}">
											<button class="btn btn-info" type="button" name="button">VER REGISTROS DE PRODUCTO</button>
										</a>
									</div>

									</form>

									<h4>Asignación de Fase y comentarios de SIDEP</h4>
									<hr width="100%" color="black"/>
									<form action="{{ route('enviarcorreo') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form" class="row">
									  {!! csrf_field() !!}
										<input type="text" name="id" id="id" value="{{$rol->ID_empresa}}" style="display: none">
										<div class="form-group col-sm-12">
											<label class="">
												Escribe tus comentarios/observaciones que serán enviados por correo al usuario<span class="symbol required"></span>
											</label>
											<textarea required name="mensaje" id="mensaje" rows="8" cols="80" class="form-control"></textarea>
										</div>
										<div class="form-group col-sm-6">
											<label class="">
												Asigna una Fase <span class="symbol required"></span>
											</label>
											<select class="form-control" name="fase" id="fase">
												@if($rol->fase>=10)
													@for ($i = 10; $i < 17; $i++)
														{{$j = $i-10}}
														@if($rol->fase== $i )

															<option value="{{ $j }}" selected>{{ $j }}</option>
														@else
															<option value="{{ $j }}">{{ $j }}</option>
														@endif
													@endfor
												@elseif($rol->fase<=10)
													@for ($i = 0; $i < 7; $i++)
														@if($rol->fase== $i )
															<option value="{{ $i }}" selected>{{ $i }}</option>
														@else
															<option value="{{ $i }}">{{ $i }}</option>
														@endif
													@endfor
												@endif

											</select>
										</div>
										<div class="form-group col-sm-6">
											<br>
											<input type="submit" name="enviar" class="btn btn-primary" value="Guardar Fase y enviar comentarios">
										</div>
									</form>
              		@endforeach
								</div>
							</div>
							<!-- end: FORM WIZARD PANEL -->
						</div>
					</div>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>
@endsection
