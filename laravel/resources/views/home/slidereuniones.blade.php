@php
    $item=config('langs')[Session::get('lang')]['secciones']['eleccion'];
@endphp
<div id="por-que">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cls-titulo-1">{{$item[0]}}</div>
                <div class="cls-titulo-2">{{$item[1]}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="cls-subtitulo-porque">{{$item[2]}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="cls-division-porque">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div id="divContBullet-1" class="   <b>En Oaxaca4Meetings®</b><br>clsContBullet"></div>
                            </div>
                            <div class="col-6">
                                <div id="divContBullet-2" class=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 clsNoPadding">
                                <div id="divContBullet-Nombre-1" class="clsContBulletNombre clsContBulletNombreActive">
                                    {{$item[3]}}</div>
                            </div>
                            <div class="col-6 clsNoPadding">
                                <div id="divContBullet-Nombre-2" class="clsContBulletNombre">{{$item[4]}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clsMarginBottom60">
            <div id="divContSlidePorque-1" class="col-12">
                <div id="divGaleriaPorque-1">
                    <div id="divGaleria-Porque-1" class="slider-pro">
                        <div class="sp-slides">


                            {{-- <div class="sp-slide">
                                <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                    data-src="images/por-que/congresos/img_gal_congre_01.jpg"
                                    data-small="images/por-que/congresos/img_gal_congre_01.jpg"
                                    data-medium="images/por-que/congresos/img_gal_congre_01.jpg"
                                    data-large="images/por-que/congresos/img_gal_congre_01.jpg" alt="slide" />

                                <p id="exito" class="sp-layer sp-padding clsPlecaSlider" data-position="bottomLeft"
                                    style="left: 0px; bottom: 0px; visibility: visible; opacity: 1;">



                                    <span class="clsSliderContInfo">
                                        <span class="clsSliderTitulo">Recintos Exclusivos + Logística a Detalle =
                                            <b>Éxito Garantizado.</b></span>
                                    </span>
                                </p>
                            </div> --}}


@foreach ($congreso as $item)
    <div class="sp-slide">
                                <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                    data-src="{{$item->titulo.$item->img}}"
                                    data-small="{{$item->titulo.$item->img}}"
                                    data-medium="{{$item->titulo.$item->img}}"
                                    data-large="{{$item->titulo.$item->img}}" alt="slide" />

                                <p id="experiencia" class="sp-layer sp-padding clsPlecaSlider"
                                    data-position="bottomLeft"
                                    style="left: 0px; bottom: 0px; visibility: visible; opacity: 1;">



                                    <span class="clsSliderContInfo">
                                        <span class="clsSliderTitulo">
                                        {!!
                                        App\Http\Controllers\FuncionesController::limpiarHtml($item->pie_pagina)                                        
                                        !!}
                                        </span>
                                    </span>
                                </p>
                            </div>
@endforeach
                            {{-- <div class="sp-slide">
                                <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                    data-src="images/por-que/congresos/img_gal_congre_02.jpg"
                                    data-small="images/por-que/congresos/img_gal_congre_02.jpg"
                                    data-medium="images/por-que/congresos/img_gal_congre_02.jpg"
                                    data-large="images/por-que/congresos/img_gal_congre_02.jpg" alt="slide" />

                                <p id="experiencia" class="sp-layer sp-padding clsPlecaSlider"
                                    data-position="bottomLeft"
                                    style="left: 0px; bottom: 0px; visibility: visible; opacity: 1;">



                                    <span class="clsSliderContInfo">
                                        <span class="clsSliderTitulo"><b>Experiencia,
                                                profesionalismo y creatividad</b> para tus eventos.</span>
                                    </span>
                                </p>
                            </div>



                            <div class="sp-slide">
                                <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                    data-src="images/por-que/congresos/img_gal_congre_03.jpg"
                                    data-small="images/por-que/congresos/img_gal_congre_03.jpg"
                                    data-medium="images/por-que/congresos/img_gal_congre_03.jpg"
                                    data-large="images/por-que/congresos/img_gal_congre_03.jpg" alt="slide" />

                                <p id="servicio" class="sp-layer sp-padding clsPlecaSlider" data-position="bottomLeft"
                                    style="left: 0px; bottom: 0px; visibility: visible; opacity: 1;">



                                    <span class="clsSliderContInfo">
                                        <span class="clsSliderTitulo"><b>Servicios
                                                integrales</b> en la planeación y logística de tus congresos.</span>
                                    </span>
                                </p>
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                    data-src="images/por-que/congresos/img_gal_congre_04.jpg"
                                    data-small="images/por-que/congresos/img_gal_congre_04.jpg"
                                    data-medium="images/por-que/congresos/img_gal_congre_04.jpg"
                                    data-large="images/por-que/congresos/img_gal_congre_04.jpg" alt="slide" />


                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
            <div id="divContSlidePorque-2" class="col-12 clsIniSlidePorque">
                <div id="divGaleriaPorque-2">
                    <div id="divGaleria-Porque-2" class="slider-pro">
                        <div class="sp-slides">

                            @foreach ($exposiciones as $item)
    <div class="sp-slide">
                                <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                    data-src="{{$item->titulo.$item->img}}"
                                    data-small="{{$item->titulo.$item->img}}"
                                    data-medium="{{$item->titulo.$item->img}}"
                                    data-large="{{$item->titulo.$item->img}}" alt="slide" />

                                <p id="experiencia" class="sp-layer sp-padding clsPlecaSlider"
                                    data-position="bottomLeft"
                                    style="left: 0px; bottom: 0px; visibility: visible; opacity: 1;">



                                    <span class="clsSliderContInfo">
                                        <span class="clsSliderTitulo">
                                        {!!
                                        App\Http\Controllers\FuncionesController::limpiarHtml($item->pie_pagina)                                        
                                        !!}
                                        </span>
                                    </span>
                                </p>
                            </div>
@endforeach

                            {{-- <div class="sp-slide">
                                <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                    data-src="images/por-que/exposiciones/img_gal_exp_01.jpg"
                                    data-small="images/por-que/exposiciones/img_gal_exp_01.jpg"
                                    data-medium="images/por-que/exposiciones/img_gal_exp_01.jpg"
                                    data-large="images/por-que/exposiciones/img_gal_exp_01.jpg" alt="slide" />

                                <p id="vanguardia" class="sp-layer sp-padding clsPlecaSlider" data-position="bottomLeft"
                                    style="left: 0px; bottom: 0px; visibility: visible; opacity: 1;">



                                    <span class="clsSliderContInfo">
                                        <span class="clsSliderTitulo"><b>A la vanguardia en
                                                diseño, montaje y locaciones</b> en el Estado de Oaxaca.</span>
                                    </span>
                                </p>
                            </div>

                            <div class="sp-slide">
                                <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                    data-src="images/por-que/exposiciones/img_gal_exp_02.jpg"
                                    data-small="images/por-que/exposiciones/img_gal_exp_02.jpg"
                                    data-medium="images/por-que/exposiciones/img_gal_exp_02.jpg"
                                    data-large="images/por-que/exposiciones/img_gal_exp_02.jpg" alt="slide" />


                            </div>


                            <div class="sp-slide">
                                <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                    data-src="images/por-que/exposiciones/img_gal_exp_03.jpg"
                                    data-small="images/por-que/exposiciones/img_gal_exp_03.jpg"
                                    data-medium="images/por-que/exposiciones/img_gal_exp_03.jpg"
                                    data-large="images/por-que/exposiciones/img_gal_exp_03.jpg" alt="slide" />

                                <p id="alianza" class="sp-layer sp-padding clsPlecaSlider" data-position="bottomLeft"
                                    style="left: 0px; bottom: 0px; visibility: visible; opacity: 1;">



                                    <span class="clsSliderContInfo">
                                        <span class="clsSliderTitulo">Alianzas estratégicas <b>con los mejores
                                                proveedores</b> del
                                            pa&iacute;s.</span>
                                    </span>
                                </p>
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                    data-src="images/por-que/exposiciones/img_gal_exp_04.jpg"
                                    data-small="images/por-que/exposiciones/img_gal_exp_04.jpg"
                                    data-medium="images/por-que/exposiciones/img_gal_exp_04.jpg"
                                    data-large="images/por-que/exposiciones/img_gal_exp_04.jpg" alt="slide" />

                                <p id="profecionalismo" class="sp-layer sp-padding clsPlecaSlider"
                                    data-position="bottomLeft"
                                    style="left: 0px; bottom: 0px; visibility: visible; opacity: 1;">



                                    <span class="clsSliderContInfo">
                                        <span class="clsSliderTitulo"><b>Experiencia y
                                                profesionalismo</b> en sesiones de negocio (B2B & B2C).
                                        </span>
                                </p>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
