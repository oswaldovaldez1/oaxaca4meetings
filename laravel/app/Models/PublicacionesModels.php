<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_publicacion
 * @property int $id_usuarios
 * @property int $id_seccion
 * @property string $titulo_publicacion
 * @property string $sub_titulo_publicacion
 * @property string $contenido_publicacion
 * @property string $imagen_publicacion
 * @property string $fecha_publicacion
 * @property boolean $status_publicacion
 * @property string $created_at
 * @property string $updated_at

 */
class PublicacionesModels extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_publicaciones';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_publicacion';

    /**
     * @var array
     */
    protected $fillable = ['id_usuarios', 'id_seccion', 'titulo_publicacion', 'sub_titulo_publicacion', 'contenido_publicacion', 'imagen_publicacion', 'fecha_publicacion', 'status_publicacion', 'created_at', 'updated_at'];

    public function images(){
        return $this->hasMany(PubImageModels::class,'id_publicacion');
    }
}
