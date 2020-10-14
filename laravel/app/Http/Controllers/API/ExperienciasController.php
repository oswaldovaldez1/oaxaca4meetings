<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExperienciaModels;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ExperienciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ExperienciaModels::all();
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


        $imgs=$request->allFiles();

         $body=json_decode($request->body);
         $body->contenido=str_replace('<p class="ql-align-center">','<p>',$body->contenido);
         $body->contenido=str_replace('<p class="ql-align-right">','<p>',$body->contenido);
         $body->contenido=str_replace('<p class="ql-align-justify">','<p>',$body->contenido);

         $body->portada = Str::lower(Str::random(2)) . time() . $imgs['portada']->getClientOriginalName();
         $imgs['portada']->move('images/experiencias/', $body->portada);
         $body->portada='/images/experiencias/'.$body->portada;

         $body->imggal = Str::lower(Str::random(2)) . time() . $imgs['galeria']->getClientOriginalName();
         $imgs['galeria']->move('images/experiencias/', $body->imggal);
         $body->imggal='/images/experiencias/'.$body->imggal;

         $body->imgint = Str::lower(Str::random(2)) . time() . $imgs['fondo']->getClientOriginalName();
         $imgs['fondo']->move('images/experiencias/', $body->imgint);
         $body->imgint='/images/experiencias/'.$body->imgint;


            $travel=new ExperienciaModels();
            $travel->titulo=$body->titulo;
            $travel->subtitulo=$body->subtitulo;
            $travel->imggal=$body->imggal;
            $travel->imgint=$body->imgint;
            $travel->portada=$body->portada;
            $travel->color=$body->color;
            $travel->color_titulo=$body->color_titulo;
            $travel->lang=$body->lang;
            $travel->contenido=$body->contenido;
            $travel->duracion=$body->duracion;
            $travel->reservacion=$body->reservacion;
            $travel->salida=$body->salida;
            $travel->sugerencia=$body->sugerencia;
            $travel->include=$body->include;
            $travel->recomendacion=$body->recomendacion;
            $travel->status=$body->status;

            if($travel->save()){
                return response()->json([
                    'message' => 'Experiencia Agregada',
                    'experiencia'=>$travel
                ]);
            }
            else{
                   return response()->json([
                    'message' => 'Hubo algun error', 'experiencia'=>$body],401);
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
        return ExperienciaModels::find($id);
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
         $travel=ExperienciaModels::find($id);

         $body=json_decode($request->body);
         $body->contenido=str_replace('<p class="ql-align-center">','<p>',$body->contenido);
         $body->contenido=str_replace('<p class="ql-align-right">','<p>',$body->contenido);
         $body->contenido=str_replace('<p class="ql-align-justify">','<p>',$body->contenido);

         if(array_key_exists('portada',$imgs)){
              if(File::exists(public_path($travel->portada))) {
                    File::delete(public_path($travel->portada));
              }
             $body->portada = Str::lower(Str::random(2)) . time() . $imgs['portada']->getClientOriginalName();
             $imgs['portada']->move('images/experiencias/', $body->portada);
             $body->portada='/images/experiencias/'.$body->portada;

         }
         if(array_key_exists('galeria',$imgs)){
             if(File::exists(public_path($travel->imggal))) {
                File::delete(public_path($travel->imggal));
             }
             $body->imggal = Str::lower(Str::random(2)) . time() . $imgs['galeria']->getClientOriginalName();
             $imgs['galeria']->move('images/experiencias/', $body->imggal);
             $body->imggal='/images/experiencias/'.$body->imggal;
        }
        if(array_key_exists('fondo',$imgs)){
             if(File::exists(public_path($travel->imgint))) {
                File::delete(public_path($travel->imgint));
             }
            $body->imgint = Str::lower(Str::random(2)) . time() . $imgs['fondo']->getClientOriginalName();
            $imgs['fondo']->move('images/experiencias/', $body->imgint);
            $body->imgint='/images/experiencias/'.$body->imgint;
        }



            $travel->titulo=$body->titulo;
            $travel->subtitulo=$body->subtitulo;
            $travel->imggal=$body->imggal;
            $travel->imgint=$body->imgint;
            $travel->portada=$body->portada;
            $travel->color=$body->color;
            $travel->color_titulo=$body->color_titulo;
            $travel->lang=$body->lang;
            $travel->contenido=$body->contenido;
            $travel->duracion=$body->duracion;
            $travel->reservacion=$body->reservacion;
            $travel->salida=$body->salida;
            $travel->sugerencia=$body->sugerencia;
            $travel->include=$body->include;
            $travel->recomendacion=$body->recomendacion;
            $travel->status=$body->status;

            if($travel->update()){
                return response()->json([
                    'message' => 'Experiencia Actualizada',
                    'experiencia'=>$travel
                ]);
            }
            else{
                   return response()->json([
                    'message' => 'Hubo algun error', 'experiencia'=>$body],401);
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
        $travel=ExperienciaModels::find($id);
        if($travel!=null){
            if(File::exists(public_path($travel->portada))) {
            File::delete(public_path($travel->portada));
            }
            if(File::exists(public_path($travel->imggal))) {
            File::delete(public_path($travel->imggal));
            }
            if(File::exists(public_path($travel->imgint))) {
            File::delete(public_path($travel->imgint));
            }
        }
        if($travel->delete()){
            return response()->json([
            'message' => 'Experiencia eliminada']);
        }
        else{
            return response()->json([
            'message' => 'Hubo algun error'],401);
        }
    }
}
