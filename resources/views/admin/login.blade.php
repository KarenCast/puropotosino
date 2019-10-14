@extends('front.header')
@section('content')

@include('front.menu')
@include('front.encabezado')

<div class="main-content">
				<!-- start: PANEL CONFIGURATION MODAL FORM -->

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
				  @if(session('info')!== null)
				  <div class="alert alert-info alert-dismissible fade show" role="alert">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				      <span aria-hidden="true">&times;</span>
				    </button>
				    <strong>Registro exitoso!</strong> {{{session('info')}}}
				  </div>
				  @endif
					<div class="row justify-content-right pt-3 pb-3 " style="margin-top: 0px;">
				    <div class="col-12" style="text-align: right;">
				      <!-- <a href="#ModalLogin" data-toggle="modal" ><img style="float: right;"  src="{{asset('images/ingresar.png')}}"></a> -->
				    </div>
				  </div>
					<div class="row titulo2 justify-content-center">
						<div class="col-8 line">

						</div>
					</div>






          <div class="row admin" style="margin-top: 50px;">


					</div>
					<div class="row">
						<div class="col-md-12" >

									<div class="row">

										<div class="col-md-5 loginE" style="margin: auto; ">
											<div class="row">
												<div class="col-md-12">
													<h2 style="text-align:center" id="titulo-admin">ACCESO ADMINISTRADOR DE PUROPOTOSINO</h2>
													<br><br><br>
												</div>
											</div>
											<div class="row login">
												<form action="{{route('LogInA')}}" method="post" id="login" style="width: 100%; margin-bottom: 2em;">
													{!! csrf_field() !!}
													<div class="form-group" style="display: none;">
													 <input type="text" class="form-control" name="tipoinicio" placeholder="Tipo" value="admin" readonly required="required">
												 </div>
													<div class="form-group">
														<label for="username">RUE:</label>
														<input type="text" class="form-control loginE" name="username" placeholder="" required="required">
													</div>
													<div class="form-group">
														<label for="username">Contraseña:</label>
														<input type="password" class="form-control loginE" name="password" placeholder="" required="required">
													</div>
													<div class="form-group">
														<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Entrar</button>
													</div>
												</form>
												<form action="{{route('RecuperaC')}}" method="post" id="recuperar" style="display: none;">
													{!! csrf_field() !!}
													<button type="button" class="close" onclick="login();" aria-hidden="true">&times;</button>
													<div class="form-group">
														<label for="email">Correo: </label>
														<input type="email" class="form-control loginE" name="email" placeholder="" required="required">
													</div>

													<div class="form-group">
														<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Enviar</button>
														<!-- <button type="button" class="btn btn-primary btn-lg btn-block login-btn" onclick="login();">Iniciar Sesion</button> -->
													</div>
												</form>
											</div>

											<div class="row justify-content-center">

												<div class="col-12 reg" style="margin-bottom: 50px;">

													<a  onclick="olvidepass();">
														Olvide mi contraseña.

													</a>
												</div>
											</div>
										</div>
									</div>


						</div>
					</div>





					<!-- end: PAGE CONTENT-->
				</div>
			</div>







			<script src="{{asset('Plugins/jquery/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="{{asset('Plugins/DataTable/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('Plugins/DataTable/js/dataTables.responsive.min.js')}}">  </script>


				<script type="text/javascript">
					function olvidepass()
					{
					  $(".modal-title").html("Recuperar Contraseña");
					  $('#recuperar').show();
					  $("#login").hide();
					}

					function login()
					{
					  $(".modal-title").html("Iniciar Sesion");
					  $('#recuperar').hide();
					  $("#login").show();
					}
				</script>
      @endsection
