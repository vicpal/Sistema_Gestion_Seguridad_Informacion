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
    protected $fillable = ['numero_con', 'nombre_con'];

// CONTROL (*) -------------> (1) DOMINIOS one to many inverse
    public function dominio(){
        return $this->belongsTo('App\Dominios');
    }

    //CONTROL (*) -------------> (1) OBJCONTROL ONE TO MANY INVERSE
    public function objcontrol(){
        return $this->belongsTo('App\Objcontrol');
    }

}
