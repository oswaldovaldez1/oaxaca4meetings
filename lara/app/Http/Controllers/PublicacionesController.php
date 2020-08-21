<?php

namespace App\Http\Controllers;

use App\Models\PubImageModels;
use Illuminate\Http\Request;
use App\Models\PublicacionesModels;
use Illuminate\Support\Facades\DB;

class PublicacionesController extends Controller
{
    private $_mes = [
        'enero' => 1,
        'febrero' => 2,
        'marzo' => 3,
        'abril' => 4,
        'mayo' => 5,
        'junio' => 6,
        'julio' => 7,
        'agosto' => 8,
        'septiembre' => 9,
        'ocbubre' => 10,
        'noviembre' => 11,
        'diciembre' => 12,
    ];
    public function index()
    {
        $publicaciones = $this->getPubUpAll();
        $anios = $this->getCountyear();

        return view('blog.index', compact('publicaciones', 'anios'));
    }
    public function getPublicacion($title)
    {
        $title = str_replace("-", " ", $title);
        $publicacion = $this->getPubByTitle($title);
        $fotos = $this->getFotos($publicacion->id_publicacion);
        $anios = $this->getCountyear();
        return view('blog.post', compact('publicacion', 'anios', 'fotos'));
    }
    public function getFotos($id)
    {
        return PubImageModels::where('id_publicacion', $id)->get();
    }
    public function getPublicaciones($year, $month)
    {
        if ($year === 'post') {
            return $this->getPublicacion($month);
        }
        $publicaciones = $this->getPubByDate($year, $this->_mes[$month]);
        $anios = $this->getCountyear();
        return view('blog.index', compact('publicaciones', 'anios'));
    }
    private function getPubUpAll()
    {
        return PublicacionesModels::where('status_publicacion', 1)->orderBy('fecha_publicacion', 'DESC')->get();
    }
    private function getPubAll()
    {
        return PublicacionesModels::all();
    }
    private function getCountyear()
    {
        return PublicacionesModels::select(DB::raw('YEAR(fecha_publicacion) as anio, COUNT(*) as total'))->where('status_publicacion', 1)->groupBy('anio')->orderBy('anio', 'DESC')->get();
    }
    private function getPubByTitle($title)
    {
        return PublicacionesModels::where('titulo_publicacion', $title)->where('status_publicacion', 1)->first();
    }

    private function getPubByDate($year, $month)
    {
        return PublicacionesModels::where('status_publicacion', 1)->where(DB::raw('YEAR(fecha_publicacion)'), $year)->where(DB::raw('MONTH(fecha_publicacion)'), $month)->orderBy('fecha_publicacion', 'DESC')->get();
    }
}
