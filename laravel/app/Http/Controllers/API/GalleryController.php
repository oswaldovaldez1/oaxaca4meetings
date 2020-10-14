<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GalleryModels;
use App\Models\GalleryImageModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    private function verificarGaleria(){
        $seccion=GalleryModels::where('lang','es')->get();
        foreach ($seccion as $item) {
            if(GalleryModels::where('lang','en')->where('portada',$item->portada)->count()===0){
                $galery=new GalleryModels();
                $galery->titulo=$item->titulo;
                $galery->portada=$item->portada;
                $galery->contexto=$item->contexto;
                $galery->lang='en';
                $galery->idbase=$item->idbase;
                $galery->orden=$item->orden;
                $galery->save();
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->header('lang')==='en'){
            $this->verificarGaleria();
        }
        return GalleryModels::where('lang',$request->header('lang'))->orderBy('orden')->get();
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
    private function limpiar($txt){
        $txt=str_replace('</p><p><br></p><p>','<br>',$txt);
        $txt=str_replace('</p><p>','<br>',$txt);
        $txt=str_replace('<p>','',$txt);
        return str_replace('</p>','',$txt);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imgs=$request->allFiles();
        $orden=GalleryModels::where('lang',$request->lang)->count();
        $last=GalleryModels::orderBy('id','desc')->first();

        $_gallery=new GalleryModels();
        $_gallery->titulo=$request->titulo;
        $_gallery->contexto=$this->limpiar($request->contexto);
        $_gallery->lang=$request->lang;
        $_gallery->orden=$orden+1;
        $_gallery->idbase=$last->id+1;

        $portada= Str::lower(Str::random(2)) . time() .$imgs['portada']->getClientOriginalName();
        $imgs['portada']->move('images/eventos/nuestros-eventos/', $portada);

        $_gallery->portada='images/eventos/nuestros-eventos/'.$portada;
        if($_gallery->save()){

            FILE::makeDirectory(public_path('//images/eventos/nuestros-eventos/'.$_gallery->idbase),0777,true,true);

            unset($imgs['portada']);
            $index=1;
            foreach($imgs as $img){
                $imgGal=Str::lower(Str::random(2)) . time() .$img->getClientOriginalName();
                $img->move('images/eventos/nuestros-eventos/'.$_gallery->idbase.'/', $imgGal);

                $gal=new GalleryImageModels();
                $gal->id_galeria=$_gallery->idbase;
                $gal->orden=$index;
                $gal->img='images/eventos/nuestros-eventos/'.$_gallery->idbase.'/'.$imgGal;

                $gal->save();
                $index=$index+1;

            }
                    return response()->json([
                    'message' => 'Evento Agregado',
                    'galeria'=>GalleryModels::where('lang',$request->lang)->orderBy('orden')->get()
                    ]);
        }
        else{
            return response()->json([
            'message' => 'Hubo algun error',
            'galeria'=>GalleryModels::where('lang',$request->lang)->orderBy('orden')->get()],401);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imgs=$request->allFiles();
        $_gallery=GalleryModels::find($id);

        if(array_key_exists('portada',$imgs)){
            if(File::exists(public_path('//'.$_gallery->portada))) {
                File::delete(public_path('//'.$_gallery->portada));
            }
            $portada= Str::lower(Str::random(2)) . time() .$imgs['portada']->getClientOriginalName();
            $imgs['portada']->move('images/eventos/nuestros-eventos/', $portada);

            $_gallery->portada='images/eventos/nuestros-eventos/'.$portada;
        }
        $_gallery->titulo=$request->titulo;
        $_gallery->contexto=$this->limpiar($request->contexto);
        if($_gallery->update()){
            return response()->json([
            'message' => 'Evento Actualizado',
            'img'=>$_gallery]);
        }
        else{
            return response()->json([
            'message' => 'Hubo algun error',
            'img'=>$_gallery],401);
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
        $_gallery=GalleryModels::find($id);
        if(File::exists(public_path('//'.$_gallery->portada))) {
            File::delete(public_path('//'.$_gallery->portada));
        }

        foreach (GalleryImageModels::where('id_galeria',$_gallery->id)->orderBy('orden')->get() as $item) {
            if(File::exists(public_path('//'.$item->img))) {
                File::delete(public_path('//'.$item->img));
            }
            $item->delete();
        }

        FILE::deleteDirectory(public_path('//images/eventos/nuestros-eventos/'.$_gallery->id));

        if($_gallery->delete()){

            return response()->json([
            'message' => 'Evento Eliminado']);
       }
       else{
            return response()->json([
            'message' => 'Hubo algun error'],401);
       }


    }
    public function updatePosicion(Request $request, $id){
        $img=GalleryModels::find($id);
        $img->orden=$request->orden;
        $img->update();
    }
}
