<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeccionesModels;
use App\Models\SeccionesImageModels;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        
         $lang=$request->session()->get('lang');
         
         if($lang===null){
             $lang='ES';
         $request->session()->put('lang', 'ES');
         }
$lang=strtolower($lang);

        $banner=SeccionesModels::where('ubicacion','home.banner')->where('lang',$lang)->first();
        $congreso=SeccionesModels::where('ubicacion','home.elegirnos.congreso')->where('lang',$lang)->first();
        //dd($lang);
        $congreso=SeccionesImageModels::where('id_seccion',$congreso->id)->get();
        $exposiciones=SeccionesModels::where('ubicacion','home.elegirnos.exposiciones')->where('lang',$lang)->first();
        $exposiciones=SeccionesImageModels::where('id_seccion',$exposiciones->id)->get();
        $quienesSomos=SeccionesModels::where('ubicacion','home.acercade.quienessomos')->where('lang',$lang)->first();
        $mision=SeccionesModels::where('ubicacion','home.acercade.mision')->where('lang',$lang)->first();
        $evento=SeccionesModels::where('ubicacion','home.acercade.eventos')->where('lang',$lang)->first();
        $eventos=SeccionesModels::where('ubicacion','home.eventos')->where('lang',$lang)->first();

        

        return view('home.index',compact('banner','congreso','exposiciones','quienesSomos','mision','evento','eventos'));
    }
}
