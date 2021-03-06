@extends('layout.plantilla')
@section('content')

    <div id="mod-viajes">
        <div id="viajes">
            <div class="container-fluid clsNoPadding">
                <div class="row clsNoMargin clsBackGris">
                    <div class="col-md-4 hidden-md clsHiddenMovil clsNoPadding"
                        style="background-color: {{ $viaje->color }};">
                        <div id="divContImgInt">
                            <img class="clsImgInt" src="{{ url('/') }}{{ $viaje->imgint }}" alt="img interior" />
                        </div>
                        <div id="divContGatViajes">
                            <img class="clsImgGalViajes" src="{{ url('/') }}{{ $viaje->imggal }}" alt="galeria" />
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
                                            <div class="clsViajesTitulo" style="color: {{ $viaje->color }};">
                                                {{ $viaje->titulo }}.</div>
                                            <div class="clsViajesSubtitulo">{{ $viaje->subtitulo }}</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">&nbsp;</div>
                                <div class="col-md-11 text-right clsTextoInteriores">
                                    {!! $viaje->contenido !!}
                                    
                                        <p><b>{{ $viaje->reservacion }}</b></p>
                                    
                                    <p>
                                    <div><b>Detalles del viaje:</b></div>
                                    </p>
                                    <p>Duración: {{ $viaje->duracion }} </p>    
                                    @if ($viaje->salida!=null || $viaje->salida!='')                                        
                                        <div>{{ $viaje->salida }}</div>                                    
                                    @endif

                                    @if ($viaje->sugerencia!=null || $viaje->sugerencia!='')                                        
                                        <div>{{ $viaje->sugerencia }}</div>
                                    @endif
                                    
                                    <p><b>Incluye:</b> {!! $viaje->include !!}</p>
                                    @if ($viaje->recomendacion!='' || $viaje->recomendacion!=null)                                        
                                    <p><b>Recomendaciones:</b>
                                        {{ $viaje->recomendacion }}</p>
                                    @endif
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
