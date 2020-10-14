<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SeccionesModels;

class SeccionesImageModels extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'seccion_image';

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
    ['id','img','titulo','pie_pagina','id_seccion','created_at','updated_at'];

     public function publicacion(){
     return $this->belongsTo(SeccionesModels::class);
     }
}
