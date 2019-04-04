<?php

namespace Sgsi;

use Illuminate\Database\Eloquent\Model;

class Dominios extends Model
{
    protected $fillable = [
        'numero_dom', 'nombre_dom',
    ];
}
