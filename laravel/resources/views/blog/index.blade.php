@extends('layout.plantilla')
@section('content')
@php
    $item=config('langs')[Session::get('lang')]['secciones']['blog'];
@endphp    
    <div id="noticias" class="container">

        <div class="row">
            <div class="col-12">
                <div class="cls-titulo-1">{{$item[0]}}</div>
                <div class="cls-titulo-2">{{$item[1]}}</div>
            </div>
        </div>


        @include('menus.blog.header')
        <div class="row cont-list-posts clsNoPadding">
            <div class="col-12 col-md-9 col-lg-9 clsNoPaddingLeft clsPaddingMovil">

                @foreach ($publicaciones as $publicacion)


                    <div class="row clsRowNoticias">
                        <div class="col-2 col-md-2">
                            <div class="cont-fechas-post">

                                <div class="post-anio">
                                    {{ App\Http\Controllers\FuncionesController::getDateFormat($publicacion->fecha_publicacion, 'D',Session::get('lang')) }}
                                </div>
                                <div class="post-mes">
                                    {{ App\Http\Controllers\FuncionesController::getDateFormat($publicacion->fecha_publicacion, 'M', Session::get('lang')) }}
                                </div>
                                <div class="post-dia">
                                    {{ App\Http\Controllers\FuncionesController::getDateFormat($publicacion->fecha_publicacion, 'Y', Session::get('lang')) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-10 col-md-10">
                            <div>

                                @if ($publicacion->imagen_publicacion != '' || $publicacion->imagen_publicacion != null)

                                    <a
                                        href="/blog/post/{{ App\Http\Controllers\FuncionesController::remplazar($publicacion->titulo_publicacion, ' ', '-', 'l') }}">
                                        <div class="clsdivImgPublicacionList">

                                            <img src="{{ url('/') }}/publicaciones/{{ $publicacion->imagen_publicacion }}"
                                                class="clsImgPublicacionList" alt="publicacion" />
                                        </div>
                                    </a>
                                @endif
                            </div>
                            <div class="cont-titulo-post">
                                <a href="/blog/post/{{ App\Http\Controllers\FuncionesController::remplazar($publicacion->titulo_publicacion, ' ', '-', 'l') }}"
                                    class="clsA_Blog">
                                    {{ $publicacion->titulo_publicacion }}
                                    

                                </a>
                            </div>

                            <hr />


                            @if ($publicacion->sub_titulo_publicacion != '')

                                <div class="cont-sub-titulo-post">
                                    <span><img class="ico-bullet-blog" src="{{ url('/') }}/images/icono-oaxaca4meeting.png"
                                            alt="icono" /></span>
                                    <span>
                                        {{ $publicacion->sub_titulo_publicacion }}
                                    </span>
                                </div>
                            @endif
                            <div class="clsNota">

                                {!! App\Http\Controllers\FuncionesController::resumir($publicacion->contenido_publicacion,
                                321, '.', '...') !!}
                            </div>
                            <div class="cont-leer-mas">
                                <a href="/blog/post/{{ App\Http\Controllers\FuncionesController::remplazar($publicacion->titulo_publicacion, ' ', '-', 'l') }}"
                                    class="link-leer-mas">{{$item[2]}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach()
                @if (method_exists($publicaciones, 'links'))
                    {{ $publicaciones->links() }}
                @endif
            </div>
            <div class="col-0 col-md-3 col-lg-3 clsNoPaddingRight clsPaddingMovil">

                @include('menus.blog.entradas')
            </div>
        </div>
        @include('menus.blog.footer')
    </div>

@endsection
