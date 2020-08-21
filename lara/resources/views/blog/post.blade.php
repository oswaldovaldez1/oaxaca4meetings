@extends('layout.plantilla')
@section('content')



    <script type="text/javascript">
        $(document).ready(function($) {
            $('#divGaleria-Post').sliderPro({
                id: 'divGaleria-Home',
                width: 3000,
                height: 400,
                arrows: false,
                buttons: false,
                waitForLayers: true,
                thumbnailWidth: 200,
                thumbnailHeight: 100,
                thumbnailPointer: false,
                autoplay: true,
                autoplayDelay: 5000,
                //autoplayDelay: 3000,
                autoScaleLayers: false,
                updateHash: false,
                imageScaleMode: 'cover',
                slideHeight_568: 200,
                slideHeight_768: 200,
                slideHeight_1200: 250,
                slideHeight_1600: 300,
                slideHeight_2000: 320,
                slideHeight_5000: 350
            });
        });

    </script>
    <div id="noticias" class="container">

        <div class="row">
            <div class="col-12">
                <div class="cls-titulo-1">DESCUBRE MÁS</div>
                <div class="cls-titulo-2">SOBRE OAXACA</div>
            </div>
        </div>

        @include('menus.blog.header')



        <div class="row cont-list-posts clsNoPadding">
            <div class="col-12 col-md-9 col-lg-9 clsNoPaddingLeft clsPaddingMovil">

                @if ($publicacion != null)

                    <div id="divNumVerPublicacion">
                        <div id="divContVerPublicacion">
                            <div id="divContenidoPublicacion" class="clsSeparacionCampos clsContVerPublicacion">
                                <div id="divPublicacion">

                                    <div id="divGaleriaPost">
                                        <div id="divGaleria-Post" class="slider-pro">
                                            @foreach ($fotos as $foto)

                                                <div class="sp-slides">
                                                    <div class="sp-slide">
                                                        <img class="clsImageSlideHome sp-image imgBack1"
                                                            src="{{ url('/') }}/plugins/slider-pro/css/images/blank.gif"
                                                            data-src="{{ url('/') }}/publicaciones/{{ $foto->archivo_imagen_publicacion }}"
                                                            data-small="{{ url('/') }}/publicaciones/{{ $foto->archivo_imagen_publicacion }}"
                                                            data-medium="{{ url('/') }}/publicaciones/{{ $foto->archivo_imagen_publicacion }}"
                                                            data-large="{{ url('/') }}/publicaciones/{{ $foto->archivo_imagen_publicacion }}"
                                                            alt="slide" />

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div id="divFechaPublicacion">

                                        <div class="post-anio post-anio-read">
                                            {{ App\Http\Controllers\FuncionesController::getDateFormat($publicacion->fecha_publicacion, 'Y') }}
                                        </div>
                                        <div class="post-mes post-mes-read">
                                            {{ App\Http\Controllers\FuncionesController::getDateFormat($publicacion->fecha_publicacion, 'M') }}
                                        </div>
                                        <div class="post-dia post-dia-read">
                                            {{ App\Http\Controllers\FuncionesController::getDateFormat($publicacion->fecha_publicacion, 'D') }}
                                        </div>
                                    </div>



                                    <div id="divTituloPublicacion" class="cont-titulo-post clsSeparacionCampos">
                                        {{ $publicacion->titulo_publicacion }}
                                    </div>

                                    <hr />

                                    @if ($publicacion->titulo_publicacion != '')

                                        <div class="cont-sub-titulo-post">
                                            <span><img class="ico-bullet-blog"
                                                    src="{{ url('/') }}/images/icono-oaxaca4meeting.png"
                                                    alt="icono" /></span>
                                            <span> {{ $publicacion->sub_titulo_publicacion }} </span>
                                        </div>


                                    @endif


                                    <div class="clsNota">
                                        {!!
                                        App\Http\Controllers\FuncionesController::limpiar($publicacion->contenido_publicacion)
                                        !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div id="divTituloPublicacion">No existe esta Publicaci&oacute;n.</div>
                @endif
            </div>
            <div class="col-0 col-md-3 col-lg-3 clsNoPaddingRight clsPaddingMovil">
                @include('menus.blog.entradas')
            </div>
        </div>

        @if ($publicacion != null)
            <div id="cont-comentarios-fb">
                <div id="fb-root"></div>
                <script>
                    (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src =
                            'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.2&appId=337202887097261&autoLogAppEvents=1';
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));

                </script>


                <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="10"></div>

            </div>
        @endif

        @include('menus.blog.footer')

    </div>

@endsection
