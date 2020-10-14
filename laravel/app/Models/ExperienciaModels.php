<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $titulo
 * @property string $subtitulo
 * @property string $imggal
 * @property string $imgint
 * @property string $portada
 * @property string $color
 * @property string $color_titulo
 * @property string $lang
 * @property string $contenido
 * @property string $duracion
 * @property string $reservacion
 * @property string $salida
 * @property string $sugerencia
 * @property string $include
 * @property string $recomendacion
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 */
class ExperienciaModels extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'experiencias';

    /**
     * @var array
     */
    protected $fillable = ['titulo', 'subtitulo', 'imggal', 'imgint', 'portada', 'color','color_titulo', 'lang', 'contenido',
    'duracion', 'reservacion', 'salida', 'sugerencia', 'include', 'recomendacion', 'status', 'created_at', 'updated_at'];

}
