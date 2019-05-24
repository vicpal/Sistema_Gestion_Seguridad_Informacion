<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipousuario extends Model
{
    //softdelete para "eliminar" un registro en la bd, solo coloca un timestamp en el campo "deleted_at"
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'tipousuarios';
    protected $fillable = ['id', 'tipo_nombre'];

    /* -------------------------------------------------------- */
    
    //TIPO_US (1)------(1) USUARIO ONE TO ONE
    public function usuarios(){
        return $this->hasMany('App\Usuario');
    }

}
