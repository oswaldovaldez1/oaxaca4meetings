<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Request $request){
        if (!$request->session()->has('lang')) {
            $request->session()->put('lang','MX');
        }
        //echo CountryFlag::get('MX');
//        echo "<p>".country_flag('US')."</p>";

//dd(request());
    return view('home.index');
    }
    /*
    if (request()->has('mod')) {
    if (request()->input('mod') === 'blog-ver-post') {
    if (request()->input('i') === '4') {
    $ruta = '/blog/los-5-artistas-contemporáneos-oaxaqueños';
    return redirect($ruta);
    }
    }
    $ruta = '/' . request()->input('mod');

    //dd($ruta);
    return redirect($ruta);
    } else {
    return view('home.index');
    }
    */
}
