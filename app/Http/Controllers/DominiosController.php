<?php

namespace Sgsi\Http\Controllers;

use Illuminate\Http\Request;
use Sgsi\Dominios;

class DominiosController extends Controller
{
    public function index(){
        $dominios = Dominios::orderBy('id', 'DESC')->paginate();
        return view('sgsi.index', compact('dominios'));
    }
}
