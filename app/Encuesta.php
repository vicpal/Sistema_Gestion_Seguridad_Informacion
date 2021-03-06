<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Encuesta extends Model
{
    //softdelete para "eliminar" un registro en la bd, solo coloca un timestamp en el campo "deleted_at"
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'encuesta';
    protected $fillable = ['id', 'encuesta_num', 'criterio_id', 'usuario_id'];

    /* -------------------------- ONE TO MANY ------------------------------*/
    //ENCUESTA (1) ---------> (*) DOMINIOS ONE TO MANY
    public function dominios(){
        return $this->hasMany('App\Dominios');
    }
    
    //ENCUESTA (1) ------------> (*) PREGUNTAS (ONE TO MANY)
    public function preguntas(){
        return $this->hasMany('App\Preguntas');
    }
    
    //ENCUESTA (1) ------------> (*) RESPUESTAS (ONE TO MANY)
    public function respuestas(){
        return $this->hasMany('App\Respuestas');
    }

    //ENCUESTA (1) ------------> (*) CRITERIO (ONE TO MANY)
    public function criterios(){
        return $this->hasMany('App\Criterio');
    }

    /* ---------------------------- INVERSE ------------------------------- */

    //ENCUESTA (*) ---------> (1) OBJCONTROL ONE TO MANY INVERSE
    public function objcontrol(){
        return $this->belongsTo('App\Objcontrol');
    }

    //ENCUESTA (*) ---------> (1) CONTROL ONE TO MANY INVERSE
    public function control(){
        return $this->belongsTo('App\Control');
    }

    // ENCUESTAS (*) --------- (1) USUARIO ONE TO MANY INVERSE
    public function usuario(){
        return $this->belongsTo('App\Usuario');
    } 

}
