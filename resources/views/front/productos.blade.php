@extends('front.header')
@section('content')

@include('front.menu')
@include('front.encabezado')



<div class="row np">
  <div class="col-md-6">
    <h1>PRODUCTOS</h1>
  </div>
</div>



				<!-- end: SPANEL CONFIGURATION MODAL FORM -->



					<!--  Tabla de consulta -->
					<div class="row">
						<div class="col-sm-12" id="panel-proceso">
							<!-- start: FORM WIZARD PANEL -->
							<div class="panel panel-default">

				<div class="panel-body proceso">




					<div class="row" style="margin: 5%;">
            <div class="col-md-1">

            </div>
						<div class="col-md-10">
              <div class="table-responsive">

  							 <table id="tableproductos" name= "tableproductos" class="table-striped dt-responsive nowrap" style="width: 100%; ">
                    <thead class="thead-light">
                     	<tr>

                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Empresa</th>
                              <th></th>
  										  <th>Imagen</th>
                        <th></th>
                       </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>

  							</div>
            </div>
					</div>
				</div>
			</div>
			<!-- end: FORM WIZARD PANEL -->
		</div>
	</div>




      <div class="modal fade" id="modalverproducto" tabindex="-1" role="dialog" aria-labelledby="modal-lici" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">



                 <div class="modal-header" style="background-color: #1c3150; color: #fff;">
                      <h3 class="modal-title text-white" style="margin-top:0px;">Información Empresa</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                      </button>
                 </div>
                 <div class="modal-body">
                      <div class="container">

                              <form action="" method="post" id="candvac">
                                @csrf
                                {{ csrf_field() }}

                                <div class="row " style="border-top: 1px solid #ddd; padding:2em;">

                                     <div class="form-group col-md-6">
                                           <p><strong>Nombre de producto:</strong></p>
                                           <input readonly type="text" name="nombre_e" id="nombre_e"  class="inoborder form-control"/>

                                     </div>
                                     <div class="form-group col-md-6">
                                           <p><strong>Nombre de marca:</strong></p>
                                           <input readonly type="text" name="marca_e" id="marca_e"  class="inoborder form-control"/>

                                     </div>

                                  </div>
                                   <div class="row " style="border-top: 1px solid #ddd; padding:2em;">

                                     <textarea name="desc_e" id="desc_e" rows="3" cols="80" class="form-control"></textarea>

                                   </div>
                                   <div class="row " style="border-top: 1px solid #ddd; padding:2em;">

                                        <div class="form-group col-md-6">
                                              <p><strong>Empresa:</strong></p>
                                              <input readonly type="text" name="nombre_e" id="nombre_e"  class="inoborder form-control"/>

                                        </div>
                                        <div class="form-group col-md-6">
                                              <p><strong>Logo:</strong></p>
                                              <img id="logo_e" name="logo_e" src="" alt="">

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
        <script src="{{asset('js/FunctionProductos.js')}}" type="text/javascript"></script>
@endsection
