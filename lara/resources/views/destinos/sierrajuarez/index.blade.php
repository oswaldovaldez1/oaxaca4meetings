<div id="showDestinos" class="row clsMarginBottom30 no-gutters">
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsColorGrisNuestrosDestinos">
        <div class="clsContInfoDestino container">
            <div class="row">
                <div class="col">
                    <div class="clsContTituloLogo">
                        <div class="clsTituloNuestrosDestinos">SIERRA JUÁREZ</div>
                        <div class="clsContLogoNuestrosDestinos">
                            <img src="images/icono-oaxaca4meeting.png" alt="icono" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="clsContDescNuestrosDestinos">
                        ¿Buscas un espacio natural para tu evento? ¿Eres apasionado (a) de las prácticas propias del
                        ecoturismo o disfrutas de su naturaleza? ¡La Sierra Norte de Oaxaca es para ti!<br><br>
                        <span class="texto-negritas">Cuenta con espacios especiales</span> para la organización de
                        viajes de incentivo, actividades de integración, equipos de trabajo, ecoturismo y turismo de
                        aventura.<br><br>
                        Las comunidades que conforman la Sierra Norte se caracterizan por sus prácticas y servicios
                        responsables con el medio ambiente.<br><br>
                        <span class="texto-negritas">¡Pregunta por los paquetes especiales!</span>
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
            <div class="clsItemDestino clsDestino-conectividad clsDisplayNone">
                <div class="clsTituloItemDestino">Conectividad</div>

                <!--div class="texto-negritas">Pueblos Mancomunados</div><br-->

                <ul class="clsUlDescDestinos">
                    <li>
                        Acceso a través de la Carretera Federal 175 o bien por la Carretera Internacional
                        Oaxaca-Tehuantepec. (1.5 horas de la Ciudad de Oaxaca)
                    </li>
                    <li>
                        Servicio de transporte público, vía terrestre, en camionetas tipo Sprinter disponibles en varios
                        puntos del centro en la Ciudad de Oaxaca.
                    </li>
                </ul>
            </div>
            <div class="clsItemDestino clsDestino-hospedaje clsDisplayNone">
                <div class="clsTituloItemDestino">Hospedaje</div>
                <div class="texto-negritas">Existen 6 áreas de cabañas ubicadas en 6 comunidades diferentes (Amatlán,
                    Benito Juárez, Cuajimoloyas, Llano Grande, Latuvi y La Nevería):</div><br>
                <ul class="clsUlDescDestinos">
                    <li>
                        Capacidad de hospedaje de 23–82 personas por noche.
                    </li>
                    <li>
                        Comedores comunitarios para 30–50 personas.
                    </li>
                </ul>
                <div class="fuentes text-right"><em>Fuente Expediciones Sierra Norte.</em></div>
            </div>
            <div class="clsItemDestino clsDestino-espacios clsDisplayNone">
                <div class="clsTituloItemDestino">Espacios para reuniones</div>
                <div class="texto-negritas">5 de las comunidades cuentan con salones para eventos:</div>
                <ul class="clsUlDescDestinos">
                    <li>30, 50, 70, 100 y 200 personas.</li>
                    <li>Experiencias únicas de aventura, esparcimiento y contacto con la naturaleza.</li>
                </ul>
            </div>
            <div class="clsItemDestino clsDestino-actividades clsDisplayNone">
                <div class="clsTituloItemDestino">Actividades complementarias</div>
                <ul class="clsUlDescDestinos">
                    <li><span class="texto-negritas">Ciclismo de montaña</span> y cabalgata.</li>
                    <li>Caminata.</li>
                    <li><span class="texto-negritas">Tirolesas</span> de 150 m, hasta 1 km de largo.</li>
                    <li>Observación de flora y fauna, medicina tradicional y agroturismo.</li>
                    <li><span class="texto-negritas">Descanso en cabañas</span> construidas con materiales de la región.
                    </li>
                </ul>
                <div class="clsTextoPieItemDestino text-center">¡Disfruta su clima, colores, texturas, sabores y aromas!
                </div>
                <div class="fuentes text-right"><em>Fuente Expediciones Sierra Norte.</em></div>
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
