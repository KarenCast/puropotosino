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
                        Empresa
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

                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <!-- end: PAGE HEADER -->
        <!-- start: PAGE CONTENT -->
        <div class="row" style="margin-top: 1rem">
            <div class="col-sm-12">

                <!-- start: FORM WIZARD PANEL -->
                <div class="panel panel-default">
                    <div class="panel-heading	" style="padding-bottom: 10%;">
                        <h3>INFORMACIÓN DE MI EMPRESA<br>
                            <small></small></h3>
                    </div>
                    <div class="panel-body proceso">
                        <form action="{{route('updatePerfil')}}" method="POST" enctype="multipart/form-data" role="form" class="row smart-wizard form-horizontal" id="form" name="form" class="row">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-5">
                                <label class="">
                                    TIPO DE PERSONA<span class="symbol required"></span>
                                </label><br>
                                @if( $empresa->fisica == false)
                                <h4>PERSONA MORAL</h4>
                            </div>
                            <div class="form-group col-sm-4">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="">
                                    RAZÓN SOCIAL<span class="symbol required"></span>
                                </label><br>
                                <h4> {{$empresa->usrMoral->razonsocial}}</h4>
                                @else
                                <h4>PERSONA FÍSICA</h4>
                            </div>
                            <div class="form-group col-sm-3">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="">
                                    NOMBRE<span class="symbol required"></span>
                                </label><br>
                                <h4> {{$empresa->usrFisica->nombre}} {{$empresa->usrFisica->apellido_paterno}} {{$empresa->usrFisica->apellido_materno}} </h4>

                                @endif
                            </div>

                            <h4>Información general de negocio</h4>
                            <hr width="100%" color="black" />

                            <div class="form-group col-sm-12" id="fechaope">
                                <label class="">
                                    <p>Razon Social<span class="symbol required"></span></p>
                                </label><br>
                                <input type="text" required class="form-control" id="razon_social" name="razon_social" placeholder="" value="{{$empresa->razon_social}}">
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="">
                                    Idea de negocio<span class="symbol required"></span>
                                </label><br>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3" cols="100%">{{$empresa->descripcion}}</textarea>
                            </div>

                            @if($empresa->tiempo_operacion!=null)
                            <div class="form-group col-sm-12" id="fechaope">
                                <label class="">
                                    <p>Fecha en que comenzó a estar en operación<span class="symbol required"></span></p>
                                </label><br>
                                <input type="date" required class="form-control" id="operacion" name="operacion" placeholder="" value="{{$empresa->tiempo_operacion}}">
                            </div>
                            @endif

                            <h4>Información de contacto</h4>
                            <hr width="100%" color="black" />
                            <div class="form-group col-sm-4">
                                <label class="">
                                    Nombre<span class="symbol required"></span>
                                </label>
                                <input type="text" value="{{$empresa->contacto->nombre}}" required class="form-control" id="nombre" name="nombre" placeholder="">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="">
                                    Apellido paterno<span class="symbol required"></span>
                                </label>
                                <input type="text" value="{{$empresa->contacto->APaterno}}" required class="form-control" id="APaterno" name="APaterno" placeholder="">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="">
                                    Apellido materno<span class="symbol required"></span>
                                </label>
                                <input type="text" value="{{$empresa->contacto->AMaterno}}" required class="form-control" id="AMaterno" name="AMaterno" placeholder="">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="">
                                    Correo Electrónico<span class="symbol required"></span>
                                </label>
                                <input type="email" value="{{$empresa->contacto->correo_electronico}}" required class="form-control" id="correo_electronico" name="correo_electronico" placeholder="">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="">
                                    Teléfono<span class="symbol required"></span>
                                </label>
                                <input type="text" value="{{$empresa->contacto->telefono}}" required class="form-control" id="telefono" name="telefono" placeholder="">
                                <script>
                                    jQuery(function($) {
                                        $('#telefono').mask("(999) 999-99-99");
                                    });

                                </script>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="">
                                    Celular<span class="symbol required"></span>
                                </label>
                                <input type="text" value="{{$empresa->contacto->celular}}" required class="form-control" id="celular" name="celular" placeholder="">
                                <script>
                                    jQuery(function($) {
                                        $('#celular').mask("(999) 999-99-99");
                                    });

                                </script>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="">
                                    Dirección<span class="symbol required"></span>
                                </label>
                                <input type="text" value="{{$empresa->contacto->direccion}}" required class="form-control" id="direccion" name="direccion" placeholder="">
                            </div>

                            <h4>Información SIDEP</h4>
                            <hr width="100%" color="black" />

                            <div class="form-group col-sm-6" id="tipo_regimen">
                                <label class="">
                                    Regimen de alta en DHCP<span class="symbol required"></span>
                                </label>
                                <select class="form-control" name="regimen" id="regimen" onchange="regimen2();">
                                    <option {{$empresa->regimen == 'RIF (Regimen de incorporación fiscal)'? 'selected':'' }} value="RIF (Regimen de incorporación fiscal)">RIF (Regimen de incorporación fiscal)</option>
                                    <option {{$empresa->regimen == 'SAS (Sociedad de acciones simplificadas)' ? 'selected':''}} value="SAS (Sociedad de acciones simplificadas)">SAS (Sociedad de acciones simplificadas)</option>
                                    <option {{$empresa->regimen == 'Persona física con actividad empresarial' ? 'selected':''}} value="Persona física con actividad empresarial">Persona física con actividad empresarial</option>
                                    <option {{$empresa->regimen == 'S.A. de C.V.' ? 'selected':''}} value="S.A. de C.V.">S.A. de C.V.</option>
                                    <option {{$empresa->regimen == 'otro' ? 'selected':''}} value="otro">Otro</option>
                                </select>

                                <label for="" id="esp" style="display: none">Especifica el regimen</label>
                                <input class="form-control" type="text" name="tipo_regimen22" id="tipo_regimen22" value="" style="display: none;">
                            </div>

                            <div class="form-group col-sm-6" id="tipo_incu" style="">
                                <label class="">
                                    Tipo de incubación<span class="symbol required"></span>
                                </label>
                                <select class="form-control" name="tipoincu" id="tipoincu" onchange="incubacion2();">
                                    <option {{$empresa->tipo_incubacion == 'Curso de innovación y emprendimiento'? 'selected':'' }} value="Curso de innovación y emprendimiento">Curso de innovación y emprendimiento</option>
                                    <option {{$empresa->tipo_incubacion == 'Academia SIFIDE'? 'selected':'' }} value="Academia SIFIDE">Academia SIFIDE</option>
                                    <option {{$empresa->tipo_incubacion == 'otro'? 'selected':'' }} value="otro">Otro</option>
                                </select>
                                <label for="" id="esp2" style="display:none">Especifica</label>
                                <input class="form-control" type="text" name="tipoincu2" id="tipoincu2" value="" style="display:none">
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="">
                                    <h4>Documentación con la que cuenta <span class="symbol required"></span></h4> <br>
                                </label>

                                <div class=" form-group">
                                    <label for="bases" class="col-sm-12 control-label">Comprobante de incubación<span style="color: red">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" accept=".pdf" value="" name="comprobante_incubacion" id="comprobante_incubacion" aria-describedby="vercomprobante_incubacion">
                                        @if($empresa->comprobante_incubacion!=null)
                                        <small id="vercomprobante_incubacion" class="form-text text-muted">
                                            <a target="_blank" href="{{asset('storage/Files/'.$empresa->ID_empresa.'/'.$empresa->comprobante_incubacion)}}">Ver Documento actual</a>
                                        </small>
                                        @endif

                                    </div>
                                </div>

                                <div class=" form-group">
                                    <label for="bases" class="col-sm-12 control-label">Comprobante de hacienda (Constancia de situación fiscal)<span style="color: red">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" accept=".pdf" value="" name="comprobante_shcp" id="comprobante_shcp" aria-describedby="verBases">
                                        @if($empresa->comprobante_shcp!=null || $empresa->comprobante_shcp!='')
                                        <small id="verBases" class="form-text text-muted">
                                            <a target="_blank" href="{{asset('storage/Files/'.$empresa->ID_empresa.'/'.$empresa->comprobante_shcp)}}">Ver Documento actual</a>
                                        </small>
                                        @endif
                                    </div>
                                </div>


                                <div class=" form-group">
                                    <label for="bases" class="col-sm-12 control-label">Diseño de imagen corporativa (logotipo en formato .png o .jpg)<span style="color: red">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg" value="" name="disenio_imagen" id="disenio_imagen" aria-describedby="verBases">
                                        @if($empresa->disenio_imagen!=null || $empresa->disenio_imagen!='')
                                        <small id="verBases" class="form-text text-muted">
                                            <a target="_blank" href="{{asset('Logos').'/'. $empresa->disenio_imagen}}">Ver Documento actual</a>
                                        </small>
                                        @endif
                                    </div>
                                </div>


                                <div class=" form-group">
                                    <label for="bases" class="col-sm-12 control-label">Código de barras<span style="color: red">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg" value="" name="codigo_barras" id="codigo_barras" aria-describedby="verBases">
                                        @if($empresa->codigo_barras!=null || $empresa->codigo_barras!='')
                                        <small id="verBases" class="form-text text-muted">
                                            <a target="_blank" href="{{asset('storage/Files/'.$empresa->ID_empresa.'/'.$empresa->codigo_barras)}}">Ver Documento actual</a>
                                        </small>
                                        @endif

                                    </div>
                                </div>

                                <div class=" form-group">
                                    <label for="bases" class="col-sm-12 control-label">Archivo FDA<span style="color: red">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg" value="" name="FDA" id="FDA" aria-describedby="verBases">
                                        @if($empresa->FDA!=null || $empresa->FDA!='')
                                        <small id="verBases" class="form-text text-muted">
                                            <a target="_blank" href="{{asset('storage/Files/'.$empresa->ID_empresa.'/'.$empresa->FDA)}}">Ver Documento actual</a>
                                        </small>
                                        @endif
                                    </div>
                                </div>

                                <div class=" form-group">
                                    <label for="bases" class="col-sm-12 control-label">Comprobante Exportación<span style="color: red">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg" value="" name="comprobante_exportacion" id="comprobante_exportacion" aria-describedby="verBases">
                                        @if($empresa->comprobante_exportacion!=null || $empresa->comprobante_exportacion!='')
                                        <small id="verBases" class="form-text text-muted">
                                            <a target="_blank" href="{{asset('storage/Files/'.$empresa->ID_empresa.'/'.$empresa->comprobante_exportacion)}}">Ver Documento actual</a>
                                        </small>
                                        @endif

                                    </div>
                                </div>

                            </div>

                            <div class="form-group col-sm-12">
                                <center>
                                    <h4>Redes sociales</h4>
                                </center>
                                <hr width="100%" color="black" />
                                <div class="form-group col-sm-6">
                                    <label class="">
                                        Instagram (URL)
                                    </label>
                                    <input type="url" class="form-control" id="instagram" name="instagram" placeholder="" value="{{$empresa->instagram}}">

                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="">
                                        Facebook (URL)
                                    </label>
                                    <input type="url" class="form-control" id="facebook" name="facebook" placeholder="" value="{{$empresa->facebook}}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="">
                                        Twitter (Usuario)
                                    </label>
                                    <input type="text" class="form-control" id="twitter" name="twitter" placeholder="" value="{{$empresa->twitter}}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="">
                                        Sitio Web (URL)
                                    </label>
                                    <input type="url" class="form-control" id="sitio" name="sitio" placeholder="" value="{{$empresa->stio_web}}">
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <center>
                                    <h4>Clasificación</h4>
                                </center>
                                <hr width="100%" color="black" />
                                <div class="form-group col-sm-6">
                                    <label class="">
                                        Catagoría a la que pertenece tú empresa<span class="symbol required"></span>
                                    </label>

                                    <select class="form-control" id="categoria" name="categoria" onchange="cambiaSubCategorias({{$categorias}})">
                                        @foreach ($categorias as $itemCategoria)
                                        <option value="{{$itemCategoria->ID_categoria}}" {{$empresa->ID_categoria == $itemCategoria->ID_categoria? 'selected':'' }}>{{$itemCategoria->nombre}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="">
                                        Sub-categoría<span class="symbol required"></span>
                                    </label>
                                    <select class="form-control" id="subcat" name="subcat">
                                        @foreach ($categorias as $itemCategoria)
                                        @if ($itemCategoria->ID_categoria == $empresa->ID_categoria))
                                        @foreach ($itemCategoria->subCategorias as $subCatItem)
                                        <option value="{{$subCatItem->ID_subcategoria}}" {{$empresa->ID_subcategoria == $subCatItem->ID_subcategoria? 'selected':'' }}>{{$subCatItem->ID_subcategoria}}
                                        </option>
                                        @endforeach
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <br>
                            <center>
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn btn-primary ">Actualizar </button>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
                <!-- end: FORM WIZARD PANEL -->
            </div>
        </div>
        <!-- end: PAGE CONTENT-->
    </div>
</div>

<script src="{{asset('js/validar.js')}}"></script>

@endsection
