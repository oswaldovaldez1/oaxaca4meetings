<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryModels;
use App\Models\GalleryImageModels;

class EventosController extends Controller
{
    public function index(Request $request){
        $lang=$request->session()->get('lang');
        if($lang===null){
            $lang='ES';
         $request->session()->put('lang', 'ES');
        }
        $lang=strtolower($lang);
        $galeria=GalleryModels::where('lang',$lang)->orderBy('orden')->get();
        $slider=GalleryImageModels::where('id_galeria',13)->get();
        return view('eventos.index',compact('galeria','slider'));
    }
}
