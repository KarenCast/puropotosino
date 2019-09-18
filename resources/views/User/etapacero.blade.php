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
									     Describe aquí tu idea de negocio<span class="symbol required"></span>
									    </label><br>
									    <textarea  class="form-control"  name="descripcion" id="descripcion" rows="3" cols="100%"></textarea>
									  </div>
									  <div class="form-group col-sm-6">
									    <label class="">
									      ¿Su negocio se encuentra en operación?<span class="symbol required"></span>
									    </label><br>
									     <input type="radio" name="ope" value="t" onclick=""="operacion();"> No
									     <input type="radio" name="ope" value="f"> Si<br>
									  </div>
									  <div class="form-group col-sm-6" id="fechaope" style="visibility: hidden">
									    <label class="" >
									      Seleccione la fecha en que comenzó a estar en operación<span class="symbol required"></span>
									    </label><br>
									    <input type="date" class="form-control" id="operacion" name="operacion" placeholder="">
									  </div>


									  <h4>Información de contacto</h4>
									  <hr width="100%" color="black"/>
									  <div class="form-group col-sm-4">
									    <label class="">
									      Nombre<span class="symbol required"></span>
									    </label>
									    <input type="text" required class="form-control" id="nombre_c" name="nombre_c" placeholder="">
									  </div>
									  <div class="form-group col-sm-4">
									    <label class="">
									      Apellido paterno<span class="symbol required"></span>
									    </label>
									    <input type="text" required class="form-control" id="ap_c" name="ap_c" placeholder="">
									  </div>
									  <div class="form-group col-sm-4">
									    <label class="">
									      Apellido materno<span class="symbol required"></span>
									    </label>
									    <input type="text" required class="form-control" id="am_c" name="am_c" placeholder="">
									  </div>
									  <div class="form-group col-sm-4">
									    <label class="">
									      Correo Electrónico<span class="symbol required"></span>
									    </label>
									    <input type="email" required class="form-control" id="correo_c" name="correo_c" placeholder="">
									  </div>
									  <div class="form-group col-sm-4">
									    <label class="">
									      Teléfono<span class="symbol required"></span>
									    </label>
									    <input type="text" required class="form-control" id="tel_c" name="tel_c" placeholder="">
									  </div>
									  <div class="form-group col-sm-4">
									    <label class="">
									        Celular<span class="symbol required"></span>
									    </label>
									    <input type="text" required class="form-control" id="celular_c" name="celular_c" placeholder="">
									  </div>
									  <div class="form-group col-sm-12">
									    <label class="">
									        Dirección<span class="symbol required"></span>
									    </label>
									    <input type="text" required class="form-control" id="direccion_c" name="direccion_c" placeholder="">
									  </div>



									  <h4>Información SIDEP</h4>
									  <hr width="100%" color="black"/>
									  <div class="form-group col-sm-6">
									    <label class="">
									      ¿Está dado de alta en SHCP?<span class="symbol required"></span>
									    </label><br>
									     <input type="radio" name="altahacienda" value="t" > Si
									     <input type="radio" name="altahacienda" value="f"> No<br>
									  </div>
									  <div class="form-group col-sm-6" id="tipo_regimen" style="visibility: hidden">
									    <label class="">
									      ¿Bajo que regimen?<span class="symbol required"></span>
									    </label>
									    <input type="text"  class="form-control" id="regimen" name="regimen" placeholder="">
									  </div>
									  <!-- <div class="form-group col-sm-4">
									    <label class="">
									      RFC<span class="symbol required"></span>
									    </label>
									    <input type="text" class="form-control" id="rfc" name="rfc" placeholder="">
									  </div> -->
									  <div class="form-group col-sm-6">
									    <label class="">
									      ¿Ha realizado algún programa de incubación de empresa?<span class="symbol required"></span>
									    </label><br>
									     <input type="radio" name="incu" value="t"> Si
									     <input type="radio" name="incu" value="f"> No<br>
									  </div>
									  <div class="form-group col-sm-6" id="tipo_incu" style="visibility: hidden">
									    <label class="">
									      ¿Cuál?<span class="symbol required"></span>
									    </label>
									    <input type="text"  class="form-control" id="tipoincu" name="tipoincu" placeholder="">
									  </div>
									  <div class="form-group col-sm-12">
									    <label class="">
									    <h4>Carga la documentación con la que cuentas (No obligatorios)</h4> <br>
									    </label><br>
											Comprobante de programa de incubación (Archivo .pdf)<br>
									    <input type="file" name="incubacion" id="incubacion" class="form-control" accept="application/pdf"><br>

											@if(session('tipo')=='moral')
												Alta hacienda (Archivo .pdf)<br>
										    <input type="file" name="hacienda" id="hacienda" class="form-control" accept="application/pdf"><br>
												Diseño de imagen corporativa (logotipo en formato .png o .jpg)<br>
										    <input type="file" name="logo" id="logo" class="form-control" accept="image/jpeg, image/x-png"><br>
												Código de barras (Archivo .pdf)<br>
										    <input type="file" name="codigobarras" id="codigobarras" class="form-control" accept="application/pdf"><br>
												FDA (Archivo .pdf)<br>
										    <input type="file" name="fda" id="fda" class="form-control" accept="application/pdf"><br>
											@endif
									  </div>

									  <h4>Redes sociales</h4>
									  <hr width="100%" color="black"/>
									  <div class="form-group col-sm-6">
									    <label class="">
									      Instagram (URL)
									    </label>
									    <input type="text"  class="form-control" id="instagram" name="instagram" placeholder="">
									  </div>
									  <div class="form-group col-sm-6">
									    <label class="">
									      Facebook (URL)
									    </label>
									    <input type="text"  class="form-control" id="facebook" name="facebook" placeholder="">
									  </div>
									  <div class="form-group col-sm-6">
									    <label class="">
									      Twitter (Usuario)
									    </label>
									    <input type="text"  class="form-control" id="twitter" name="twitter" placeholder="">
									  </div>
										<div class="form-group col-sm-6">
										 <label class="">
											 Sitio Web (URL)
										 </label>
										 <input type="text"  class="form-control" id="sitio" name="sitio" placeholder="">
									 </div>
									 <h4>Clasificación</h4>
									 <hr width="100%" color="black"/>
									 <div class="form-group col-sm-6">
										 <label class="">
											 Catagoría a la que pertenece tú empresa<span class="symbol required"></span>
										 </label>

										 <select class="form-control" id="categoria" name="categoria" onchange="versub();">
											 <option value="" selected disabled hidden>Elige</option>
																		 @foreach($categorias as $rol)

																			 <option value="{{$rol->ID_categoria}}">{{$rol->nombre}}</option>

																		 @endforeach
											</select>
									 </div>
									 <div class="form-group col-sm-6">
										 <label class="">
											 Sub-categoría<span class="symbol required"></span>
										 </label>
										 <select class="form-control" id="subcat" name="subcat">
											 							<option value="" selected disabled hidden>Elige</option>
																		 @foreach($sub as $rol)

																			 <option style="display: none" name="subs" value="{{$rol->ID_subcategoria}}" id="{{$rol->ID_categoria}}">{{$rol->nombre}}</option>

																		 @endforeach
											</select>
									 </div>

									  <h4>Documentación Inicial Obligatoria</h4>
									  <hr width="100%" color="black"/>
									  <div class="form-group col-sm-6">
									    <label class="">
									      Comprobante de domicilio (Archivo .pdf)<span class="symbol required"></span>
									    </label>
									    <input type="file" required class="form-control" id="cdomicilio" name="cdomicilio" placeholder="" accept="application/pdf">

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

								</div>
							</div>
							<!-- end: FORM WIZARD PANEL -->
						</div>
					</div>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>
<script src="{{asset('js/validar.js')}}">  </script>
<script>
function valor(e) {
	var p = document.getElementById("edad_max").value;
	 document.getElementById("puesto").innerHTML = "Puesto: " + p + "\nDelegación: " + +"\nCantidad de vacantes: ";
}

</script>


<script type="text/javascript">
	function confi(){

		if (document.getElementById('conf').checked) {
			document.getElementById("sueldo").style.display = "none";
		}else{
				document.getElementById("sueldo").style.display = "block";
		}
	}
</script>

@endsection
