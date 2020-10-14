<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PubImageModels;
use App\Models\PublicacionesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PublicacionesModels::all();
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
        $body=json_decode($request->body);
        $publicacion=new PublicacionesModels();


        if(array_key_exists('portada',$img)){

                $body->imagen_publicacion = Str::lower(Str::random(2)) . time() . $img['portada']->getClientOriginalName();
                $img['portada']->move('publicaciones/', $body->imagen_publicacion);

        }

        $publicacion->id_usuarios=$body->id_usuarios;
        $publicacion->titulo_publicacion=$body->titulo_publicacion;
        $publicacion->sub_titulo_publicacion=$body->sub_titulo_publicacion;
        $publicacion->contenido_publicacion=$body->contenido_publicacion;
        $publicacion->imagen_publicacion=$body->imagen_publicacion;
        $publicacion->fecha_publicacion=date("Y-m-d", strtotime($body->fecha_publicacion));
        $publicacion->status_publicacion =$body->status_publicacion;
        $publicacion->etiquetas=json_encode($body->etiquetas,JSON_UNESCAPED_SLASHES);
        $publicacion->lang=$body->lang;
        $publicacion->id_seccion= 1;
        $publicacion->idbase=1;
        if($publicacion->save()){
            $publicacion->idbase=$publicacion->id_publicacion;
            $publicacion->update();
            return response()->json([
            'message' => 'Publicacion Agregada',
            'publicacion'=>$publicacion
            ]);
        }
        else{
            return response()->json([
            'message' => 'Hubo algun error', 'publicacion'=>$publicacion],401);
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
        return PublicacionesModels::with(['images'=>function($query){
            $query->orderBy('pos_imagen_publicacion');
        }])->find($id);
    }
    public function updatePosition(Request $request, $id){
        $pubImg=PubImageModels::find($id);
        $pubImg->pos_imagen_publicacion=$request->orden;
        $pubImg->update();

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
        $body=json_decode($request->body);
        $publicacion=PublicacionesModels::find($id);


        if(array_key_exists('portada',$img)){

            if($publicacion->imagen_publicacion!='' || $publicacion->imagen_publicacion!=null){
            if(File::exists(public_path('//publicaciones/.$publicacion->imagen_publicacion'))) {
                    File::delete(public_path('//publicaciones/.$publicacion->imagen_publicacion'));
            }
            $body->imagen_publicacion = Str::lower(Str::random(2)) . time() . $img['portada']->getClientOriginalName();
            $img['portada']->move('publicaciones/', $body->imagen_publicacion);

            }

        }

        $publicacion->id_usuarios=$body->id_usuarios;
        $publicacion->titulo_publicacion=$body->titulo_publicacion;
        $publicacion->sub_titulo_publicacion=$body->sub_titulo_publicacion;
        $publicacion->contenido_publicacion=$body->contenido_publicacion;
        $publicacion->imagen_publicacion=$body->imagen_publicacion;
        $publicacion->fecha_publicacion=$body->fecha_publicacion;
        $publicacion->status_publicacion =$body->status_publicacion;
        $publicacion->etiquetas=json_encode($body->etiquetas,JSON_UNESCAPED_SLASHES);
        $publicacion->lang=$body->lang;
        if($publicacion->update()){
            return response()->json([
            'message' => 'Publicacion Actualizada',
            'publicacion'=>$publicacion
            ]);
        }
        else{
            return response()->json([
            'message' => 'Hubo algun error', 'publicacion'=>$publicacion],401);
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
        $pub= PublicacionesModels::find($id);
        $imgpub=PubImageModels::where('id_publicacion',$pub->idbase)->get();
        foreach ($imgpub as $img) {
            if(File::exists(public_path('//publicaciones/'.$img->archivo_imagen_publicacion))) {
                File::delete(public_path('//publicaciones/'.$img->archivo_imagen_publicacion));
            }
        }
        if(File::exists(public_path('//publicaciones/'.$pub->imagen_publicacion))) {
            File::delete(public_path('//publicaciones/'.$pub->imagen_publicacion));
        }
        if($pub->delete()){
            return response()->json([
            'message' => 'Publicación eliminada']);
        }
        else{
          return response()->json([
          'message' => 'Hubo algun error'],401);
        }

    }

    public function upImage(Request $request){
        $id=$request->header('id');
        $img=$request->allFiles();

        $orden = PubImageModels::where('id_publicacion',$id)->orderBy('pos_imagen_publicacion','desc')->first();
        if($orden===null){
            $orden=1;
        }
        else{
            $orden=$orden->pos_imagen_publicacion+1;
        }


        $nombre = Str::lower(Str::random(2)) . time() . $img['img']->getClientOriginalName();
        $img['img']->move('publicaciones/', $nombre);

        $gallery=new PubImageModels();
        $gallery->archivo_imagen_publicacion=$nombre;
        $gallery->id_publicacion=$id;
        $gallery->nombre_imagen_publicacion=$nombre;
        $gallery->pos_imagen_publicacion=$orden;
        $gallery->status_imagen_publicacion=1;
        if($gallery->save()){

            return response()->json([
            'message' => 'Imagen Agregada',
            'images'=>PubImageModels::where('id_publicacion',$id)->orderBy('pos_imagen_publicacion')->get()]);
        }
        else{
            return response()->json([
            'message' => 'Hubo algun error'],401);
        }
    }
    public function downImage($id){
        $gallery=PubImageModels::find($id);
        $idpub=$gallery->id_publicacion;

        if(File::exists(public_path('//publicaciones/'.$gallery->archivo_imagen_publicacion))) {
            File::delete(public_path('//publicaciones/'.$gallery->archivo_imagen_publicacion));
        }

        if($gallery->delete()){

            $index=1;
            foreach(PubImageModels::where('id_publicacion',$idpub)->orderBy('pos_imagen_publicacion')->get() as $item){
                $item->pos_imagen_publicacion=$index;
                $item->update();
                $index=$index+1;
            }

            return response()->json([
            'message' => 'Imagen Eliminada',
            'images'=>PubImageModels::where('id_publicacion',$idpub)->orderBy('pos_imagen_publicacion')->get()]);
        }
        else{
            return response()->json([
            'message' => 'Hubo algun error'],401);
        }
    }
}
