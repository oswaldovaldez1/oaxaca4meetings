<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeccionesModels;
use App\Models\SeccionesImageModels;

class DestinosController extends Controller
{
    public function oaxaca(Request $request){
        $lang=$request->session()->get('lang');
        if($lang===null){
            $lang='ES';
         $request->session()->put('lang', 'ES');
        }
        $lang=strtolower($lang);
        $slider=SeccionesModels::where('ubicacion','destinos.oaxaca.slider')->where('lang',$lang)->first();
        $slider=SeccionesImageModels::where('id_seccion',$slider->id)->get();
        $contexto=SeccionesModels::where('ubicacion','destinos.oaxaca.contexto')->where('lang',$lang)->first();
        $conectividad=SeccionesModels::where('ubicacion','destinos.oaxaca.conectividad')->where('lang',$lang)->first();
        $hospedaje=SeccionesModels::where('ubicacion','destinos.oaxaca.hospedaje')->where('lang',$lang)->first();
        $espacios=SeccionesModels::where('ubicacion','destinos.oaxaca.espacios')->where('lang',$lang)->first();
        $actividades=SeccionesModels::where('ubicacion','destinos.oaxaca.actividades')->where('lang',$lang)->first();

        
        return view('destinos.index', compact('slider','contexto','conectividad','hospedaje','espacios','actividades'));
    }
    public function sierraSur(Request $request){
        $lang=$request->session()->get('lang');
        if($lang===null){
            $lang='ES';
         $request->session()->put('lang', 'ES');
        }
        $lang=strtolower($lang);
        $slider=SeccionesModels::where('ubicacion','destinos.sierrasur.slider')->where('lang',$lang)->first();
        $slider=SeccionesImageModels::where('id_seccion',$slider->id)->get();
        $contexto=SeccionesModels::where('ubicacion','destinos.sierrasur.contexto')->where('lang',$lang)->first();
        $conectividad=SeccionesModels::where('ubicacion','destinos.sierrasur.conectividad')->where('lang',$lang)->first();
        $hospedaje=SeccionesModels::where('ubicacion','destinos.sierrasur.hospedaje')->where('lang',$lang)->first();
        $espacios=SeccionesModels::where('ubicacion','destinos.sierrasur.espacios')->where('lang',$lang)->first();
        $actividades=SeccionesModels::where('ubicacion','destinos.sierrasur.actividades')->where('lang',$lang)->first();

        
        return view('destinos.index', compact('slider','contexto','conectividad','hospedaje','espacios','actividades'));
    }
}
