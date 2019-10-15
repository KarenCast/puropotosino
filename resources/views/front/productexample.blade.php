@extends('front.header')
@section('content')

@include('front.menu')
@include('front.encabezado')
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('product/fonts/icomoon/style.css')}} ">

    <link rel="stylesheet" href="{{asset('product/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('product/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('product/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('product/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('product/css/owl.theme.default.min.css')}}">


    <link rel="stylesheet" href="{{asset('product/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('product/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('eiser/style.css')}}">
  </head>
  <style media="screen">
    .navbar-light .navbar-nav .nav-link{
      color: white!important;
    }


  </style>
    <div class="row np">
      <div class="col-md-6">
        <h1>PRODUCTOS</h1>
      </div>
    </div>
  <div class="site-wrap">





    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-lg-9 order-2 order-lg-1">

            <div class="row align">
              <div class="col-md-12 mb-5">

                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">
                    <button type="button" class="btn btn-white btn-sm dropdown-toggle px-4" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      ÚLTIMOS
                    </button>

                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-white btn-sm dropdown-toggle px-4" id="dropdownMenuReference" data-toggle="dropdown">
                      Nombre
                    </button>

                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-5">
              <div class="products-wrap border-top-0">
  <div class="container-fluid">
    <div class="row no-gutters products">

      @foreach($prod as $r)
      <div class="col-6 col-md-4 col-lg-4 border-top">
        <div class="single-product">
                    <div class="product-img item">
                      <img
                        class="card-img img-fluid"
                        src="{{asset('Files')}}/{{$r->ID_empresa}}/Productos/{{$r->imagen}}"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="far fa-eye"></i>
                        </a>

                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>{{$r->nombre}}</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">{{$r->nombre_marca}}</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
      </div>
      @endforeach
      <!-- <div class="col-6 col-md-4 col-lg-4 border-top">
        <div class="single-product">
                    <div class="product-img item">
                      <img
                        class="card-img img-fluid"
                        src="{{asset('product/images/product_2.jpg')}}"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>Latest men’s sneaker</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$25.00</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
      </div>
      <div class="col-6 col-md-4 col-lg-4">
        <div class="single-product">
                    <div class="product-img item">
                      <img
                        class="card-img img-fluid"
                        src="{{asset('product/images/product_2.jpg')}}"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>Latest men’s sneaker</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$25.00</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
      </div>

      <div class="col-6 col-md-4 col-lg-4">
        <div class="single-product">
                    <div class="product-img item">
                      <img
                        class="card-img img-fluid"
                        src="{{asset('product/images/product_2.jpg')}}"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>Latest men’s sneaker</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$25.00</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
      </div>
      <div class="col-6 col-md-4 col-lg-4">
        <div class="single-product">
                    <div class="product-img item">
                      <img
                        class="card-img img-fluid"
                        src="{{asset('product/images/product_2.jpg')}}"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>Latest men’s sneaker</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$25.00</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
      </div>
      <div class="col-6 col-md-4 col-lg-4">
        <div class="single-product">
                    <div class="product-img item">
                      <img
                        class="card-img img-fluid"
                        src="{{asset('product/images/product_2.jpg')}}"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>Latest men’s sneaker</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$25.00</span>
                        <del>$35.00</del>
                      </div>
                    </div>
                  </div>
      </div> -->

    </div>
  </div>
</div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 order-1 order-lg-2 mb-5 mb-lg-0">
            <div class="border p-4 mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categorias</h3>
              <ul class="list-unstyled mb-0">
                @foreach($cat as $rol)
                <li class="mb-1"><a href="#" class="d-flex"><span>{{$rol->nombre}}</span> <span class="text-black ml-auto">{{$number[$rol->ID_categoria]}}</span></a></li>
                <!-- <li class="mb-1"><a href="#" class="d-flex"><span>Women</span> <span class="text-black ml-auto">(2,550)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Children</span> <span class="text-black ml-auto">(2,124)</span></a></li>
                 -->
                 @endforeach
              </ul>
            </div>

            <div class="border p-4 mb-4">


              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
                <label for="s_sm" class="d-flex">
                  <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Small (2,319)</span>
                </label>
                <label for="s_md" class="d-flex">
                  <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medium (1,282)</span>
                </label>
                <label for="s_lg" class="d-flex">
                  <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Large (1,392)</span>
                </label>
              </div>

              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red (2,429)</span>
                </a>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green (2,298)</span>
                </a>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue (1,075)</span>
                </a>
                <a href="#" class="d-flex color-item align-items-center" >
                  <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple (1,075)</span>
                </a>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">The Collections</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">

              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="{{asset('product/images/product_1.jpg')}}" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The Shoe</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <span class="tag">Sale</span>
                  <img src="{{asset('product/images/product_2.jpg')}}" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>Marc Jacobs Bag</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50 <del>$30.00</del></strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="{{asset('product/images/product_3.jpg')}}" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The  Belt</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="{{asset('product/images/product_1.jpg')}}" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The Shoe</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <span class="tag">Sale</span>
                  <img src="{{asset('product/images/product_2.jpg')}}" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>Marc Jacobs Bag</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50 <del>$30.00</del></strong>
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="shop-single.html" class="item">
                  <img src="{{asset('product/images/product_3.jpg')}}" alt="Image" class="img-fluid">
                  <div class="item-info">
                    <h3>The  Belt</h3>
                    <span class="collection d-block">Summer Collection</span>
                    <strong class="price">$9.50</strong>
                  </div>
                </a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


  </div>


  <div class="" id="resultado">

  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!--<![endif]-->

  <script src="{{asset('assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js')}}"></script>
  <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}"></script>
  <script src="{{asset('assets/plugins/blockUI/jquery.blockUI.js')}}"></script>
  <script src="{{asset('assets/plugins/iCheck/jquery.icheck.min.js')}}"></script>
  <script src="{{asset('assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js')}}"></script>
  <script src="{{asset('assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js')}}"></script>
  <script src="{{asset('assets/plugins/less/less-1.5.0.min.js')}}"></script>
  <script src="{{asset('assets/plugins/jquery-cookie/jquery.cookie.js')}}"></script>

  <script src="{{asset('js/ejemplo.js')}}"></script>
  <script src="{{asset('product/js/popper.min.js')}}"></script>
  <script src="{{asset('product/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('product/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('product/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('product/js/aos.js')}}"></script>

  <!-- <script src="{{asset('product/js/main.js')}}"></script> -->

  @endsection
