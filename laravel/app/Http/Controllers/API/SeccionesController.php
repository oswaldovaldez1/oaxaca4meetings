<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SeccionesModels;
use App\Models\SeccionesImageModels;

class SeccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return SeccionesModels::orderBy('lang','DESC')->get();
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
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $seccion=SeccionesModels::find($id);
        if($seccion->tipo==='S' && $seccion->lang==='en'){
            $this->verificarSlider($seccion->ubicacion,$id);
        }
        return SeccionesModels::with('images')->find($id);
    }
    private function verificarSlider($texto,$id){
        $seccion=SeccionesModels::where('ubicacion',$texto)->where('lang','es')->first();
        $galeria=SeccionesImageModels::where('id_seccion',$seccion->id)->get();
        //dd(SeccionesImageModels::where('id_seccion',$seccion->id)->count());
        foreach ($galeria as $item) {
            if(SeccionesImageModels::where('id_seccion',$id)->where('img',$item->img)->count()===0){
                $img=new SeccionesImageModels();
                $img->img=$item->img;
                $img->titulo=$item->titulo;
                $img->pie_pagina='';
                $img->id_seccion=$id;
                $img->save();
            }
        }
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $seccion=SeccionesModels::find($id);
        $seccion->titulo1=$request->titulo1;
        $seccion->titulo2=$request->titulo2;
        $seccion->subtitulo=$request->subtitulo;
        $seccion->contexto=$request->contexto;
        $seccion->fuente=$request->fuente;
        if($seccion->update()){
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
        return;
    }
}
