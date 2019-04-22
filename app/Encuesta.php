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

    /* ------------------------------------------------------------ */

    //ENCUESTA (*)---------(1) DOMINIO ONE TO MANY INVERSE
    public function dominio(){
        return $this->belongsTo('App\Dominios');
    }
    
    //ENCUESTA (*)---------(1) OBJCONTROL ONE TO MANY INVERSE
    public function objcontrol(){
        return $this->belongsTo('App\Objcontrol');
    }

    //ENCUESTA (*)---------(1) CONTROL ONE TO MANY INVERSE
    public function control(){
        return $this->belongsTo('App\Control');
    }

    /* ------------------------------------------------------------ */

    //ENCUESTA (1) ------------> (*) RESPUESTAS (ONE TO MANY)
    public function preguntas(){
        return $this->hasMany('App\Preguntas');
    }
    
    //ENCUESTA (1) ------------> (*) RESPUESTAS (ONE TO MANY)
    public function respuestas(){
        return $this->hasMany('App\Respuestas');
    }

}
