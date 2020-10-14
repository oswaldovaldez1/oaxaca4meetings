@php
    $item=config('langs')[Session::get('lang')]['secciones']['evento'];
@endphp
<div id="eventos">
    <div id="divContTituloEventos">
        <div class="cls-titulo-e-1">{{$eventos->titulo1}}</div>
        <div class="cls-titulo-e-2">{{$eventos->titulo2}}</div>
    </div>
    <div id="divGaleriaEventos">
        <div id="divGaleria-Eventos" class="slider-pro">
            <div class="sp-slides">
                <div class="sp-slide">
                    <img class="sp-image" src="{{url('/')}}/plugins/slider-pro/css/images/blank.gif" data-src="images/eventos/01.jpg"
                        data-small="{{url('/')}}/images/eventos/01.jpg" data-medium="images/eventos/01.jpg"
                        data-large="{{url('/')}}/images/eventos/01.jpg" alt="evento" />
                </div>

                <div class="sp-slide">
                    <img class="sp-image" src="{{url('/')}}/plugins/slider-pro/css/images/blank.gif" data-src="images/eventos/02.jpg"
                        data-small="{{url('/')}}/images/eventos/02.jpg" data-medium="images/eventos/02.jpg"
                        data-large="{{url('/')}}/images/eventos/02.jpg" alt="evento" />
                </div>

                <div class="sp-slide">
                    <img class="sp-image" src="{{url('/')}}/plugins/slider-pro/css/images/blank.gif" data-src="images/eventos/03.jpg"
                        data-small="{{url('/')}}/images/eventos/03.jpg" data-medium="images/eventos/03.jpg"
                        data-large="{{url('/')}}/images/eventos/03.jpg" alt="evento" />
                </div>

                <div class="sp-slide">
                    <img class="sp-image" src="{{url('/')}}/plugins/slider-pro/css/images/blank.gif" data-src="images/eventos/04.jpg"
                        data-small="{{url('/')}}/images/eventos/04.jpg" data-medium="images/eventos/04.jpg"
                        data-large="{{url('/')}}/images/eventos/04.jpg" alt="evento" />
                </div>

                <div class="sp-slide">
                    <img class="sp-image" src="{{url('/')}}/plugins/slider-pro/css/images/blank.gif" data-src="images/eventos/05.jpg"
                        data-small="{{url('/')}}/images/eventos/05.jpg" data-medium="images/eventos/05.jpg"
                        data-large="{{url('/')}}/images/eventos/05.jpg" alt="evento" />
                </div>

            </div>
        </div>
    </div>
    <div class="clsContTextoEventosEspeciales text-center">
        <div>
            {{-- <b>En Oaxaca4Meetings®</b><br>
            diseñamos eventos llenos de ingenio y creatividad, atendiendo las necesidades particulares de cada uno de
            nuestros clientes, desde una fiesta tematizada, un &#8220;convite&#8221; (desfile tradicional oaxaqueño),
            una escenografía y hasta el propio folclore de una Guelaguetza.
        </div>
        <br>
        <div>
            <div>Hacemos de un momento especial,</div>
            <div class="text-uppercase"><b>¡UN RECUERDO INOLVIDABLE!</b></div>
         --}}
         {!!
                                            $eventos->contexto
                                            
                                            !!}
                                            </div>
        <div>
            <div class="clsContBtnContactanos"><a href="javascript:void(0);"
                    class="clsBtnContactanos clsExeContacto">{{$item[0]}}</a></div>
        </div>
    </div>
</div>


{{-- <p><strong>En Oaxaca4Meetings®</strong></p><p>diseñamos eventos llenos de ingenio y creatividad, atendiendo las necesidades particulares de cada uno de nuestros clientes, desde una fiesta tematizada, un “convite” (desfile tradicional oaxaqueño), una escenografía y hasta el propio folclore de una Guelaguetza.</p><p><br></p><p>Hacemos de un momento especial,</p><p><strong>¡UN RECUERDO INOLVIDABLE!</strong></p> --}}