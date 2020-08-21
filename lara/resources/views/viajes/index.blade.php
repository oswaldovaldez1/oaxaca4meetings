@extends('layout.plantilla')
@section('content')

    <div id="mod-viajes">
        <div id="viajes">
            <div class="container-fluid clsNoPadding">
                <div class="row clsNoMargin clsBackGris">
                    <div class="col-md-4 hidden-md clsHiddenMovil clsNoPadding"
                        style="background-color: {{ $informacion['color'] }};">
                        <div id="divContImgInt">
                            <img class="clsImgInt" src="{{ url('/') }}/{{ $informacion['imgint'] }}" alt="img interior" />
                        </div>
                        <div id="divContGatViajes">
                            <img class="clsImgGalViajes" src="{{ url('/') }}/{{ $informacion['imggal'] }}" alt="galeria" />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="container">
                            <div class="row mt-header-viajes mb-header-viajes">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-3 col-sm-2 col-md-2 clsFLX"><img class="ico-brand-viajes "
                                                src="{{ url('/') }}/images/icono-oaxaca4meeting.png" alt="icono" /></div>
                                        <div class="col-9 col-sm-10 col-md-10 clsNoPadding">
                                            <div class="clsViajesTitulo" style="color: {{ $informacion['color'] }};">
                                                {{ $informacion['titulo'] }}</div>
                                            <div class="clsViajesSubtitulo">{{ $informacion['subtitulo'] }}</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">&nbsp;</div>
                                <div class="col-md-11 text-right clsTextoInteriores">
                                    {!! $informacion['contenido'] !!}
                                    @if (array_key_exists('reservacion', $informacion))
                                        <p><span class="texto-negritas">{{ $informacion['reservacion'] }}</span></p>
                                    @endif
                                    <p>
                                    <div><span class="texto-negritas">Detalles del viaje:</span></div>
                                    <p>
                                    <p>Duración: {{ $informacion['duracion'] }} </p>
                                    @if (array_key_exists('salida', $informacion))
                                        <div>{{ $informacion['salida'] }}</div>
                                    @endif
                                    @if (array_key_exists('sugerencia', $informacion))
                                        <div>{{ $informacion['sugerencia'] }}</div>
                                    @endif
                                    <p><span class="texto-negritas">Incluye:</span> {!! $informacion['include'] !!}</p>
                                    <p><span class="texto-negritas">Recomendaciones:</span>
                                        {{ $informacion['recomendacion'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('menus.viajes')
        </div>



    </div>

@endsection
