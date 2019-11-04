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
									Etapas
								</li>
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

							</div>
						</div>
					</div>
					<!-- end: PAGE HEADER -->

					<!-- start: PAGE CONTENT -->
					<div class="row">
						<div class="col-sm-12" id="panel-proceso">
							<!-- start: FORM WIZARD PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading	" style="padding-bottom: 10%;">
									<h3>ETAPAS<br>
	                <small>Diagrama de etapas de SIDEP</small></h3>
								</div>
								<div class="panel-body proceso">
                  <img src="{{asset('images/camino.jpg')}}" alt="" width="100%" height="auto">
								</div>
							</div>
						</div>
					</div>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>


@endsection
