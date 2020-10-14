<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GalleryModels;

class GalleryImageModels extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'galeria_imagen';

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
    ['id','img','id_galeria','created_at','updated_at'];

    public function publicacion(){
    return $this->belongsTo(GalleryModels::class);
    }
}
