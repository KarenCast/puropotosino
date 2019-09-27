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
									Alta de Contenido
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

									<h3>AGREGAR CONTENIDO<br>
	                 <small>REGISTRA AQUI CONTENIDO DE PURO-POTOSINO</small></h3>
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
									<form action="{{ route('contenido') }}" method="POST" enctype="multipart/form-data" role="form" class="smart-wizard form-horizontal" id="form">
										{!! csrf_field() !!}
                    <div class="form-group col-sm-3">
                      <label class="">
	    									Tipo<span class="symbol required"></span>
	    								</label>
                      <select class="form-control" name="tipo" id="tipo">
												@if($n==1)
                        <option value="0" id="re">Recetas</option>
												@endif
												@if($n==0)
                        <option value="1" id="tes">Testimonios</option>
                        <option value="2" id="tes">Video</option>
												@endif
                      </select>

      							</div>

                    <div class="form-group col-sm-9">
                        <label class="">
                            Titulo<span class="symbol required"></span>
                        </label><br>
                        <input type="text" name="nombre" id="nombre" value="" class="form-control">
                    </div>
                    <div class="form-group col-sm-8">
                        <label class="">
                            Descripción<span class="symbol required"></span>
														@if($n==0)
														<i>En caso de ser video, carga la URL en este campo</i>
														@endif
                        </label><br>
                        <textarea name="desc" id="desc" rows="8" cols="80" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="">
	    									Imagen descriptiva<span class="symbol required"></span>
	    								</label>
                      <input type="file" required class="form-control" id="imagen" name="imagen">
											<img  id='img-upload' style="height: auto; width: 100%;"/>

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
                    $('#img-upload').attr('src', e.target.result);
               }
               reader.readAsDataURL(input.files[0]);
          }
     }



     $("#imagen").change(function(){
          readURL(this);
     });


});
</script>

@endsection
