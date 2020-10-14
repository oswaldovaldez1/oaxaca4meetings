<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GalleryImageModels;

class GalleryModels extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'galeria';

    /**
    * The primary key for the model.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
    * @var array
    */
    protected $fillable =['id','titulo','contexto','portada','lang','created_at','updated_at'];
    public function images(){

     return $this->hasMany(GalleryImageModels::class,'id_galeria');
    }
}
