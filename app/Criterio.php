<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Criterio extends Model
{
    //softdelete para "eliminar" un registro en la bd, solo coloca un timestamp en el campo "deleted_at"
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'criterios';
    protected $fillable = ['id', 'valor', 'criterio', 'descripcion'];

    /* ------------------------------------------------------------ */

    // CRITERIOS (*)---------(1) ENCUESTA ONE TO MANY INVERSE
    public function encuesta(){
        return $this->belongsTo('App\Encuesta');
    }


}
