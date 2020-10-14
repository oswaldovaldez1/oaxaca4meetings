@extends('layout.plantilla')
@section('content')
    @php
    $item=config('langs')[Session::get('lang')]['secciones']['eventos'];
    @endphp
    <div id="nuestros-eventos" class="container">
        <div class="row clsMarginBottom30">
            <div class="col">
                <div class="col-12">
                    <div class="cls-titulo-1">{{ $item[0] }}</div>
                    <div class="cls-titulo-2">{{ $item[1] }}</div>
                </div>
            </div>
        </div>
        <div class="row clsMarginBottom30">
            @foreach ($galeria as $gal)
                <div class="col-4 col-sm-4 col-md-5-gbr col-lg-5-gbr col-xl-5-gbr clsNoPadding">
                    <div class="clsContImageNuestEvent" rel="{{ $gal->id }}">
                        <img class="imgNuestrosEventos" src="/{{ $gal->portada }}" alt="evento" />
                        <div class="clsOverlayContEncapMas"></div>
                        <div class="clsContEncapMas">
                            <div class="clsEncapMas clsFLX">
                                <span class="textCorchete">[</span><span
                                    class="textMas">&nbsp;&nbsp;+&nbsp;&nbsp;</span><span class="textCorchete">]</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div id="divContInfoNuestrosEventos" class="container clsNoPadding">
        <div class="row no-gutters">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                <div class="clsContTextoNuestEvent">
                    <div class="clsTextoInfo clsTextoInfo-13">
                        {!! $galeria[0]->titulo !!}
                    </div>
                    <div class="clsPieTexto clsPieTexto-13">
                        {!! $galeria[0]->contexto !!}
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="clsContImgNuestEvent">
                    <div id="divGaleria-NuEv-13" class="slider-pro">
                        <div class="sp-slides">
                            @foreach ($slider as $item)
                                <div class="sp-slide">
                                    <img class="sp-image" src="{{url('/')}}/plugins/slider-pro/css/images/blank.gif"
                                        data-src="{{ $item->img }}" data-small="{{ $item->img }}"
                                        data-medium="{{ $item->img }}" data-large="{{ $item->img }}" alt="evento" />
                                </div>
                            @endforeach
                            {{-- <div class="sp-slide">
                                <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                    data-src="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg"
                                    data-small="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg"
                                    data-medium="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg"
                                    data-large="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg" alt="evento" />
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                    data-src="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg"
                                    data-small="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg"
                                    data-medium="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg"
                                    data-large="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg" alt="evento" />
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                    data-src="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg"
                                    data-small="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg"
                                    data-medium="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg"
                                    data-large="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg" alt="evento" />
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                    data-src="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg"
                                    data-small="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg"
                                    data-medium="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg"
                                    data-large="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg" alt="evento" />
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        function problemas(datos) {

        }

        function fnCargaNuEv(datos) {

            //var obj = jQuery.parseJSON(datos);
            var strResp = datos.Resp;
            var i = datos.i;

            //jQuery("#divContInfoNuestrosEventos").html(strResp);
            /*var x = jQuery("#divContInfoNuestrosEventos");
            x.html(strResp);
            x.hide().html(strResp).fadeIn();*/
            $("#divContInfoNuestrosEventos").html(strResp);

            fnExeGalNuEv(i);
        }

        function fnIniNuEv() {
            strMsj = 'Enviando...';
            //jQuery.msg([content: strMsj, timeOut: 1000});
        }

        function fnPideInfoNuEv(i) {
            jQuery.ajax({
                async: true,
                type: "GET",
                dataType: "json",
                contentType: "application/x-www-form-urlencoded",
                //url:"ajax/ajaxPideInfoNuEv.php",
                url: "{{ url('/') }}/api/getinfoevent/" + i + "/" + "{{ Session::get('lang') }}",
                //data: "submit=&i="+i,
                beforeSend: fnIniNuEv,
                success: fnCargaNuEv,
                error: problemas
            });
            return false;
        }
        var navigationFn = {
            goToSection: function(id) {
                $('html, body').animate({
                    scrollTop: $(id).offset().top
                }, 1000);
            }
        }
        jQuery(document).ready(function() {
            $(".clsContImageNuestEvent").click(function() {
                var i = $(this).attr("rel");
                fnPideInfoNuEv(i);
                navigationFn.goToSection(
                    '#divContInfoNuestrosEventos');
            });
            fnPideInfoNuEv({{
                    $galeria[0]->id
                }});
        });

        function fnExeGalNuEv(i) {
            $('#divGaleria-NuEv-' + i).sliderPro({
                id: 'divGaleria-NuEv-' + i,
                width: 3000,
                height: 434,
                arrows: true,
                buttons: false,
                waitForLayers: true,
                thumbnailWidth: 200,
                thumbnailHeight: 100,
                thumbnailPointer: false,
                autoplay: true,
                autoplayDelay: 3000,
                autoScaleLayers: false,
                updateHash: false,
                imageScaleMode: 'cover',
                slideDistance: 0,
                responsive: true,
                autoHeight: false,
                slideHeight_568: 434,
                slideHeight_768: 434,
                slideHeight_1200: 434,
                slideHeight_1600: 434,
                slideHeight_2000: 434,
                slideHeight_5000: 434,
                no_slideHeight: 1
            });
        }

    </script>
@endsection
