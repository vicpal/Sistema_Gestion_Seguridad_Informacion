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
    
    //USUARIOS (1)---------(1) TIPO ONE TO ONE
    public function tipousuario(){
        return $this->belongsTo('App\Tipousuario');
    }
}
