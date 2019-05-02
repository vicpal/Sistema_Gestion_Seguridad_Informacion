<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class usuario extends Model
{
    //softdelete para "eliminar" un registro en la bd, solo coloca un timestamp en el campo "deleted_at"
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'usuario';
    protected $fillable = ['id', 'nombre', 'correo', 'clave', 'tipoid'];
    

    /* -------------------------------------------------------- */
    
    //USUARIOS (*)---------(1) TIPO ONE TO MANY INVERSE
    public function tipousuario(){
        return $this->belongsTo('App\Tipousuario');
    }

}
