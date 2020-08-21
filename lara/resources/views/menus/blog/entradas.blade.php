<div class="clsContFechasBlog container">
    <div class="titulo-entradas-blog">Entradas</div>
    <a id="tentradas" href="/blog" align="right">Ir a todas las entradas</a>
    <hr>

    <div id="accordion">
        @foreach ($anios as $anio)


            <div class="card">
                <div class="card-header" id="heading-{{ $anio->anio }}">
                    <h5 class="mb-0">
                        <button id="collapse-{{ $anio->anio }}-btn" class="btn btn-link btn_entradas"
                            data-toggle="collapse" data-target="#collapse-{{ $anio->anio }}" aria-expanded="true"
                            aria-controls="collapse-{{ $anio->anio }}" rel="{{ $anio->anio }}">
                            {{ $anio->anio }}
                            (
                            {{ $anio->total }}
                            ) <span id="cont_ico_{{ $anio->anio }}"><i
                                    class="ico_menu_entradas fas fa-caret-right"></i></span>
                        </button>
                    </h5>
                </div>
                <div id="collapse-{{ $anio->anio }}" class="collapse show" aria-labelledby="heading-{{ $anio->anio }}"
                    data-parent="#accordion">
                    <div class="card-body">
                        @foreach (App\Http\Controllers\FuncionesController::getCountMonth($anio->anio) as $mes)

                            <div class="cont-mes-publicacion"><a
                                    href="/blog/{{ $anio->anio }}/{{ App\Http\Controllers\FuncionesController::getDateFormat($anio->anio . '-' . $mes->mes . '-1', 'MFl') }}">
                                    {{ App\Http\Controllers\FuncionesController::getDateFormat($anio->anio . '-' . $mes->mes . '-1', 'MF') . '(' . $mes->total . ')' }}
                                </a></div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

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

    <div class="fb-page" data-href="https://www.facebook.com/oaxaca4meetings/" data-tabs="timeline" data-height="600"
        data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
        <blockquote cite="https://www.facebook.com/oaxaca4meetings/" class="fb-xfbml-parse-ignore"><a
                href="https://www.facebook.com/oaxaca4meetings/">Oaxaca4Meetings</a></blockquote>
    </div>



</div>
<script>
    $(".btn_entradas").click(function() {
        var _idBtn = $(this).attr('id');
        var _rel = $(this).attr('rel');
        var _cont = "cont_ico_" + _rel;
        var _exp = $(this).attr('aria-expanded');

        if (_exp == 'false') {
            $("#" + _cont).html('<i class="fas fa-sort-down"></i>');
            $(".btn-link").removeClass('btn_entradas_active');
            $(this).addClass('btn_entradas_active');
        } else {
            $("#" + _cont).html('<i class="fas fa-caret-right"></i>');
            $(".btn-link").removeClass('btn_entradas_active');
        }

    });

</script>
