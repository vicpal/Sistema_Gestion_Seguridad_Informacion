<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Respuestas extends Model
{
    //softdelete para "eliminar" un registro en la bd, solo coloca un timestamp en el campo "deleted_at"
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $table = 'respuestas';
    protected $fillable = ['id', 'dominio_id', 'objcontrol_id', 'control_id', 'pregunta_id', 'respuesta', 'encuesta_id', 'usuario_id'];
 
    /* -------------------------------------------------------------- */
    
    //RESPUESTAS (*)---------(1) DOMINIO one to many inverse
    public function dominio(){
        return $this->belongsTo('App\Dominios');
    }

    //RESPUESTAS (*) -------------> (1) OBJCONTROL one to many inverse
    public function objcontrol(){
        return $this->belongsTo('App\Objcontrol');
    }

    // RESPUESTAS (*) -------------> (1) CONTROL one to many inverse
    public function control(){
        return $this->belongsTo('App\Control');
    }

    // RESPUESTAS (*) -------------> (1) PREGUNTA one to many inverse
    public function pregunta(){
        return $this->belongsTo('App\Preguntas');
    }

    // RESPUESTAS (*) -------------> (1) ENCUESTA one to many inverse
    public function encuesta(){
        return $this->belongsTo('App\Encuesta');
    }

}
