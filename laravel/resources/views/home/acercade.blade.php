@php
    $item=config('langs')[Session::get('lang')]['secciones']['acerca'];
@endphp
<div id="acercade">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 clsAcercaDeMarginBottom">
                <div class="cls-titulo-i-1">{{$item[0]}}</div>
                <div class="cls-titulo-i-2">{{$item[1]}}</div>
            </div>
        </div>
        <div id="divContAcercaDeDet" class="row">
            <div class="col-12 col-sm-12 col-md-9 col-lg-8 col-xl-8 order-12 order-sm-12 order-md-1">
                <div class="row no-gutters">
                    <div class="col-12">

                        <div id="divContAcercaDe-1" class="row clsAcercaDeActive">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-5">
                                <div class="row no-gutters">
                                    <div class="col-0 col-sm-0 col-md-0 col-lg-2 col-xl-2 clsHiddenMovil">&nbsp;</div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 clsMarginTituloAcercaDe">
                                        <div class="clsTextoDMC">{{$quienesSomos->titulo1}}</div>
                                        <div class="clsTextoDMC">{{$quienesSomos->titulo2}}</div>
                                        <div class="clsTextoDescDMC"></div>
                                        <div class="clsTextoDescDMC"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-7">
                                <div class="row">
                                    <div class="col-2 clsHiddenMovil">&nbsp;</div>
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div class="clsTextoAcercaDe">
                                            {{-- <b>Oaxaca4Meetings®</b> es una <b>DMC</b>
                                            (Destination Management Company) <b>especializada
                                                en la industria de reuniones en
                                                Oaxaca</b> que ofrece a cada uno de sus clientes, productos y
                                            servicios personalizados e innovadores adecuados a sus necesidades
                                            particulares. --}}
                                            {!!
                                            App\Http\Controllers\FuncionesController::limpiarHtml($quienesSomos->contexto)
                                            
                                            !!}
                                        {{-- </div>
                                        <div class="clsTextoAcercaDe">
                                            <b>Oaxaca4Meetings® DMC agency</b> inicia
                                            operaciones en la Ciudad de Oaxaca en 2014 con el objetivo de atender la
                                            necesidad de un cliente exigente que busca una <b>empresa integradora</b> de
                                            todos los productos
                                            y servicios que Oaxaca ofrece. Un organizador y operador de eventos, experto
                                            en el destino que brinde asesoría y enlace a toda la cadena productiva.
                                            --}}
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="divContAcercaDe-2" class="row clsAcercaDeDesactive">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-5">
                                <div class="row">
                                    <div class="col-0 col-sm-0 col-md-0 col-lg-2 col-xl-2 clsHiddenMovil">&nbsp;</div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 clsMarginTituloAcercaDe">
                                        <div class="clsTextoDMC">{{$mision->titulo1}}</div>
                                        <div class="clsTextoDMC">{{$mision->titulo2}}</div>
                                        <div class="clsTextoDescDMC"></div>
                                        <div class="clsTextoDescDMC"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-7">
                                <div class="row">
                                    <div class="col-2 clsHiddenMovil">&nbsp;</div>
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div class="clsTextoAcercaDe">
                                         {!!
                                            App\Http\Controllers\FuncionesController::limpiarHtml($mision->contexto)
                                            
                                            !!}
                                            {{-- <b>M. Lograr la satisfacción total de nuestros
                                                clientes</b> a través de la integración de servicios, productos y
                                            experiencias que brinda el Estado de Oaxaca, para alcanzar el éxito de cada
                                            proyecto atendido y contribuir al desarrollo económico, la preservación de
                                            la cultura y tradiciones de Oaxaca.
                                        </div>
                                        <div class="clsTextoAcercaDe">
                                            <b>V. Consolidar nuestra experiencia y
                                                profesionalismo</b> a través del posicionamiento internacional de
                                            nuestra marca, como referente de excelencia en la creación de productos y
                                            servicios exclusivos e innovadores para cada uno de nuestros clientes. --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="divContAcercaDe-3" class="row clsAcercaDeDesactive">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-5">
                                <div class="row">
                                    <div class="col-0 col-sm-0 col-md-0 col-lg-2 col-xl-2 clsHiddenMovil">&nbsp;</div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 clsMarginTituloAcercaDe">
                                        <div class="clsTextoDMC">{{$evento->titulo1}}</div>
                                        <div class="clsTextoDMC">{{$evento->titulo2}}</div>
                                        <div class="clsTextoDescDMC"></div>
                                        <div class="clsTextoDescDMC"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-7">
                                <div class="row">
                                    <div class="col-2 clsHiddenMovil">&nbsp;</div>
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div class="clsTextoAcercaDe">
                                        {!!
                                            App\Http\Controllers\FuncionesController::limpiarHtml($evento->contexto)
                                            
                                            !!}
                                            
                                            <br><br><br>
                                            <a href="/nuestros-eventos" class="clsLinkAcerca">{{$item[2]}}</a>
                                            {{-- Cumplir al 100% con la satisfacción de nuestros clientes es un distintivo
                                            que nos caracteriza; te invitamos a conocer algunos de nuestros eventos.
                                            <br><br><br>
                                            <a href="/nuestros-eventos" class="clsLinkAcerca">Ver más</a>
                                        </div>
                                        <div class="clsTextoAcercaDe"> --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="clsContMenuAcercaDe col-12 col-sm-12 col-md-3 col-lg-4 col-xl-4 order-1 order-sm-1 order-md-12">
                <div id="divMenuAcercaDe" class="row">


                    <div class="col-0 col-sm-0 col-md-0 col-lg-6 col-xl-6 clsHiddenMovil clsHiddenTablet"></div>
                    <div id="divContNumero-1" class="col-4 col-sm-4 col-md-12 col-lg-6 col-xl-6 clsMarcoAcercaDe">
                        <div id="divNumero-1">1</div>
                    </div>


                    <div id="divContNumero-2"
                        class="col-4 col-sm-4 col-md-12 col-lg-6 col-xl-6 clsMarcoAcercaDe clsMarcoAcercaDe-U clsMarcoAcercaDe-R">
                        <div id="divNumero-2">2</div>
                    </div>
                    <div class="col-0 col-sm-0 col-md-6 col-lg-6 col-xl-6 clsHiddenMovil clsHiddenTablet"></div>


                    <div
                        class="col-0 col-sm-0 col-md-6 col-lg-6 col-xl-6 clsMarcoAcercaDe clsMarcoAcercaDe-UU clsMarcoAcercaDe-R clsHiddenMovil clsHiddenTablet">
                    </div>
                    <div id="divContNumero-3"
                        class="col-4 col-sm-4 col-md-12 col-lg-6 col-xl-6 clsMarcoAcercaDe clsMarcoAcercaDe-UU">
                        <div id="divNumero-3">3</div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
