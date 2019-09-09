@extends('User.main')
@section('content')

<div class="main-content">

				<div class="container">
          @if(session('Error')!== null)
          <div class="alert alert-danger alert-dismissible show" role="alert">
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
									ESTATUS
								</li>

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
												<a href="{{url('/LogOutbt')}}">
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
									<form action="" method="POST" enctype="multipart/form-data" role="form" class="smart-wizard form-horizontal" id="form">
										{!! csrf_field() !!}
										<div id="wizard" class="swMain">
                      <ul>
												<li>
													<a href="#step-0">
														<div class="stepNumber">
															<p><strong>0</strong></p>
														</div>
														<span class="stepDesc">

															<small>Pre-registro</small> </span>
													</a>
												</li>
												<li>
													<a href="#step-1">
														<div class="stepNumber">
															<p><strong>1</strong></p>
														</div>
														<span class="stepDesc">
															<small>Idea de negocio</small> </span>
													</a>
												</li>
												<li>
													<a href="#step-2">
														<div class="stepNumber">
																<p><strong>2</strong></p>
														</div>
														<span class="stepDesc">

															<small>Dar de alta en SHCP</small> </span>
													</a>
												</li>
												<li>
													<a href="#step-3">
														<div class="stepNumber">
																<p><strong>3</strong></p>
														</div>
														<span class="stepDesc">

															<small>Imagen de Negocio</small> </span>
													</a>
												</li>
												<li>
													<a href="#step-4">
														<div class="stepNumber">
																<p><strong>4</strong></p>
														</div>
														<span class="stepDesc">

															<small>Comercializa</small> </span>
													</a>
												</li>
												<li>
													<a href="#step-5">
														<div class="stepNumber">
																<p><strong>5</strong></p>
														</div>
														<span class="stepDesc">

															<small>Exporta y promocionate</small> </span>
													</a>
												</li>
												<li>
													<a href="#step-6">
														<div class="stepNumber">
																<p><strong>5</strong></p>
														</div>
														<span class="stepDesc">

															<small>Evoluciona tú negocio</small> </span>
													</a>
												</li>


											</ul>
											<!-- <div class="progress progress-striped active progress-sm">
												<div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar progress-bar-success step-bar">
													<span class="sr-only"> 0% Complete (success)</span>
												</div>
											</div> -->
											<div class="row justify-content-center" id="step-0">
												<div class="col-md-1">

												</div>
													<div class="col-md-10">
														<h3>Tu información esta siendo revisada</h3>
														<h4>Para pasar a la fase 1, solo necesitas contar con un INE y comprobante de domicilio validos.</h4>
														<br>
														<h4><strong>Importante: <br>Revisa tú correo para cualquier observación y poder continuar en el proceso.</strong></h4>
													</div>
											</div>
											<div class="row justify-align-center" id="step-1">


											</div>
											<div id="step-2">

											</div>
											<div id="step-3">

											</div>
											<div id="step-4">

											</div>
											<div id="step-5">

											</div>

												<div class="row">
													<button type="button" class="btn" name="button">Ver mi información</button>
												</div>
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


@endsection
