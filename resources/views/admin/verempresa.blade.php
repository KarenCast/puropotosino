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
									ETAPA 0
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
									    <input type="text" required class="form-control" id="razonsocial" name="razonsocial" placeholder="">
									  </div>
									  <div class="form-group col-sm-4">
									    <label class="">
									      Apellido paterno<span class="symbol required"></span>
									    </label>
									    <input type="text" required class="form-control" id="razonsocial" name="razonsocial" placeholder="">
									  </div>
									  <div class="form-group col-sm-4">
									    <label class="">
									      Apellido materno<span class="symbol required"></span>
									    </label>
									    <input type="text" required class="form-control" id="razonsocial" name="razonsocial" placeholder="">
									  </div>
									  <div class="form-group col-sm-4">
									    <label class="">
									      Correo Electrónico<span class="symbol required"></span>
									    </label>
									    <input type="email" required class="form-control" id="razonsocial" name="razonsocial" placeholder="">
									  </div>
									  <div class="form-group col-sm-4">
									    <label class="">
									      Teléfono<span class="symbol required"></span>
									    </label>
									    <input type="text" required class="form-control" id="razonsocial" name="razonsocial" placeholder="">
									  </div>
									  <div class="form-group col-sm-4">
									    <label class="">
									        Celular<span class="symbol required"></span>
									    </label>
									    <input type="text" required class="form-control" id="razonsocial" name="razonsocial" placeholder="">
									  </div>
									  <div class="form-group col-sm-12">
									    <label class="">
									        Dirección<span class="symbol required"></span>
									    </label>
									    <input type="text" required class="form-control" id="razonsocial" name="razonsocial" placeholder="">
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

									  <div class="form-group col-sm-6" id="tipo_incu" style="visibility: hidden">
									    <label class="">
									      ¿Cuál?<span class="symbol required"></span>
									    </label>
									    <input type="text" disabled required class="form-control" id="tipoincu" name="tipoincu" placeholder="{{$rol->tipo_incubacion}}">
									  </div>
									  <div class="form-group col-sm-12">
									    <label class="">
									    <h4>Carga la documentación con la que cuentas<span class="symbol required"></span></h4> <br>
									    </label><br>
											Comprobante de programa de incubación (Archivo .pdf)<br>
											@if($rol->comprobante_incubacion!=null || $rol->comprobante_incubacion!='')
												@if($rol->CURP!=null)
													<a href="/link/{{$rol->CURP}}/{{$rol->comprobante_incubacion}}"> <h4>Comprobante de incubación</h4> </a>
												@else
												<a href="/link/{{$rol->RFC}}/{{$rol->comprobante_incubacion}}"> <h4>Comprobante de incubación</h4> </a>
												@endif
											@endif

											Alta hacienda (Archivo .pdf)<br>
											@if($rol->comprobante_shcp!=null || $rol->comprobante_shcp!='')
												@if($rol->CURP!=null)
													<a href="/link/{{$rol->CURP}}/{{$rol->comprobante_shcp}}"> <h4>Comprobante de incubación</h4> </a>
												@else
												<a href="/link/{{$rol->RFC}}/{{$rol->comprobante_shcp}}"> <h4>Comprobante de incubación</h4> </a>
												@endif
											@endif



											Diseño de imagen corporativa (logotipo en formato .png o .jpg)<br>
									    <img src="{{asset('assets/images/User_Circle.png')}}" alt="" width="10%" height="auto"><br>


											Código de barras (Archivo .pdf)<br>
											@if($rol->codigo_barras!=null || $rol->codigo_barras!='')
												@if($rol->CURP!=null)
													<a href="/link/{{$rol->CURP}}/{{$rol->codigo_barras}}"> <h4>Comprobante de incubación</h4> </a>
												@else
													<a href="/link/{{$rol->RFC}}/{{$rol->codigo_barras}}"> <h4>Comprobante de incubación</h4> </a>
												@endif
											@endif

											FDA (Archivo .pdf)<br>
											@if($rol->FDA!=null || $rol->FDA!='')
												@if($rol->CURP!=null)
													<a href="/link/{{$rol->CURP}}/{{$rol->FDA}}"> <h4>Comprobante de incubación</h4> </a>
												@else
												<a href="/link/{{$rol->RFC}}/{{$rol->FDA}}"> <h4>Comprobante de incubación</h4> </a>
												@endif
											@endif
									  </div>

									  <h4>Redes sociales</h4>
									  <hr width="100%" color="black"/>
									  <div class="form-group col-sm-6">
									    <label class="">
									      Instagram (URL)
									    </label>
									    <input type="text"  class="form-control" id="instagram" name="instagram" placeholder="" value="{{$rol->instagram}}">

										</div>
									  <div class="form-group col-sm-6">
									    <label class="">
									      Facebook (URL)
									    </label>
									    <input type="text"  class="form-control" id="facebook" name="facebook" placeholder="" value="{{$rol->facebook}}">
									  </div>
									  <div class="form-group col-sm-6">
									    <label class="">
									      Twitter (Usuario)
									    </label>
									    <input type="text"  class="form-control" id="twitter" name="twitter" placeholder="" value="{{$rol->twitter}}">
									  </div>
										<div class="form-group col-sm-6">
										 <label class="">
											 Sitio Web (URL)
										 </label>
										 <input type="text"  class="form-control" id="sitio" name="sitio" placeholder="" value="{{$rol->stio_web}}">
									 </div>
									 <h4>Clasificación</h4>
									 <hr width="100%" color="black"/>
									 <div class="form-group col-sm-6">
										 <label class="">
											 Catagoría a la que pertenece tú empresa<span class="symbol required"></span>
										 </label>

										 <select class="form-control" id="categoria" name="categoria" onchange="versub();">
											 <option value="{{$rol->ID_categoria}}" selected disabled hidden>{{$rol->ID_categoria}}</option>

											</select>
									 </div>
									 <div class="form-group col-sm-6">
										 <label class="">
											 Sub-categoría<span class="symbol required"></span>
										 </label>
										 <select class="form-control" id="subcat" name="subcat">
											 <option value="{{$rol->ID_subcategoria}}" selected disabled hidden>{{$rol->ID_subcategoria}}</option>

											</select>
									 </div>

									  <h4>Documentación Inicial Obligatoria</h4>
									  <hr width="100%" color="black"/>
									  <div class="form-group col-sm-6">
									    <label class="">
									      Comprobante de domicilio (Archivo .pdf)<span class="symbol required"></span>
									    </label>

											@if($rol->FDA!=null || $rol->FDA!='')
												@if($rol->CURP!=null)
													<a href="/link/{{$rol->CURP}}/{{$rol->FDA}}"> <h4>Comprobante de incubación</h4> </a>
												@else
												<a href="/link/{{$rol->RFC}}/{{$rol->FDA}}"> <h4>Comprobante de incubación</h4> </a>
												@endif
											@endif
									  </div>
									  <div class="form-group col-sm-6">
									    <label class="">
									      INE (Archivo .pdf)<span class="symbol required"></span>
									    </label>
									    <input type="file" required class="form-control" id="ine" name="ine" placeholder="" accept="application/pdf">

									  </div>
									  <div class="form-group col-sm-6">
									    <input type="submit" name="enviar" value="Registrar">
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
