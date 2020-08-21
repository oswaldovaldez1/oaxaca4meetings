<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::view('/admin/{any}', 'app')->where('any', '.*');
// Route::get('/admin/{any}', function () {
//     return view('app');
// })->where('any', '.*');
//Route::view('/', 'home.index');

use Illuminate\Http\Request;

Route::get('/admin/{vue_capture?}', function () {
return view('app');
})->where('vue_capture', '[\/\w\.-]*');

Route::get('/', 'HomeController@index');

// Route::get('/?mod=viajes-oaxaca-sofisticado', function () {
//     dd(request()->input());
//     return redirect('/viajes-oaxaca-sofisticado');
// });


// Route::get('/viajes-oaxaca-sofisticado', function () {
//     echo 'hola';
// });


// Route::get('/blog/los-5-artistas-contemporáneos-oaxaqueños', function () {
//     echo 'hola esto es una ruta';
// });
//Rutas amigables

Route::get('/cd-oaxaca', function () {
    return view('destinos.index');
});

Route::get('/sierra-juarez', function () {
    return view('destinos.index');
});


Route::get('/nuestros-eventos', function () {
    return view('eventos.index');
});

// Route::get('/blog', function () {
//     return view('blog.index');
// });

Route::get('/blog', 'PublicacionesController@index');
Route::get('/blog/{year}/{month}', 'PublicacionesController@getPublicaciones');
Route::get('/blog/post/{title}', 'PublicacionesController@getPublicacion');
Route::get('/experiencia/{title}', 'ViajesController@getViaje');
Route::get('/session/{s}', function (Request $request, $s) {
    $request->session()->put('lang', $s);
    return redirect()->to(redirect()->back()->getTargetUrl());
    //return redirect()->back()->getTargetUrl();
});
