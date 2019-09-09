@extends('front.header')
@section('content')

<div class="container">
	@if(session('Error')!== null)
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>Error!</strong> {{{session('Error')}}}
	</div>
	@endif
	<div class="row justify-content-right titulo">
		<div class="col-6">
			<h3>Registro Único Ciudadano</h3>
		</div>
		<div class="col-6"  style="text-align: right;">
			<h3>Fecha: {{$fecha}}</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 ">
			<nav>
				<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
					<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Persona Fisica</a>
					<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Persona Moral</a>
				</div>
			</nav>
			<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
				<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					<form  action="{{ route('Registro') }}" method="POST" enctype="multipart/form-data" onsubmit="return validaPersonaFisica();" id="form-reg">
						{!! csrf_field() !!}
						<h2>Datos Personales</h2>
						<div class="form-group" id="FCurp">
							<label for="CURP" class="col-sm-3 control-label">CURP<span> *</span></label>
							<div class="col-sm-12">
								<input type="text" id="curp_input" oninput="validarInput(this, 'resultado')" class="form-control" name="CURP" placeholder="CURP">
								<pre id="resultado" class="resultado"></pre>
							</div>
						</div>
						<div class="form-group">
							<label for="RFC" class="col-sm-3 control-label">RFC<span> *</span></label>
							<div class="col-sm-12">
								<input type="text"  oninput="validarInputRFC(this,'RFCRes')" placeholder="Ingrese su RFC" id="RFC"  class="form-control" name="RFC" required >
								<pre class="resultado" id="RFCRes"></pre>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 col-12  form-group">
								<label for="firstName" class="col-sm-12 control-label">Nombre<span> *</span></label>
								<div class="col-sm-12">
									<input type="text" id="firstName" name="nombre" placeholder="Nombre(s)" class="form-control" required >
								</div>
							</div>
							<div class="col-sm-4 col-12 form-group">
								<label for="APaterno" class="col-sm-12 control-label">A. Paterno<span> *</span></label>
								<div class="col-sm-12">
									<input type="text" id="APaterno" name="APaterno" placeholder="A. Paterno" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-4 col-12  form-group">
								<label for="AMaterno" class="col-sm-12 control-label">A. Materno</label>
								<div class="col-sm-12">
									<input type="text" id="AMaterno" name="AMaterno" placeholder="A. Materno" class="form-control" >
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6 col-12 form-group">
								<label  for="FechaNac" class="col-sm-6 control-label">Fecha de Nacimiento<span> *</span></label>
								<div class="col-sm-12">
									<!-- <input type="date" id="FechaNac" name="FechaNac" class="form-control"  required> -->
									<input type="text" id="FechaNac" name="FechaNac" class="form-control" value=""  required>
									<script>
									$('#FechaNac').datepicker({
										uiLibrary: 'bootstrap4',
										format: "dd/mm/yyyy",
										autoclose: true,
									});
									</script>
								</div>
							</div>
							<div class="col-sm-6 col-12 form-group">
								<label for="genero" class="col-sm-3 control-label">Genero<span> *</span></label>
								<div class="col-sm-12">
									Masculino:
									<input type="radio" name="genero"  value="hombre" checked/> Femenino:
									<input type="radio" name="genero"  value="mujer"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-12 form-group">
								<label for="Estado" class="col-sm-6 control-label">Estado de Nacimiento<span> *</span></label>
								<div class="col-sm-12">
									<select class="form-control" id="EstadoNac" name="EstadoNac">
										@foreach($estados as $rol)
										@if($rol->cve_estado == '24')
										<option value="{{$rol->cve_estado}}" selected >{{$rol->descripción}}</option>
										@else
										<option value="{{$rol->cve_estado}}"  >{{$rol->descripción}}</option>
										@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class=" col-sm-6 col-12 form-group">
								<label for="Municipio" class="col-sm-6 control-label">Municipio de Nacimiento<span> *</span></label>
								<div class="col-sm-12">
									<select id="municipiosNac"class="form-control" name="MunicipioNac">
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-12 form-group">
								<label for="estadoCivil" class="col-sm-6 control-label">Estado Civil<span> *</span></label>
								<div class="col-sm-12">
									<select class="form-control" id="estadoCivil" name="estadoCivil">
										@foreach($estadoCivil as $rol)
											<option value="{{$rol->ID_estadoc}}"  >{{$rol->descripcion}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class=" col-sm-6 col-12 form-group">
								<label for="nivelAcademico" class="col-sm-6 control-label">Nivel Academico<span> *</span></label>
								<div class="col-sm-12">
									<select id="nivelAcademico"class="form-control" name="nivelAcademico">
										@foreach($nivelAcademico as $rol)
											<option value="{{$rol->id_nivelacademico}}"  >{{$rol->descripcion}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-3 control-label">Correo<span> *</span></label>
							<div class="col-sm-12">
								<input type="email" id="email" placeholder="Correo electronico" class="form-control" name= "email" required>
							</div>
						</div>
						<div class="form-group">
							<label for="Telefono" class="col-sm-3 control-label">Telefono<span> *</span></label>
							<div class="col-sm-12">
								<input type="phoneNumber" onkeypress="return soloNumeros(event)" name="Telefono" id="Telefono" maxlength="10" placeholder="Telefono" class="form-control" required>
								<span class="help-block">Telefono a 10 digitos</span>
							</div>
						</div>
						<h2>Domicilio</h2>
						<div class="form-group">
							<label for="Estado" class="col-sm-3 control-label">Estado<span> *</span></label>
							<div class="col-sm-12">
								<select class="form-control" id="Estado" name="Estado">
									@foreach($estados as $rol)
									@if($rol->cve_estado == '24')
									<option value="{{$rol->cve_estado}}" selected >{{$rol->descripción}}</option>
									@else
									<option value="{{$rol->cve_estado}}"  >{{$rol->descripción}}</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="Municipio" class="col-sm-3 control-label">Municipio<span> *</span></label>
							<div class="col-sm-12">
								<select id="municipios"class="form-control" name="Municipio">
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="select_colonia" class="col-sm-3 control-label">Colonia<span> *</span></label>
							<div class="col-sm-12">
								<select id="select_colonia"class="form-control" name="select_colonia">
									@foreach($colonias as $rol)
									<option value="{{$rol->catcol_id}}"  >{{$rol->descripcion}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="Colonia" class="col-sm-3 control-label">Colonia<span> *</span></label>
							<div class="col-sm-12">
								<input type="text" id="Colonia" name="Colonia" placeholder="Colonia" class="form-control" autofocus >
								<span class="help-block">Si no se encuentra en la lista</span>
							</div>
						</div>
						<div class="form-group">
							<label for="select_calle" class="col-sm-3 control-label">Calle<span> *</span></label>
							<div class="col-sm-12">
								<select id="select_calle"class="form-control" name="select_calle">
									@foreach($calles as $rol)
									<option value="{{$rol->catcalle_id}}"  >{{$rol->descripcion}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="Calle" class="col-sm-3 control-label">Calle<span> *</span></label>
							<div class="col-sm-12">
								<input type="text" id="Calle" name="Calle" placeholder="Calle" class="form-control" autofocus >
								<span class="help-block">Si no se encuentra en la lista</span>
							</div>
						</div>

						<div class="form-group">
							<label for="CP" class="col-sm-3 control-label">Codigo Postal<span> *</span></label>
							<div class="col-sm-12">
								<input type="text" id="CP" name="CP" min="1"  maxlength="5" onkeypress="return soloNumeros(event)" placeholder="CP" class="form-control" autofocus required>
							</div>
						</div>
						<div class="form-group">
							<label for="Interior" class="col-sm-3 control-label">Numero<span> *</span></label>
							<div class="row p-3">
								<div class="col-sm-6">
									<input type="text" id="Interior" name="Interior" placeholder="Interior" class="form-control" autofocus  >
								</div>
								<div class="col-sm-6">
									<input type="text" id="Exterior" name="Exterior" placeholder="Exterior" class="form-control" autofocus required >
								</div>
							</div>
						</div>
						<h2>Documentos</h2>
						<div class="form-group col">
							<label for="" class="col-sm-12 control-label">INE / Documento de Identificación oficial<span> *</span></label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" accept=".pdf"  name="INE" id="INE" required>
								<label class="custom-file-label" for="INE"  >Seleccionar archivo...</label>
							</div>
						</div>
						<div class="form-group col">
							<label for="Comprobante" class="col-sm-6 control-label">Comprobante de Domicilio<span> *</span></label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" accept=".pdf" name = "Comprobante" id="Comprobante" required>
								<label class="custom-file-label" for="Comprobante">Seleccionar archivo...</label>
							</div>
						</div>
						<div class="d-flex justify-content-center">
							<button type="submit" class="p-2 buttonSubmit" ><span>Registrar</span></button>
						</div>

					</form>
				</div>
				<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					<form action="{{ route('RegistroMoral') }}" method="POST" enctype="multipart/form-data" onsubmit="return validaPersonaMoral();" id="form-reg">
						{!! csrf_field() !!}
						<h2>Datos Generales</h2>
						<div class="form-group" id="FCurp">
							<label for="RFC" class="col-sm-3 control-label">RFC<span> *</span></label>
							<div class="col-sm-12">
								<input type="text"  oninput="validarInputRFC(this,'RFCResMoral')" placeholder="Ingrese su RFC" id="RFCMoral"  class="form-control" name="RFC" required >
								<pre class="resultado" id="RFCResMoral"></pre>
							</div>
						</div>
						<div class="form-group">
							<label for="razon_social" class="col-sm-3 control-label">Razon Social<span> *</span></label>
							<div class="col-sm-12">
								<input type="text" id="razon_social"  class="form-control" name="razon_social" placeholder="razon social" required>

							</div>
						</div>
						<div class="form-group">
							<label for="sector_id" class="col-sm-3 control-label">Sector Empresarial<span> *</span></label>
							<div class="col-sm-12">
								<select id="sector_id"class="form-control" name="sector_id" required>
									@foreach($sector as $sec)
									<option value="{{$sec->Id_sector}}"  >{{$sec->descripcion}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<h2>Domicilio Fiscal</h2>
						<div class="form-group">
							<label for="Estado" class="col-sm-3 control-label">Estado<span> *</span></label>
							<div class="col-sm-12">
								<select class="form-control" id="Estado2" name="Estado">
									@foreach($estados as $rol)
									@if($rol->cve_estado == '24')
									<option value="{{$rol->cve_estado}}" selected >{{$rol->descripción}}</option>
									@else
									<option value="{{$rol->cve_estado}}"  >{{$rol->descripción}}</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="Municipio" class="col-sm-3 control-label">Municipio<span> *</span></label>
							<div class="col-sm-12">
								<select id="municipios2"class="form-control" name="Municipio" required>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="select_colonia" class="col-sm-3 control-label">Colonia<span> *</span></label>
							<div class="col-sm-12">
								<select id="select_colonia"class="form-control" name="select_colonia">
									@foreach($colonias as $rol)
									<option value="{{$rol->catcol_id}}"  >{{$rol->descripcion}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="Colonia" class="col-sm-3 control-label">Colonia<span> *</span></label>
							<div class="col-sm-12">
								<input type="text" id="Colonia" name="Colonia" placeholder="Colonia" class="form-control" autofocus >
								<span class="help-block">Si no se encuentra en la lista</span>
							</div>
						</div>
						<div class="form-group">
							<label for="select_calle" class="col-sm-3 control-label">Calle<span> *</span></label>
							<div class="col-sm-12">
								<select id="select_calle"class="form-control" name="select_calle">
									@foreach($calles as $rol)
									<option value="{{$rol->catcalle_id}}"  >{{$rol->descripcion}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="Calle" class="col-sm-3 control-label">Calle<span> *</span></label>
							<div class="col-sm-12">
								<input type="text" id="Calle" name="Calle" placeholder="Calle" class="form-control" autofocus >
								<span class="help-block">Si no se encuentra en la lista</span>
							</div>
						</div>
						<div class="form-group">
							<label for="CP" class="col-sm-3 control-label">Codigo Postal<span> *</span></label>
							<div class="col-sm-12">
								<input type="text" id="CP" name="CP" min="1"  maxlength="5" onkeypress="return soloNumeros(event)"  placeholder="CP" class="form-control" autofocus required>
							</div>
						</div>
						<div class="form-group">
							<label for="Interior" class="col-sm-3 control-label">Numero<span> *</span></label>

							<div class="row p-3">
								<div class="col-sm-6">
									<input type="text" id="Interior" name="Interior" placeholder="Interior" class="form-control" autofocus >
								</div>
								<div class="col-sm-6">
									<input type="text" id="Exterior" name="Exterior" placeholder="Exterior" class="form-control" autofocus >
								</div>
							</div>
						</div>
						<h2>Datos Representante</h2>
						<div class="form-group" id="FCurp">
							<label for="CURP" class="col-sm-3 control-label">CURP<span> *</span></label>
							<div class="col-sm-12">
								<input type="text" id="curp_representante" oninput="validarInput(this, 'resultado2')" class="form-control" name="CURP_Rep" placeholder="CURP Representante" required>
								<pre id="resultado2" class="resultado"></pre>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 col-12  form-group">
								<label for="firstName" class="col-sm-12 control-label">Nombre<span> *</span></label>
								<div class="col-sm-12">
									<input type="text" id="firstName" name="nombre" placeholder="Nombre(s)" class="form-control" required >
								</div>
							</div>
							<div class="col-sm-4 col-12 form-group">
								<label for="APaterno" class="col-sm-12 control-label">A. Paterno<span> *</span></label>
								<div class="col-sm-12">
									<input type="text" id="APaterno" name="APaterno" placeholder="A. Paterno" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-4 col-12  form-group">
								<label for="AMaterno" class="col-sm-12 control-label">A. Materno</label>
								<div class="col-sm-12">
									<input type="text" id="AMaterno" name="AMaterno" placeholder="A. Materno" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group" id="FCurp">
							<label for="RFC" class="col-sm-3 control-label">RFC del Representante<span> *</span></label>
							<div class="col-sm-12">
								<input type="text"  oninput="validarInputRFC(this,'RFCRep')" placeholder="Ingrese su RFC" id="rfc_representante"  class="form-control" name="rfc_representante" required >
								<pre class="resultado" id="RFCRep"></pre>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 col-12  form-group">
								<label for="Telefono" class="col-sm-3 control-label">Telefono<span> *</span></label>
								<div class="col-sm-12">
									<input type="phoneNumber" onkeypress="return soloNumeros(event)" name="Telefono" id="Telefono" maxlength="10" placeholder="Telefono" class="form-control" required>
									<span class="help-block">Telefono a 10 digitos</span>
								</div>
							</div>
							<div class="col-sm-4 col-12 form-group">
								<label  for="FechaNac" class="col-sm-6 control-label">Fecha de Nacimiento<span> *</span></label>
								<div class="col-sm-12">
									<!-- <input type="date" id="FechaNac" name="FechaNac" class="form-control"  required> -->
									<input type="text" id="FechaNacRep" name="FechaNacRep" class="form-control" value=""  required>
									<script>
									$('#FechaNacRep').datepicker({
										uiLibrary: 'bootstrap4',
										format: "dd/mm/yyyy",
										autoclose: true,
									});
									</script>
								</div>
							</div>
							<div class="col-sm-4 col-12 form-group">
								<label for="genero" class="col-sm-3 control-label">Genero<span> *</span></label>
								<div class="col-sm-12">
									Masculino:
									<input type="radio" name="genero"  value="hombre" checked/> Femenino:
									<input type="radio" name="genero"  value="mujer"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-3 control-label">Correo<span> *</span></label>
							<div class="col-sm-12">
								<input type="email" id="email" placeholder="Correo electronico" class="form-control" name= "email" required>
							</div>
						</div>
						<h2>Documentos</h2>
						<div class="form-group col">
							<label for="INE" class="col-sm-12 control-label">INE / Documento de identidicación oficial<span> *</span></label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" accept=".pdf"  name="INE" id="INE" required>
								<label class="custom-file-label" for="INE"  >Seleccionar archivo...</label>
							</div>
						</div>
						<div class="form-group col">
							<label for="Comprobante" class="col-sm-6 control-label">Comprobante de Domicilio<span> *</span></label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" accept=".pdf" name = "Comprobante" id="Comprobante" required>
								<label class="custom-file-label" for="Comprobante">Seleccionar archivo...</label>
							</div>
						</div>
						<div class="form-group col">
							<label for="cartaConst" class="col-sm-6 control-label">Carta Constitutiva<span> *</span></label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" accept=".pdf" name = "cartaConst" id="cartaConst" required>
								<label class="custom-file-label" for="cartaConst">Seleccionar archivo...</label>
							</div>
						</div>
						<div class="d-flex justify-content-center">
							<button type="submit" class="p-2 buttonSubmit" ><span>Registrar</span></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{asset('js/custom.js')}}"></script>
@endsection
