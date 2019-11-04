<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{asset('images/logo.png')}}">

  <!-- Hojas de estilo -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <link href="https://fonts.googleapis.com/css?family=Heebo:300,400,500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('Plugins/DataTable/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('Plugins/DataTable/css/responsive.bootstrap4.min.css')}}">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="https://unpkg.com/scrollreveal@4"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="{{asset('Plugins/DataTable/js/jquery.dataTables.min.js')}}"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('js/efectos.js')}}" type="text/javascript"></script>


  <title>Puro Potosino</title>
</head>
<body>

  <div class="container-fluid">

    @yield('content')
  </div>

  <!-- <div class="fondo"></div> -->
  <footer>
    <footer>
    <div class="row justify-content-center piec1">
      <div class="col-md-6" style="text-align: right; border-right: 3px solid #fff;padding: 0px 100px 0px 0px;">
        <img src="{{asset('images/LOGOADMINBLANCO.png')}}" alt="" id="logofoot">
      </div>
      <div class="col-md-6 mt-4" style="padding: 0px 0px 0px 100px;">
        <h4 style="color: white;">CONTACTO</h4>
        <p style="color: white;">
        DIRECCIÓN DE DESARROLLO ECONÓMICO<br>
        TEL. 01 (444) 8.34.54.86<br>
        desarrollo.economico@sanluis.gob.mx<br>
        <a href="https://sitio.sanluis.gob.mx/puropotosino/Login-admin" style="font-size: 12px; color: white;">Administra SIDEP</a>
        </p>
      </div>
    </div>
    <div class="row justify-content-center piec2">
      <p>
        UNIDAD ADMINISTRATIVA MUNICIPAL<br>
        BLVD. SALVADOR NAVA MARTÍNEZ 1580, COL. SANTUARIO, C.P. 78380, SAN LUIS POTOSÍ, S.L.P., MÉXICO
      </p>
    </div>


  </footer>

  </footer>

</body>
</html>
