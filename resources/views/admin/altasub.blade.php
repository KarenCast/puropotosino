@extends('admin.main')
@section('content')

@php
	$nombreEdit = "";
	$descEdit = "";
	$fotoEdit = "";
	$catEdit = "";
	$idSubEdit = "";

	if(isset($subCat)){
		$nombreEdit = $subCat->nombre;
		$fotoEdit = '/subcategorias/'.str_replace(' ','',$subCat->nombre).'/'.$subCat->imagen;
		$descEdit = $subCat->descripcion;
		$catEdit = $subCat->ID_categoria;
		$idSubEdit = $subCat->ID_subcategoria;
	}

@endphp

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
							Sub-Categorias
						</a>
					</li>

					<li class="active">
						Alta de Categorias
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

				@if(isset($subCat))
					<h3>Editar SUB-CATEGORIAS<br>
				@else
					<h3>AGREGAR SUB-CATEGORIAS<br>
				@endif
					<small>REGISTRA AQUI LAS CATEGORÍAS DE PURO-POTOSINO</small></h3>
					<!-- <i class="fa fa-external-link-square"></i>
					Formulario de registro
					<div class="panel-tools">
					<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
				</a>

				<a class="btn btn-xs btn-link panel-refresh" href="#">
				<i class="fa fa-refresh"></i>
			</a>
			<a class="btn btn-xs btn-link panel-expand" href="#">
			<i class="fa fa-resize-full"></i>
		</a>

	</div> -->
</div>
<div class="panel-body proceso">
	<form action="{{ route('subcategorias') }}" method="POST" enctype="multipart/form-data" role="form" class="smart-wizard form-horizontal" id="form">
		{!! csrf_field() !!}
		@if(isset($subCat))
			<input type="hidden" name="idSubCat" value="{{$idSubEdit}}">
		@endif
		<div class="form-group col-sm-12">
			<label class="">
				Nombre<span class="symbol required"></span>
			</label><br>
		<input type="text" name="nombre" id="nombre" value="{{$nombreEdit}}" class="form-control">
		</div>
		<div class="form-group col-sm-12">
			<label class="">
				Descripción<span class="symbol required"></span>
			</label><br>
		<textarea name="desc" id="desc" rows="8" cols="80" class="form-control">{{$descEdit}}</textarea>
		</div>
		<div class="form-group col-sm-6">
			<label class="">
				Imagen descriptiva de categoria<span class="symbol required"></span>
			</label>
			
			<input type="file" @if($fotoEdit == '') required @endif class="form-control" value="{{$fotoEdit}} " id="imagen" name="imagen">
		<img  id='img-upload' src="{{$fotoEdit}}" style="height: auto; width: 200px;"/>

		</div>
		<div class="form-group col-sm-6">
			<label class="">
				Categoría Padre<span class="symbol required"></span>
			</label>
			<select class="form-control" id="id_p" name="id_p">
				@foreach($categorias as $rol)
					@if($rol->ID_categoria == $catEdit)
						<option selected value="{{$rol->ID_categoria}}" >{{$rol->nombre}}</option>
					@else
						<option value="{{$rol->ID_categoria}}" >{{$rol->nombre}}</option>
					@endif
				@endforeach
			</select>

		</div>
		<div class="form-group col-sm-12">
			<input type="submit" name="" value="Guardar" class="btn" style="float: right">
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
