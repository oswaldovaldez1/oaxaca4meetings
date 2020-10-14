@php
    $item=config('langs')[Session::get('lang')]['secciones']['oaxaca'];
@endphp
<div class="row no-gutters">
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsContOverlay">
        <img class="clsImgDestinos clsWidth100" src="images/destinos/destinos-1.jpg" alt="fondo" />
        <div class="overlay">
            <div class="clsDescOverlay">
                <div class="clsContDescDestino">
                    <div class="clsDestinoTitulo">{{$item[0]}}</div>
                    <div class="clsDestinoIcons">
                        <a href="/cd-oaxaca#conectividad" target="_self" class="a-d-1-1">
                            <img class="img-ico-destinos d-1-1" src="images/destinos/conectividad.svg"
                                onmouseover="this.src='images/destinos/conectividad-over.svg';"
                                onmouseout="this.src='images/destinos/conectividad.svg';" alt="destino" />
                        </a>
                        <a href="/cd-oaxaca#hospedaje" target="_self" class="a-d-1-2">
                            <img class="img-ico-destinos d-1-2" src="images/destinos/hospedaje.svg"
                                onmouseover="this.src='images/destinos/hospedaje-over.svg';"
                                onmouseout="this.src='images/destinos/hospedaje.svg';" alt="destino" />
                        </a>
                        <a href="/cd-oaxaca#espacios" target="_self" class="a-d-1-3">
                            <img class="img-ico-destinos d-1-3" src="images/destinos/testimonios.svg"
                                onmouseover="this.src='images/destinos/testimonios-over.svg';"
                                onmouseout="this.src='images/destinos/testimonios.svg';" alt="destino" />
                        </a>
                        <div class="clsDestinoIcoNombre n-1-1">{{$item[1]}}</div>
                        <div class="clsDestinoIcoNombre n-1-2">{{$item[2]}}</div>
                        <div class="clsDestinoIcoNombre n-1-3">{{$item[3]}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@php
    $item=config('langs')[Session::get('lang')]['secciones']['sierra'];
@endphp
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsContOverlay">
        <img class="clsImgDestinos clsWidth100" src="images/destinos/destinos-2.jpg" alt="destino" />
        <div class="overlay">
            <div class="clsDescOverlay">
                <div class="clsContDescDestino">
                    <div class="clsDestinoTitulo">{{$item[0]}}</div>
                    <div class="clsDestinoIcons">
                        <a href="/sierra-juarez#conectividad" target="_self" class="a-d-1-1">
                            <img class="img-ico-destinos d-1-1" src="images/destinos/conectividad.svg"
                                onmouseover="this.src='images/destinos/conectividad-over.svg';"
                                onmouseout="this.src='images/destinos/conectividad.svg';" alt="destino" />
                        </a>
                        <a href="/sierra-juarez#hospedaje" target="_self" class="a-d-1-2">
                            <img class="img-ico-destinos d-1-2" src="images/destinos/hospedaje.svg"
                                onmouseover="this.src='images/destinos/hospedaje-over.svg';"
                                onmouseout="this.src='images/destinos/hospedaje.svg';" alt="destino" />
                        </a>
                        <a href="/sierra-juarez#espacios" target="_self" class="a-d-1-3">
                            <img class="img-ico-destinos d-1-3" src="images/destinos/testimonios.svg"
                                onmouseover="this.src='images/destinos/testimonios-over.svg';"
                                onmouseout="this.src='images/destinos/testimonios.svg';" alt="destino" />
                        </a>
                        <div class="clsDestinoIcoNombre n-1-1">{{$item[1]}}</div>
                        <div class="clsDestinoIcoNombre n-1-2">{{$item[2]}}</div>
                        <div class="clsDestinoIcoNombre n-1-3">{{$item[3]}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
