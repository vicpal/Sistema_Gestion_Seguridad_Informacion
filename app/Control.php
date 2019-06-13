<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Control extends Model
{
    //softdelete para "eliminar" un registro en la bd, solo coloca un timestamp en el campo "deleted_at"
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'controls';
    protected $fillable = ['id', 'numero_con', 'nombre_con', 'dominio_id', 'objcontrol_id'];

    /* ---------------------------- INVERSE ---------------------------------- */

    // CONTROL (*) -------------> (1) DOMINIOS ONE TO MANY INVERSE
    public function dominio(){
        return $this->belongsTo('App\Dominios');
    }

    //CONTROL (*) -------------> (1) OBJCONTROL ONE TO MANY INVERSE
    public function objcontrol(){
        return $this->belongsTo('App\Objcontrol');
    }

    /* --------------------------- ONE TO MANY --------------------------------- */

    //CONTROL (1) ------------> (*) PREGUNTAS (ONE TO MANY)
    public function preguntas(){
        return $this->hasMany('App\Preguntas');
    }

    //CONTROL (1) ------------> (*) RESPUESTAS (ONE TO MANY)
    public function respuestas(){
    return $this->hasMany('App\Respuestas');
    }

    //CONTROL (1) ------------> (*) ENCUESTAS (ONE TO MANY)
    public function encuestas(){
        return $this->hasMany('App\Encuesta');
    }
    

}
