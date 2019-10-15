@extends('admin.main')
@section('content')


<div class="main-content">

				<!-- end: SPANEL CONFIGURATION MODAL FORM -->
				<div class="container">
					@if(session('Error')!== null)
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
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
									Mis Productos
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

					<!--  Tabla de consulta -->
					<div class="row">
						<div class="col-sm-12" id="panel-proceso">
							<!-- start: FORM WIZARD PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading	" style="padding-bottom: 10%;">

										<h3>TUS PRODUCTOS<br>
	                 <small>AQUI PUEDES ENCONTRAR EL HISTORIAL DE TUS PRODUCTOS</small></h3>

								</div>
				<div class="panel-body proceso">




					<div class="row">
						<div class="table-responsive">
              <input type="text" id="id_empresa" name="id_empresa" value="{{$n}}" style="display: none">
							 <table id="tableproductope" name= "tableproductope" class="table-striped dt-responsive nowrap" style="width: 100%; ">
                  <thead class="thead-light">
                   	<tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Marca</th>
											<th></th>
											<th>Imagen</th>
											<th>Editar</th>
                     </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>

							</div>
					</div>
				</div>
			</div>
			<!-- end: FORM WIZARD PANEL -->
		</div>
	</div>

        </div>
      </div>




      <div class="modal fade" id="modalverproducto" tabindex="-1" role="dialog" aria-labelledby="modal-lici" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">



                 <div class="modal-header" style="background-color: #1c3150; color: #fff;">
                   <input readonly type="text" name="nombre_e" id="nombre_e"  class="inoborder form-control" style="width: 70%;background-color: rgba(254, 254, 254, 0); color: #fff; font-size:22px;"/>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                      </button>
                 </div>
                 <div class="modal-body">
                      <div class="container">

                              <form action="{{ route('imagenproducto') }}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal"  name="form" class="row" id="candvac">
                                @csrf
                                {{ csrf_field() }}
																<input type="text" name="idempresa" id="idempresa" value="{{$n}}" style="display:none">
																<input type="text" name="id" id="id" value="" style="display:none">
                                <div class="row " style="border-top: 1px solid #ddd; padding:2em;">
                                      <div class="form-group col-md-12" style="text-align:center">
                                        <img src="" name="img_e" id="img_e" alt="" width="60%">
                                      </div>
																			<div class="col-md-12">
																				<p><strong>Carga imagen editada que se mostrará a los usuarios a partir de etapa 5:</strong></p>
																			</div>
																			<div class="form-group col-md-8">

																				<input type="file" required class="form-control" name="nuevaimagen" id="nuevaimagen" value="" style="padding:5px;">

																			</div>
																			<div class="form-group col-md-4">
																				<input type="submit" name="save" value="Guardar" class="form-control btn btn-primary">
																			</div>
                                      <div class="form-group col-md-12">
                                            <p><strong>Descripción:</strong></p>
                                            <textarea name="desc_e" id="desc_e" rows="3" cols="80" class="form-control" readonly style="border:none"></textarea>
                                      </div>
                                     <div class="form-group col-md-6">
                                           <p><strong>Marca registrada:</strong></p>
                                           <input readonly type="text" name="marca_e" id="marca_e"  class="inoborder form-control"/>

                                     </div>
																		 <div class="form-group col-md-6">
                                         <p><strong>Tabla Nutricional:</strong></p>
	                                       <a id="tabla" name="tabla" href="" class="form-control inoborder" readonly>
	                                        	Consulta la tabla nutricional <i class="fas fa-link"></i>
	                                        </a>
                                     </div>

                                  </div>




                            </div>
                            <div class="row justify-content-center">
                              <div class="col-md-4">

                              </div>
                              <!-- <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-block login-btn aplicar">Visualizar Candidatos</button>
                              </div> -->
                            </div>
                          </form>
                       </div>
                       <div class="modal-footer">
                        <div class="row justify-content-center">



                        </div>

                      </div>

                  </div>
             </div>
        </div>
<!-- <script src="{{asset('js/validar.js')}}">  </script> -->
<script src="{{asset('js/Functionproductope.js')}}" type="text/javascript"></script>
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
                    $('#img_e').attr('src', e.target.result);
               }
               reader.readAsDataURL(input.files[0]);
          }
     }



     $("#nuevaimagen").change(function(){
          readURL(this);
     });


});
</script>
@endsection
