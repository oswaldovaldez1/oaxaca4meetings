@php
$intLimit = 10;
@endphp


<div id="nuestros-destinos" class="container">
    <div class="row ">
        <div class="col">
            <div class="col-12">
                <div class="cls-titulo-1">Nuestros</div>
                <div class="cls-titulo-2">Destinos</div>
            </div>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="clsContImgNuestrosDestinos">
                <div id="divGaleriaDestino" class="slider-pro">
                    <div class="sp-slides">
                        @for ($x = 1; $x <= $intLimit; $x++)
                            @php
                            $x=$x < 10 ? '0' . $x : $x; @endphp <div class="sp-slide">
                                <img class="sp-image" src="{{url('/')}}/plugins/slider-pro/css/images/blank.gif"
                                    data-src="images/destinos/des-cd-oaxaca/{{ $x }}.jpg"
                                    data-small="images/destinos/des-cd-oaxaca/{{ $x }}.jpg"
                                    data-medium="images/destinos/des-cd-oaxaca/{{ $x }}.jpg"
                                    data-large="images/destinos/des-cd-oaxaca/{{ $x }}.jpg" alt="slide" />
                                <p class="sp-layer sp-black sp-padding" data-position="bottomRight" data-vertical="10"
                                    data-horizontal="2%" data-width="6%" data-show-transition="up" data-show-delay="400"
                                    data-hide-transition="down" data-layer-init="true" style="">
                                </p>
                    </div>
                    @endfor

                </div>
            </div>
        </div>
    </div>
</div>
