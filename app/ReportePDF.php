<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportePDF extends Model
{
    //REPORTES (*)---------(1) USUARIO ONE TO MANY INVERSE
    public function usuario(){
        return $this->belongsTo('App\Usuario');
    }
}
