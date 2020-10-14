<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\GalleryImageModels;
use App\Models\GalleryModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return GalleryImageModels::where('id_galeria',$request->header('id'))->orderBy('orden')->get();
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
        $img=$request->allFiles();
        $imgGal=Str::lower(Str::random(2)) . time() .$img['img']->getClientOriginalName();
        $img['img']->move('images/eventos/nuestros-eventos/'.$id.'/', $imgGal);

        $gal=new GalleryImageModels();
        $gal->id_galeria=$id;
        $gal->orden=$request->orden;
        $gal->img='images/eventos/nuestros-eventos/'.$id.'/'.$imgGal;

        if($gal->save()){
            return response()->json([
            'message' => 'Imagen Agregada',
            'galeria'=>GalleryImageModels::where('id_galeria',$id)->orderBy('orden')->get()
            ]);
        }
        else{
            return response()->json([
            'message' => 'Hubo algun error',
            'galeria'=>GalleryImageModels::where('id_galeria',$id)->orderBy('orden')->get()],401);
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
        $gallery=GalleryImageModels::find($id);
        $idpub=$gallery->id_galeria;

        if(File::exists(public_path('//'.$gallery->img))) {
            File::delete(public_path('//'.$gallery->img));
        }

        if($gallery->delete()){

            $index=1;
            foreach(GalleryImageModels::where('id_galeria',$idpub)->orderBy('orden')->get() as
            $item){
                $item->orden=$index;
                $item->update();
                $index=$index+1;
            }

            return response()->json([
            'message' => 'Imagen Eliminada',
            'images'=>GalleryImageModels::where('id_galeria',$idpub)->orderBy('orden')->get()]);
        }
        else{
            return response()->json([
            'message' => 'Hubo algun error'],401);
        }
    }
    public function updatePosicion(Request $request, $id){
        $img=GalleryImageModels::find($id);
        $img->orden=$request->orden;
        $img->update();
    }
}
