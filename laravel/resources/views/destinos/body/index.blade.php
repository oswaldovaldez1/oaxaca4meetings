<div id="showDestinos" class="row clsMarginBottom30 no-gutters">
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsColorGrisNuestrosDestinos">
        <div class="clsContInfoDestino container">
            <div class="row">
                <div class="col">
                    <div class="clsContTituloLogo">
                        <div class="clsTituloNuestrosDestinos">{{$contexto->subtitulo}}</div>
                        <div class="clsContLogoNuestrosDestinos">
                            <img src="images/icono-oaxaca4meeting.png" alt="icono" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="clsContDescNuestrosDestinos">
                    {!!$contexto->contexto!!}
                        {{-- La Ciudad de Oaxaca con su <b>centro histórico –nombrado Patrimonio
                            Cultural de la Humanidad por la UNESCO en 1987–</b> ofrece una fascinante arquitectura
                        colonial que te permite disfrutar de recintos históricos únicos, además de atractivos
                        naturales,
                        culturales, gastronómicos y folclóricos que <b>enriquecen el
                            desarrollo de tu evento en Oaxaca.</b><br><br>
                        Como parte de la <b>oferta complementaria</b>, encontrarás museos,
                        galerías, jardines, templos, mezcalerías, conciertos, restaurantes tradicionales y
                        más.<br><br>
                        En <b>Oaxaca4Meetings®</b> tenemos un amplio conocimiento del
                        destino que nos permite integrar a los mejores actores de la industria y lograr
                        el éxito de
                        todas las actividades que formarán parte de tu evento.<br> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsColorAzulNuestrosDestinos">


        <div class="clsContBotonesDestino">
            <ul>
                <li class="clsLiContImgMenuDestinos-conectividad clsFLX" rel="conectividad">
                    <div class="img-ico-destinos d-1-1"></div>
                </li>
                <li class="clsLiContImgMenuDestinos-hospedaje clsFLX" rel="hospedaje">
                    <div class="img-ico-destinos d-1-2"></div>
                </li>
                <li class="clsLiContImgMenuDestinos-espacios clsFLX" rel="espacios">
                    <div class="img-ico-destinos d-1-3"></div>
                </li>
                <li class="clsLiContImgMenuDestinos-actividades clsFLX" rel="actividades">
                    <div class="img-ico-destinos d-1-4"></div>
                </li>
            </ul>
        </div>



        <div class="clsContInfoDescDestino">
            <div id="destino-conectividad" class="clsItemDestino clsDestino-conectividad clsDisplayNone">
                <div class="clsTituloItemDestino">{{$conectividad->titulo1}}</div>
                {!!
                App\Http\Controllers\FuncionesController::remplazarHtml($conectividad->contexto,'<ul>','<ul class="clsUlDescDestinos">')
                
                !!}
                {{-- <ul class="clsUlDescDestinos">
                    <li>


                        <b>Vuelos directos desde</b> Guadalajara, Monterrey, CDMX,
                        Querétaro, M&eacute;rida, Tijuana, Los &Aacute;ngeles y Houston <b>al
                            Aeropuerto Internacional de Xoxocotlán</b> (a 30 minutos de la Ciudad de Oaxaca).
                    </li>
                    <li>
                        <b>Por carretera</b>, Oaxaca está conectada a través de la
                        carretera federal 190 de cuota con la capital del país (a 6 hrs. de la CDMX).
                    </li>
                    <li>
                        Cuenta con líneas de <b> autobuses de primera clase que unen al
                            Estado</b> con los principales destinos del centro y sureste mexicano.
                    </li>
                </ul> --}}
                @if ($conectividad->fuente!=null || $conectividad->fuente!='')
                    
                <div class="fuentes text-right"><em>Fuente {{$conectividad->fuente}}</em></div>
                @endif
            </div>
            <div id="destino-hospedaje" class="clsItemDestino clsDestino-hospedaje clsDisplayNone">
                <div class="clsTituloItemDestino">{{$hospedaje->titulo1}}</div>
                 {!!
                App\Http\Controllers\FuncionesController::remplazarHtml($hospedaje->contexto,'<ul>','<ul class="clsUlDescDestinos">')
                
                !!}
                {{-- <div><b>Oaxaca ofrece excelentes opciones de hospedaje como:</b></div>
                <ul class="clsUlDescDestinos">
                    <li>
                        Hoteles boutique.
                    </li>
                    <li>
                        Hoteles <b>“Tesoros de México”</b>, marca premium de México.
                    </li>
                    <li>Cinco estrellas.</li>
                    <li>Business class.</li>
                </ul>
                <div class="clsTextoPieItemDestino">En total, una oferta hotelera de 6,800 habitaciones.</div> --}}
                @if ($hospedaje->fuente!=null || $hospedaje->fuente!='')
                <div class="fuentes text-right"><em>Fuente {{$hospedaje->fuente}}</em></div>
                @endif

            </div>
            <div id="destino-espacios" class="clsItemDestino clsDestino-espacios clsDisplayNone">
                <div class="clsTituloItemDestino">{{$espacios->titulo1}}</div>
                 {!!
                App\Http\Controllers\FuncionesController::remplazarHtml($espacios->contexto,'<ul>','<ul class="clsUlDescDestinos">')
                
                !!}
                {{-- <div><b>Un toque exclusivo para tus congresos, convenciones y eventos especiales.
                    </b></div>
                <ul class="clsUlDescDestinos">
                    <li>Centro Cultural y de Convenciones de Oaxaca. (Cap. 2,500 pax).</li>
                    <li>Hoteles con espacios exclusivos para reuniones. (Hasta 1,300 pax).</li>
                    <li>Museos y Teatros. (Hasta 550 pax).</li>
                    <li>Recintos académicos, históricos y culturales.</li>
                </ul>
                <div class="clsTextoPieItemDestino">Con un total aproximado de 6,500 metros cuadrados para eventos.
                </div> --}}
                @if ($espacios->fuente!=null || $espacios->fuente!='')
                <div class="fuentes text-right"><em>Fuente {{$espacios->fuente}}</em></div>
                @endif
            </div>
            <div id="destino-actividades" class="clsItemDestino clsDestino-actividades clsDisplayNone">
                <div class="clsTituloItemDestino">{{$actividades->titulo1}}</div>
                @php
                    $actividadContexto=App\Http\Controllers\FuncionesController::remplazarHtml($actividades->contexto,'<ul>','<ul class="clsUlDescDestinos">');
                    $actividadContexto=App\Http\Controllers\FuncionesController::remplazarHtml($actividadContexto,'<p class="ql-align-center">','<p class="ql-align-center" style="font-size: 17px;">')
                //     App\Http\Controllers\FuncionesController::remplazarHtml($actividades->contexto,
                // $actividadContexto,
                // '<p class="ql-align-center">',
                // '<p class="ql-align-center" style="font-size: 17px;">')
                @endphp
                 {!!
                $actividadContexto
                !!}
                {{-- <ul class="clsUlDescDestinos">
                    <li>Recorridos peatonales y en bicicleta.</li>
                    <li><b>Recorridos culturales:</b> Museos, galerías, tiendas
                        artesanales, teatros y templos.</li>
                    <li><b>Talleres</b> gastronómicos y artesanales.</li>
                    <li>Rutas Turísticas como: Caminos del Mezcal, Mágica de las Artesanías, de la Mixteca, de la Sierra
                        Juárez que te mostrarán los impresionantes atractivos turísticos oaxaqueños.</li>
                </ul> --}}
                {{-- <div class="clsTextoPieItemDestino text-center">¡Haz historia en un lugar histórico como Oaxaca!</div> --}}
                @if ($actividades->fuente!=null || $actividades->fuente!='')
                <div class="fuentes text-right"><em>Fuente {{$actividades->fuente}}</em></div>
                @endif
            </div>

        </div>
    </div>
</div>
</div>

<div id="destinos">
    <div class="container-fluid clsNoPadding">
        @include('menus.eventos')
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function() {
        $('#divGaleriaDestino').sliderPro({
            id: 'divGaleriaDestino',
            width: 3000,
            height: 380,
            arrows: true,
            buttons: false,
            waitForLayers: true,
            thumbnailWidth: 200,
            thumbnailHeight: 100,
            thumbnailPointer: false,
            autoplay: true,
            autoplayDelay: 2000,
            //autoplayOnHover: 'none'
            autoScaleLayers: false,
            updateHash: false,
            imageScaleMode: 'cover',
            slideDistance: 0,
            responsive: true,
            autoHeight: true,
            slideHeight_568: 550,
            slideHeight_768: 600,
            slideHeight_1200: 800,
            slideHeight_1600: 800,
            slideHeight_2000: 800,
            slideHeight_5000: 800
        });

        $(".clsContBotonesDestino > ul > li")
            .click(function() {
                var rel = $(this).attr("rel");
                $(".clsItemDestino").removeClass("clsShow");
                $(".clsItemDestino").addClass("clsDisplayNone");
                $(".clsDestino-" + rel).addClass("clsShow");
                $(".clsContBotonesDestino > ul > li").removeClass("liActive");
                $(this).addClass("liActive");

                $(".clsContBotonesDestino > ul > li > div").removeClass("imgMenuActive");
                $(".clsContBotonesDestino > ul > li > div").removeClass("imgMenuActiveSel");
                $(".clsLiContImgMenuDestinos-" + rel + " > div").addClass("imgMenuActive");
                $(".clsLiContImgMenuDestinos-" + rel + " > div").addClass("imgMenuActiveSel");

                window.location.hash = '#' + rel;
            })
            .mouseover(function() {
                var rel = $(this).attr("rel");
                $(".clsLiContImgMenuDestinos-" + rel + " > div").addClass("imgMenuActive");
            })
            .mouseout(function() {
                var rel = $(this).attr("rel");
                var clase = $(".clsLiContImgMenuDestinos-" + rel + " > div").attr("class");
                var indice = clase.indexOf("imgMenuActiveSel");
                if (indice < 0)
                    $(".clsLiContImgMenuDestinos-" + rel + " > div").removeClass("imgMenuActive");
            });

        function fnDestino() {
            var URLhash = window.location.hash;
            var rel = URLhash.substring(1);
            rel = (rel == "") ? "conectividad" : rel;
            $(".clsDestino-" + rel).removeClass("clsDisplayNone");
            $(".clsDestino-" + rel).addClass("clsShow");

            $(".clsContBotonesDestino > ul > li").removeClass("liActive");
            $(".clsLiContImgMenuDestinos-" + rel).addClass("liActive");

            $(".clsContBotonesDestino > ul > li > div").removeClass("imgMenuActiveSel");
            $(".clsLiContImgMenuDestinos-" + rel + " > div").addClass("imgMenuActiveSel");
        }

        fnDestino();
    });

</script>
