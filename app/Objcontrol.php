<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Objcontrol extends Model
{
    
    //softdelete para "eliminar" un registro en la bd, solo coloca un timestamp en el campo "deleted_at"
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'objcontrols';
    protected $fillable = ['id', 'numero_objc', 'nombre_objc', 'dominio_id'];

    /* -------------------------------------------------------- */
    
    //OBJCONTROL (*)---------(1) DOMINIO ONE TO MANY INVERSE
    public function dominio(){
        return $this->belongsTo('App\Dominios');
    }

    /* -------------------------------------------------------- */

    //OBJCONTROL (1) -----------> (*) CONTROL - ONE TO MANY
    public function controls(){
        return $this->hasMany('App\Control');
    }
    
    //OBJCONTROL (1) ------------> (*) RESPUESTAS (ONE TO MANY)
    public function respuestas(){
        return $this->hasMany('App\Respuestas');
    }
}
