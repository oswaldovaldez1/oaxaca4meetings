<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\PublicacionesModels;
use Illuminate\Support\Facades\DB;

class FuncionesController extends Controller
{

    public static function remplazar($texto, $busqueda, $remplazo, $type)
    {
        switch ($type) {
            case 'l'; {
                    return mb_strtolower(str_replace($busqueda, $remplazo, $texto));
                }
            case 'u': {
                    return mb_strtolower(str_replace($busqueda, $remplazo, $texto));
                }
            case 'n': {
                    return mb_strtolower($busqueda, $remplazo, $texto);
                }
        }
    }
    public static function limpiarHtml($texto){
         return strip_tags($texto, '<strong><br>');
    }


    public static function limpiarHtmls($texto){
    return strip_tags($texto, '<strong><br><span><p><a><b>');
        }
    public static function remplazarHtml($texto,$busqueda,$remplazo){
        return str_replace($busqueda, $remplazo,  $texto);
    }
    public static function limpiar($texto)
    {
        //$texto =
        return str_replace('\\', '',  $texto);
        // return strip_tags($texto, '<br><ul><li><a>');
    }

    public static function getDateFormat($fecha, $tipo,$lang)
    {
        //Carbon::setlocale('es');

        Carbon::setlocale($lang);
        $fecha = Carbon::parse($fecha);

        switch ($tipo) {
            case 'D': {
                    return $fecha->day;
                }
            case 'M': {
                    return substr(ucfirst($fecha->translatedFormat('F')), 0, 3);
                }
            case 'Y': {
                    return $fecha->year;
                }
            case 'MF': {
                    return ucfirst($fecha->translatedFormat('F'));
                }
            case 'MFl': {
                    return strtolower($fecha->translatedFormat('F'));
                }
        }
    }
    public static function resumir($texto, $limite, $car = ".", $final = "…")
    {
        $txt = "";
        $texto = str_replace('\\', '',  $texto);
        $texto = strip_tags($texto, '<br><ul><li>');
        if (strlen($texto) <= $limite) return $texto;

        if (false !== ($breakpoint = strpos($texto, $car, $limite))) {
            $val = strlen($texto) - 1;
            if ($breakpoint < $val) {
                $txt = substr($texto, 0, $breakpoint) . $final;
            }
        }
        if (strpos($txt, "Fuente") > 0) {
            $txt = substr($texto, 0, strpos($texto, "Fuente"));
        }
        return $txt;
    }

    public static function getCountMonth($year)
    {
        return PublicacionesModels::select(DB::raw('Month(fecha_publicacion) as mes, COUNT(*) as total'))->where('status_publicacion', 1)->where(DB::raw('YEAR(fecha_publicacion)'), $year)->groupBy('mes')->orderBy('mes', 'DESC')->get();
    }
}
