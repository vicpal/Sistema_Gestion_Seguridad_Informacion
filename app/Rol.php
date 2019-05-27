<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    //softdelete para "eliminar" un registro en la bd, solo coloca un timestamp en el campo "deleted_at"
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'roles';
    protected $fillable = ['id', 'nombre_rol'];
    
    /* -------------------------------------------------------- */
    
    //TIPO_US (1)------(*) USUARIO ONE TO ONE
    public function usuarios(){
        return $this->hasMany(Usuario::class);
    }

}
