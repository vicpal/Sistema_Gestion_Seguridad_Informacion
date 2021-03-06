<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dominios extends Model
{

   //softdelete para "eliminar" un registro en la bd, solo coloca un timestamp en el campo "deleted_at"
   use SoftDeletes;
   protected $dates = ['deleted_at'];

   protected $table = 'dominios';
   protected $fillable = ['id', 'numero_dom', 'nombre_dom'];

   //DOMINIO (1) ------------> (*) OBJCONTROLS (ONE TO MANY) Primera relación
   public function objcontrols(){
      return $this->hasMany('App\Objcontrol');
   }

   //DOMINIO (1) ------------> (*) CONTROL (ONE TO MANY)
   public function controls(){
      return $this->hasMany('App\Control');
   }

   //DOMINIO (1) ------------> (*) PREGUNTAS (ONE TO MANY)
   public function preguntas(){
      return $this->hasMany('App\Preguntas');
   }
   
   //DOMINIO (1) ------------> (*) RESPUESTAS (ONE TO MANY)
   public function respuestas(){
      return $this->hasMany('App\Respuestas');
   }

   // ------------------------ INVERSE ---------------------------------//
   //DOMINIO (*) ------------> (1) ENCUESTA (ONE TO MANY)
   public function encuesta(){
      return $this->belongsTo('App\Encuesta');
   }

}

