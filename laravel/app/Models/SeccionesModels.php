<?php

namespace App\Models;

use App\Models\SeccionesImageModels;
use Illuminate\Database\Eloquent\Model;

class SeccionesModels extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'secciones';

    /**
    * The primary key for the model.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
    * @var array
    */
    protected $fillable =
    ['id','ubicacion','titulo1','titulo2','subtitulo','contexto','portada','fuente','lang','created_at','updated_at'];
public function images(){

return $this->hasMany(SeccionesImageModels::class,'id_seccion');
}
}
