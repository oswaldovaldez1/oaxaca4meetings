@php
    $item=config('langs')[Session::get('lang')]['secciones']['banner'];
@endphp
@include('header')
<div id="inicio">
    <img id="divImgBackHome" class="img-polaroid" src="images/back-home.jpg" alt="fondo" />
    <div id="divTextoHeader">
        {{$banner->titulo1}}
        <br />
        <span class="clsBlack">{{$banner->titulo2}}</span>
        <br />{{$banner->subtitulo}}
    </div>
    <div id="divUnete">
        <div class="container">
            <div class="row">
                <div class="col-0 col-sm-1 col-md-2 col-lg-2 col-xl-1">&nbsp;</div>
                <div class="col-3 col-sm-3 col-md-2 col-lg-2 col-xl-2 clsFLX">
                    <img class="imgIcoUnete" src="images/ico-oaxaca4meeting.png" alt="icono" />
                </div>
                <div class="col-9 col-sm-7 col-md-6 col-lg-6 col-xl-8 clsMarginTopTextoUnete">
                    <div class="clsTextoUnete">{{$item[0]}}</div>
                    <div class="clsTextoRodea">
                        {{$item[1]}}
                        <span class="aTelefonoInicio clsExeContacto">info@oaxaca4meetings.com</span>
                    </div>
                </div>
                <div class="col-0 col-sm-1 col-md-2 col-lg-2 col-xl-1">&nbsp;</div>
            </div>
        </div>
    </div>
</div>
