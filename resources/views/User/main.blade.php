<!DOCTYPE html>

<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>SIDEP</title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="{{asset('images/logo.png')}}">
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->

		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  	<script src="{{asset('Plugins/jquery/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
		<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
	  <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/fonts/style.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/main-responsive.css')}}">
		<link rel="stylesheet" href="{{asset('assets/plugins/iCheck/skins/all.css')}}">
		<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css')}}">
		<link rel="stylesheet" href="{{asset('assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/theme_light.css')}}"  type="text/css" id="skin_color">
		<link rel="stylesheet" href="{{asset('assets/css/print.css')}}" type="text/css" media="print">
		<link rel="stylesheet" href="{{asset('Plugins/DataTable/css/dataTables.bootstrap4.min.css')}}">
		<link rel="stylesheet" href="{{asset('Plugins/DataTable/css/responsive.bootstrap4.min.css')}}">

		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link rel="shortcut icon" href="favicon.ico" />
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
		<!-- start: HEADER -->
		@if(!session('log'))
  		<script>window.location="/";</script>
  	@endif
		<div class="navbar navbar-inverse navbar-fixed-top">
			<!-- start: TOP NAVIGATION CONTAINER -->
			<div class="container">
				<div class="navbar-header">
					<!-- start: RESPONSIVE MENU TOGGLER -->
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="clip-list-2"></span>
					</button>
					<!-- end: RESPONSIVE MENU TOGGLER -->
					<!-- start: LOGO -->
					<!-- <a class="navbar-brand" href="index.html">
						<img src="{{asset('assets/images/vud2.png')}}" alt="" id="icono">
					</a> -->
					<div class="title" style="margin-top: 2em;">
						<h1 id="bienvenida"></h1>
					</div>
					<!-- end: LOGO -->
				</div>


			</div>
			<!-- end: TOP NAVIGATION CONTAINER -->
		</div>
    <div class="main-container">

			@include('User.sidebar')

			@yield('content')



		</div>
		<div class="footer justify-content-center" style="text-align: center">
		  <div class="row justify-content-center" style="text-align: center">
		    <p style="align: center">2019 &copy; H. Ayuntamiento de San Luis Potosí. </p>
		  </div>
		  <div class="footer-items">
		    <span class="go-top" id="up-button"><i class="clip-chevron-up"></i></span>
		  </div>
		</div>
<!-- end: FOOTER -->
<!-- start: MAIN JAVASCRIPTS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!--<![endif]-->
<script type="text/javascript">
function mayus(e) {
  e.value = e.value.toUpperCase();
}
</script>
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{asset('assets/plugins/blockUI/jquery.blockUI.js')}}"></script>
<script src="{{asset('assets/plugins/iCheck/jquery.icheck.min.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/plugins/less/less-1.5.0.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-cookie/jquery.cookie.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>



<script src="{{asset('Plugins/DataTable/js/jquery.dataTables.min.js')}}"></script>



<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="{{asset('assets/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<!-- <script src="{{asset('assets/plugins/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>
<script src="{{asset('assets/js/form-wizard.js')}}"></script> -->
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

<!-- <script src="{{asset('js/validar.js')}}"></script> -->



<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script>
  jQuery(document).ready(function() {
    Main.init();

		document.querySelector('#bienvenida').innerText = 'BIENVENIDO A SIDEP';

  });
</script>

</body>
<!-- end: BODY -->
</html>
