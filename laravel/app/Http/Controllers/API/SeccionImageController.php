<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SeccionesImageModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SeccionImageController extends Controller
{

    	private $_ubicacion=['destinos.oaxaca.slider'=>'images/destinos/des-cd-oaxaca/',
    	'destinos.sierrasur.slider'=>'images/destinos/des-sierra-juarez/',
    	'home.elegirnos.congreso'=>'images/por-que/congresos/',
    	'home.elegirnos.exposiciones'=>'images/por-que/exposiciones/',];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img=$request->allFiles();
        $imgGal=Str::lower(Str::random(2)) . time() .$img['img']->getClientOriginalName();
        $img['img']->move($this->_ubicacion[$request->ubicacion], $imgGal);
        $posicion=SeccionesImageModels::where('id_seccion',$request->id_seccion)->count()+1;

        $seccionImagen=new SeccionesImageModels();
        $seccionImagen->img=$imgGal;
        $seccionImagen->titulo=$this->_ubicacion[$request->ubicacion];
        $seccionImagen->pie_pagina="";
        $seccionImagen->id_seccion=$request->id_seccion;
        $seccionImagen->posicion=$posicion;
        if($seccionImagen->save()){
             return response()->json([
             'message' => 'Imagen Agregada',
             'images'=>SeccionesImageModels::where('id_seccion',$request->id_seccion)->orderBy('posicion')->get()]);
        }
        else{
             return response()->json([
             'message' => 'Hubo algun error'],401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return;
    }
    public function updatePosicion(Request $request, $id){
        $img=SeccionesImageModels::find($id);
        $img->posicion=$request->orden;
        $img->update();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $img=SeccionesImageModels::find($id);
        $img->pie_pagina=$request->pie_pagina;
        if($img->update()){
            return response()->json(['response'=>'Acualizado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img=SeccionesImageModels::find($id);
         if(File::exists(public_path('//'.$img->titulo.$img->img))) {
            File::delete(public_path('//'.$img->titulo.$img->img));
         }
         $id_seccion=$img->id_seccion;
         if($img->delete()){
             return response()->json([
             'message' => 'Imagen Eliminada',
             'images'=>SeccionesImageModels::where('id_seccion',$id_seccion)->orderBy('posicion')->get()]);
         }
         else{
             return response()->json([
             'message' => 'Hubo algun error'],401);
         }
    }
}
