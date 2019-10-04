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
										Categorias
									</a>
								</li>

                <li class="active">
									Alta de categorias
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

										<h3>AGREGAR CATEGORIAS<br>
	                 		<small>REGISTRA AQUI LAS CATEGORÍAS DE PURO-POTOSINO</small>
								 		</h3>

								</div>
								<div class="panel-body proceso">
									<form action="{{ route('actualizaCategoria') }}" method="POST" enctype="multipart/form-data" role="form" class="smart-wizard form-horizontal" id="form">
										{!! csrf_field() !!}
										<input type="text" name="id" id="id" value="{{$cat->ID_categoria}}" style="display:none">
                    <div class="form-group col-sm-12">
                        <label class="">
                            Nombre<span class="symbol required"></span>
                        </label><br>
                        <input type="text" name="nombre" id="nombre" value="{{$cat->nombre}}" class="form-control">
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="">
                            Descripción<span class="symbol required"></span>
                        </label><br>
                        <textarea name="desc" id="desc" rows="8" cols="80" class="form-control">{{$cat->descripcion}}</textarea>
                    </div>
                    <div class="form-group col-sm-6">
                      <label class="">
	    									Imagen descriptiva de categoria<span class="symbol required"></span>
	    								</label>
                      <input type="file"  class="form-control" id="imagen" name="imagen">
											<img  id='fileimg' src="{{asset('categorias')}}/{{$carp}}/{{$cat->imagen}}" style="height: auto; width: 200px;"/>

      							</div>
                    <div class="form-group col-sm-6">
                      <label class="">
	    									Imagen (Titulo)<span class="symbol required"></span>
	    								</label>
                      <input type="file"  class="form-control" id="titulo" name="titulo">
											<img  id='tit' src="{{asset('categorias')}}/{{$carp}}/{{$cat->titulo}}" style="height: auto; width: 200px;"/>

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



     $("#imagen").change(function(){
          readURL(this);
     });


});
</script>


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
                    $('#tit').attr('src', e.target.result);
               }
               reader.readAsDataURL(input.files[0]);
          }
     }



     $("#titulo").change(function(){
          readURL(this);
     });


});
</script>

@endsection
