<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Preguntas extends Model
{
    //softdelete para "eliminar" un registro en la bd, solo coloca un timestamp en el campo "deleted_at"
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'preguntas';
    protected $fillable = ['id', 'numero_preg', 'nombre_preg', 'control_id'];

    /* ------------------------------------------------------------- */
    
    //PREGUNTAS (*) -------------> (1) DOMINIO ONE TO MANY INVERSE
    public function dominio(){
        return $this->belongsTo('App\Dominios');
    }
    
    //PREGUNTAS (*) -------------> (1) CONTROL ONE TO MANY INVERSE
    public function control(){
        return $this->belongsTo('App\Control');
    }

    //PREGUNTAS (*) -------------> (1) ENCUESTA ONE TO MANY INVERSE
    public function encuesta(){
        return $this->belongsTo('App\Encuesta');
    }

    /* ------------------------------------------------------------ */
    
    //PREGUNTA (1) ------------> (*) RESPUESTAS (ONE TO MANY)
    public function respuestas(){
        return $this->hasMany('App\Respuestas');
    }


}
