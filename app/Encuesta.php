<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Encuesta extends Model
{
    //softdelete para "eliminar" un registro en la bd, solo coloca un timestamp en el campo "deleted_at"
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'encuestas';
    protected $fillable = ['id', 'encuesta_num'];

    //ENCUESTA (1) ------------> (*) RESPUESTAS (ONE TO MANY)
    public function respuestas(){
    return $this->hasMany('App\Respuestas');
    }


}
