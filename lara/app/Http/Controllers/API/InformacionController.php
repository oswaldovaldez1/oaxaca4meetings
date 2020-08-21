<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformacionController extends Controller
{
    //
    public function getInfoEvent($indice)
    {
        switch ($indice) {
            case 1:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                Primer Informe del Sistema DIF Estatal.
                            </div>
                            <div class="clsPieTexto clsPieTexto-' . $indice . '">
                                1500 participantes.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/01/img_informe_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/01/img_informe_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/01/img_informe_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/01/img_informe_01.jpg" />

                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/01/img_informe_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/01/img_informe_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/01/img_informe_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/01/img_informe_02.jpg" />

                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/01/img_informe_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/01/img_informe_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/01/img_informe_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/01/img_informe_01.jpg" />

                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/01/img_informe_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/01/img_informe_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/01/img_informe_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/01/img_informe_02.jpg" />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;

            case 2:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                Coctel de bienvenida, FAM Internacional &#8220;It&#8217;s all about mezcal&#8221;.
                            </div>

                            <div class="clsPieTexto clsPieTexto-' . $indice . '">
                                Cliente: GOBIERNO DEL ESTADO DE OAXACA.<br>
                                200 invitados.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/02/img_coctel_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/02/img_coctel_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/02/img_coctel_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/02/img_coctel_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/02/img_coctel_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/02/img_coctel_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/02/img_coctel_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/02/img_coctel_02.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/02/img_coctel_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/02/img_coctel_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/02/img_coctel_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/02/img_coctel_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/02/img_coctel_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/02/img_coctel_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/02/img_coctel_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/02/img_coctel_02.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;

            case 3:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                Taller de Capacitación &#8220;in situ&#8221; tipos de especies de agaves.
                            </div>
                            <div class="clsPieTexto clsPieTexto-' . $indice . '">
                                Cliente: CEO&#8217;s internacionales de la Industria de alimentos y bebidas. (A y B).<br>
                                60 participantes.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/03/img_taller_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/03/img_taller_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/03/img_taller_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/03/img_taller_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/03/img_taller_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/03/img_taller_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/03/img_taller_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/03/img_taller_02.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/03/img_taller_03.jpg"
                                             data-small="images/eventos/nuestros-eventos/03/img_taller_03.jpg"
                                             data-medium="images/eventos/nuestros-eventos/03/img_taller_03.jpg"
                                             data-large="images/eventos/nuestros-eventos/03/img_taller_03.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;

            case 4:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                Taller de capacitación de &#8220;reconocimiento de magueyes silvestres&#8221;.
                            </div>
                            <div class="clsPieTexto clsPieTexto-' . $indice . '">
                                Cliente: CEO&#8217;s internacionales de la Industria A y B.<br>
                                40 participantes.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/04/img_expmon_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/04/img_expmon_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/04/img_expmon_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/04/img_expmon_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/04/img_expmon_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/04/img_expmon_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/04/img_expmon_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/04/img_expmon_02.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/04/img_expmon_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/04/img_expmon_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/04/img_expmon_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/04/img_expmon_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/04/img_expmon_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/04/img_expmon_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/04/img_expmon_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/04/img_expmon_02.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;

            case 5:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                Comida tem&aacute;tica en campos de maguey.
                            </div>
                            <div class="clsPieTexto clsPieTexto-' . $indice . '">
                                100 participantes.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/05/img_comida_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/05/img_comida_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/05/img_comida_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/05/img_comida_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/05/img_comida_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/05/img_comida_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/05/img_comida_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/05/img_comida_02.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/05/img_comida_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/05/img_comida_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/05/img_comida_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/05/img_comida_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/05/img_comida_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/05/img_comida_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/05/img_comida_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/05/img_comida_02.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;

            case 6:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                Taller gastron&oacute;mico con el Chef Alejandro Ruiz de CASA OAXACA RESTAURANTE.
                            </div>
                            <div class="clsPieTexto clsPieTexto-' . $indice . '">

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/06/img_gastro_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/06/img_gastro_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/06/img_gastro_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/06/img_gastro_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/06/img_gastro_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/06/img_gastro_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/06/img_gastro_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/06/img_gastro_02.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/06/img_gastro_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/06/img_gastro_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/06/img_gastro_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/06/img_gastro_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/06/img_gastro_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/06/img_gastro_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/06/img_gastro_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/06/img_gastro_02.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;

            case 7:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                Seminario Internacional de Intercambio de Experiencias Intermunicipales para el Desarrollo Territorial.
                            </div>
                            <div class="clsPieTexto clsPieTexto-' . $indice . '">
                                CLIENTE: COPLADE y Banco Mundial<br>
                                200 participantes.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/07/img_seminario_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/07/img_seminario_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/07/img_seminario_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/07/img_seminario_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/07/img_seminario_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/07/img_seminario_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/07/img_seminario_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/07/img_seminario_02.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/07/img_seminario_03.jpg"
                                             data-small="images/eventos/nuestros-eventos/07/img_seminario_03.jpg"
                                             data-medium="images/eventos/nuestros-eventos/07/img_seminario_03.jpg"
                                             data-large="images/eventos/nuestros-eventos/07/img_seminario_03.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;

            case 8:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                Visita del Presidente del Consejo Empresarial Mexicano de Comercio Exterior.
                            </div>
                            <div class="clsPieTexto clsPieTexto-' . $indice . '">
                                Cliente: MEZCAL BENEV&Aacute;.<br>
                                150 invitados.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/08/img_beneva_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/08/img_beneva_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/08/img_beneva_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/08/img_beneva_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/08/img_beneva_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/08/img_beneva_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/08/img_beneva_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/08/img_beneva_02.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/08/img_beneva_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/08/img_beneva_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/08/img_beneva_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/08/img_beneva_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/08/img_beneva_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/08/img_beneva_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/08/img_beneva_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/08/img_beneva_02.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;

            case 9:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                Fiesta tem&aacute;tica oaxaque&ntilde;a en Tuxtla Guti&eacute;rrez, Chiapas.
                            </div>
                            <div class="clsPieTexto clsPieTexto-' . $indice . '">
                                Cliente: GRUPO EMPRESARIAL FINANCIERO.<br>
                                300 participantes.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/09/img_tuxtla_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/09/img_tuxtla_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/09/img_tuxtla_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/09/img_tuxtla_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/09/img_tuxtla_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/09/img_tuxtla_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/09/img_tuxtla_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/09/img_tuxtla_02.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/09/img_tuxtla_03.jpg"
                                             data-small="images/eventos/nuestros-eventos/09/img_tuxtla_03.jpg"
                                             data-medium="images/eventos/nuestros-eventos/09/img_tuxtla_03.jpg"
                                             data-large="images/eventos/nuestros-eventos/09/img_tuxtla_03.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;

            case 10:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                Encuentro Estatal de Alimentaci&oacute;n con Presidentas DIF Municipales.
                            </div>
                            <div class="clsPieTexto clsPieTexto-' . $indice . '">
                                Cliente: DIF OAXACA.<br>
                                1500 participantes.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/10/img_encuentro_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/10/img_encuentro_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/10/img_encuentro_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/10/img_encuentro_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/10/img_encuentro_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/10/img_encuentro_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/10/img_encuentro_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/10/img_encuentro_02.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/10/img_encuentro_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/10/img_encuentro_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/10/img_encuentro_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/10/img_encuentro_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/10/img_encuentro_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/10/img_encuentro_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/10/img_encuentro_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/10/img_encuentro_02.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;

            case 11:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                Fam Trip para empresas europeas &#8220;Event Maker Ibiza&#8221; y &#8220;Global Star Events DMC&#8221;.
                            </div>
                            <div class="clsPieTexto clsPieTexto-' . $indice . '">

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/11/img_maker_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/11/img_maker_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/11/img_maker_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/11/img_maker_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/11/img_maker_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/11/img_maker_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/11/img_maker_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/11/img_maker_02.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/11/img_maker_03.jpg"
                                             data-small="images/eventos/nuestros-eventos/11/img_maker_03.jpg"
                                             data-medium="images/eventos/nuestros-eventos/11/img_maker_03.jpg"
                                             data-large="images/eventos/nuestros-eventos/11/img_maker_03.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;

            case 12:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                Fiesta tem&aacute;tica infantil.
                            </div>
                            <div class="clsPieTexto clsPieTexto-' . $indice . '">
                                Cliente: DIF OAXACA.<br>
                                1000 participantes.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/12/img_dia_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/12/img_dia_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/12/img_dia_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/12/img_dia_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/12/img_dia_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/12/img_dia_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/12/img_dia_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/12/img_dia_02.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/12/img_dia_03.jpg"
                                             data-small="images/eventos/nuestros-eventos/12/img_dia_03.jpg"
                                             data-medium="images/eventos/nuestros-eventos/12/img_dia_03.jpg"
                                             data-large="images/eventos/nuestros-eventos/12/img_dia_03.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;

            case 13:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent container">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                103 Asamblea Nacional de la Federaci&oacute;n de Colegios de Arquitectos de la Rep&uacute;blica Mexicana y Asamblea de la &#8220;Union International Architecture&#8221;.
                            </div>
                            <div class="clsPieTexto clsPieTexto-' . $indice . '">
                                Cliente: FCARM.<br>
                                300 participantes.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/13/img_asamblea_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/13/img_asamblea_02.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;

            case 14:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                Lanzamiento de la Campa&ntilde;a Nacional &#8220;Mezcales de Oaxaca&#8221;.
                            </div>
                            <div class="clsPieTexto clsPieTexto-' . $indice . '">
                                Cliente: Secretar&iacute;a de Econom&iacute;a de Oaxaca en colaboraci&oacute;n con IFAHTO.<br>
                                500 invitados.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/14/img_mezcales_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/14/img_mezcales_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/14/img_mezcales_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/14/img_mezcales_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/14/img_mezcales_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/14/img_mezcales_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/14/img_mezcales_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/14/img_mezcales_02.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/14/img_mezcales_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/14/img_mezcales_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/14/img_mezcales_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/14/img_mezcales_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/14/img_mezcales_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/14/img_mezcales_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/14/img_mezcales_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/14/img_mezcales_02.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;

            case 15:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                Alfombra Roja premier de la pel&iacute;cula &#8220;La delgada línea amarilla&#8221;.
                            </div>
                            <div class="clsPieTexto clsPieTexto-' . $indice . '">
                                Cliente: Oaxaca Film Fest.
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/15/img_alfombra_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/15/img_alfombra_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/15/img_alfombra_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/15/img_alfombra_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/15/img_alfombra_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/15/img_alfombra_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/15/img_alfombra_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/15/img_alfombra_02.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/15/img_alfombra_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/15/img_alfombra_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/15/img_alfombra_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/15/img_alfombra_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/15/img_alfombra_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/15/img_alfombra_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/15/img_alfombra_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/15/img_alfombra_02.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;

            case 16:
                $code = '
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clsBackColorNuEv clsFLX">
                        <div class="clsContTextoNuestEvent">
                            <div class="clsTextoInfo clsTextoInfo-' . $indice . '">
                                Evento:<br>
                                103 Asamblea Nacional de la Federaci6oacute;n
                                de Colegios de Arquitectos
                                de la Rep&uacute;blica Mexicana.
                            </div>

                            <div class="clsPieTexto clsPieTexto-' . $indice . '">

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="clsContImgNuestEvent">
                            <div id="divGaleria-NuEv-' . $indice . '" class="slider-pro">
                                <div class="sp-slides">
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/16/img_asam_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/16/img_asam_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/16/img_asam_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/16/img_asam_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/16/img_asam_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/16/img_asam_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/16/img_asam_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/16/img_asam_02.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/16/img_asam_01.jpg"
                                             data-small="images/eventos/nuestros-eventos/16/img_asam_01.jpg"
                                             data-medium="images/eventos/nuestros-eventos/16/img_asam_01.jpg"
                                             data-large="images/eventos/nuestros-eventos/16/img_asam_01.jpg" />
                                    </div>
                                    <div class="sp-slide">
                                        <img class="sp-image" src="plugins/slider-pro/css/images/blank.gif"
                                             data-src="images/eventos/nuestros-eventos/16/img_asam_02.jpg"
                                             data-small="images/eventos/nuestros-eventos/16/img_asam_02.jpg"
                                             data-medium="images/eventos/nuestros-eventos/16/img_asam_02.jpg"
                                             data-large="images/eventos/nuestros-eventos/16/img_asam_02.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;
        }


        return response()->json(['Resp' => $code, 'i' => $indice]);
    }
}
