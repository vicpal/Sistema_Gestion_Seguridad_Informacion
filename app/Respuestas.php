<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
    protected $table = 'respuestas';
    protected $fillable = ['id', 'control_id', 'pregunta_id', 'respuesta'];

    
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

    // RESPUESTAS (*) -------------> (1) USER one to many inverse
    public function user(){
        return $this->belongsTo('App\User');
    }

}
