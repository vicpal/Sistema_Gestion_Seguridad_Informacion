<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    //softdelete para "eliminar" un registro en la bd, solo coloca un timestamp en el campo "deleted_at"
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'usuarios';
    protected $fillable = ['id', 'nombre', 'correo', 'clave', 'tipoid'];
    
    /* -------------------------------------------------------- */
    
    //USUARIOS (*)---------(1) TIPO ONE TO ONE
    public function rol(){
        return $this->belongsTo(Rol::class);
    }

    // USUARIO (1)------(*) OBJCONTROLS Primera relacion (ONE TO MANY)
    public function encuestas(){
      return $this->hasMany('App\Encuesta');
   }

    //USUARIO (1) ------------> (*) RESPUESTAS (ONE TO MANY)
    public function respuestas(){
        return $this->hasMany('App\Respuestas');
    }

}
