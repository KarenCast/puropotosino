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
									Alta Producto
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

									<h3>ALTA DE PRODUCTOS<br>
	                 <small>Registra los productos que ofreces<br>
									 </small></h3>
								</div>
								<div class="panel-body proceso">
									<form action="{{ route('producto') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form" class="row">
									  {!! csrf_field() !!}
									  <h4>Información general de producto</h4>
										<h5 style="text-align: center"><strong>IMPORTANTE: </strong>Imagenes para su posterior edición por parte del equipo de SIDEP</h5>
									  <hr width="100%" color="black"/>

									  <div class="form-group col-sm-12">
									    <label class="">
									      Nombre de Producto<span class="symbol required"></span>
									    </label>
									    <input required type="text" required class="form-control" id="nombre" name="nombre" placeholder="" onkeyup="mayus(this);">
									  </div>
									  <div class="form-group col-sm-6">
									    <label class="">
									      Tabla nutricional (Si es alimento)
									    </label>
									    <input type="file" class="form-control" accept="application/pdf" id="tabla" name="tabla" placeholder="">
									  </div>
                    <div class="form-group col-sm-6">
									    <label class="">
									      Selecciona la marca a la cuál pertenece<span class="symbol required"></span>
									    </label>
                      <select required class="form-control" id="marca" name="marca">
												@foreach($marcas as $rol)
                          <option value="{{$rol->ID_marca}}" >{{$rol->nombre_marca}}</option>
												@endforeach
											</select>
									  </div>
                    <div class="form-group col-sm-9">
									    <label class="">
									      Descripción (140 caracteres)<span class="symbol required"></span>
									    </label>
									    <textarea class="form-control" name="descripcion" id="descripcion" rows="3" cols="80" onkeyup="countChars(this);" maxlength="140"></textarea>
											<p id="charNum">0 caracteres</p>
									  </div>
                    <div class="form-group col-sm-3">
									    <label class="">
									      Imagen de producto<span class="symbol required"></span>	<br>
												<i>IMPORTANTE: Imagen clara del producto, tomada en fondo blanco.</i>
									    </label>
                      <input type="file" required class="form-control" id="imagen" name="imagen">
											<img  id='fileimg' style="height: auto; width: 200px;"/>
									  </div>


									  <div class="form-group col-sm-6">
									    <input type="submit" name="enviar" value="Registrar" class="btn btn-primary">
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
function countChars(obj){
	var maxLength = 140;
	var strLength = obj.value.length;
	var charRemain = (maxLength - strLength);

	if(charRemain < 0){
			document.getElementById("charNum").innerHTML = '<span style="color: red;">Has excedido la longitud de '+maxLength+' caracteres</span>';
	}else{
			document.getElementById("charNum").innerHTML = charRemain+' caracteres restantes';
	}
}
</script>

@endsection
