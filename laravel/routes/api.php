<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/getinfoevent/{i}/{lang}', 'InformacionController@getInfoEvent');
//Route::get('/session/{s}', 'FuncionesApiController@setSession');
Route::post('/sendmail', 'MailController@sendMail');
Route::resource('blog', 'BlogController')->middleware('auth:api');
Route::resource('seccion', 'SeccionesController')->middleware('auth:api');
Route::resource('seccionimage', 'SeccionImageController')->middleware('auth:api');
Route::resource('gallery', 'GalleryController')->middleware('auth:api');
Route::resource('galleryimage', 'GalleryImageController')->middleware('auth:api');
Route::resource('experiencias', 'ExperienciasController')->middleware('auth:api');
Route::post('blog/image', 'BlogController@upImage')->middleware('auth:api');
Route::delete('blog/image/{id}', 'BlogController@downImage')->middleware('auth:api');
Route::put('blog/pub/{id}', 'BlogController@updatePosition')->middleware('auth:api');
Route::put('seccionimage/orden/{id}', 'SeccionImageController@updatePosicion')->middleware('auth:api');
Route::put('gallery/orden/{id}', 'GalleryController@updatePosicion')->middleware('auth:api');
Route::put('galleryimage/orden/{id}', 'GalleryImageController@updatePosicion')->middleware('auth:api');




Route::get('user','AuthController@index')->middleware('auth:api');
Route::get('user/{id}','AuthController@getUser')->middleware('auth:api');

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup')->middleware('auth:api');
    Route::post('setimage','AuthController@setImage')->middleware('auth:api');
    Route::put('user/{id}','AuthController@update')->middleware('auth:api');
    Route::delete('user/{id}','AuthController@deleteUser')->middleware('auth:api');


    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        Route::get('logout', 'AuthController@logout');

//Route::get('user', 'AuthController@user');
});
});
