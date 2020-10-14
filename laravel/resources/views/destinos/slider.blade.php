@php

$intLimit = 10;

$texto = [
1 => 'Benito Ju&aacuterez, Pueblos Mancomunados.',
2 => 'La Never&iacute;a, Pueblos Mancomunados.',
3 => 'Llano Grande, Pueblos Mancomunados.',
4 => 'Llano Grande, Pueblos Mancomunados.',
5 => 'Ixtl&aacute;n de Ju&aacuterez.',
6 => 'Latuvi, Pueblos Mancomunados.',
7 => 'Benito Ju&aacuterez, Pueblos Mancomunados.',
8 => 'Cuajimoloyas, Pueblos Mancomunados.',
9 => 'Latuvi, Pueblos Mancomunados.',
10 => 'Capul&aacute;lpam de Méndez, Pueblo M&aacute;gico.',
];
//dd($slider);
@endphp


<div id="nuestros-destinos" class="container">
    <div class="row ">
        <div class="col">
            <div class="col-12">
                <div class="cls-titulo-1">{{$contexto->titulo1}}</div>
                <div class="cls-titulo-2">{{$contexto->titulo2}}</div>
            </div>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="clsContImgNuestrosDestinos">
                <div id="divGaleriaDestino" class="slider-pro">
                    <div class="sp-slides">
                    @foreach ($slider as $item)
                        <div class="sp-slide">
                                <img class="sp-image" src="{{url('/')}}/plugins/slider-pro/css/images/blank.gif"
                                    data-src="{{$item->titulo.$item->img}}"
                                    data-small="{{$item->titulo.$item->img}}"
                                    data-medium="{{$item->titulo.$item->img}}"
                                    data-large="{{$item->titulo.$item->img}}" alt="slide" />
                                <p class="sp-layer sp-black sp-padding" data-position="bottomRight" data-vertical="10"
                                    data-horizontal="2%" data-width="6%" data-show-transition="up" data-show-delay="400"
                                    data-hide-transition="down" data-layer-init="true" style="">
                                    {!! 
                                    
                                    App\Http\Controllers\FuncionesController::limpiarHtml($item->pie_pagina)
                                     !!}
                                </p>
                    </div>
                    @endforeach
                        {{-- @for ($x = 1; $x <= $intLimit; $x++)
                            @php
                            $y=$x; $x=$x < 10 ? '0' . $x : $x @endphp <div class="sp-slide">
                                <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                    data-src="images/destinos/des-sierra-juarez/{{ $x }}.jpg"
                                    data-small="images/destinos/des-sierra-juarez/{{ $x }}.jpg"
                                    data-medium="images/destinos/des-sierra-juarez/{{ $x }}.jpg"
                                    data-large="images/destinos/des-sierra-juarez/{{ $x }}.jpg" alt="slide" />
                                <p class="sp-layer sp-black sp-padding" data-position="bottomRight" data-vertical="10"
                                    data-horizontal="2%" data-width="6%" data-show-transition="up" data-show-delay="400"
                                    data-hide-transition="down" data-layer-init="true" style="">
                                    {{ $texto[$y] }}
                                </p>
                    </div>

                    @endfor --}}
                </div>
            </div>
        </div>
    </div>
</div>
