<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_img_publicacion
 * @property int $id_publicacion
 * @property string $nombre_imagen_publicacion
 * @property string $archivo_imagen_publicacion
 * @property int $pos_imagen_publicacion
 * @property boolean $status_imagen_publicacion
 * @property string $created_at
 * @property string $updated_at
 */
class PubImageModels extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_images_publicaciones';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_img_publicacion';

    /**
     * @var array
     */
    protected $fillable = ['id_publicacion', 'nombre_imagen_publicacion', 'archivo_imagen_publicacion', 'pos_imagen_publicacion', 'status_imagen_publicacion', 'created_at', 'updated_at'];

    public function publicacion(){
        return $this->belongsTo(PublicacionesModels::class);
    }
}
