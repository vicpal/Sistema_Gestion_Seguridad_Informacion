<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Dominios;
use App\Objcontrol;
use App\Control;
use App\Preguntas;
use App\Respuestas;
use App\Encuesta;

class RespuestasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $respu = Respuestas::all();
        return view('/sgsi/respuesta/index', compact('respu'));
    }

    public function show($id)
    {
        $respu = Respuestas::find($id);
        return view('/sgsi/respuesta/show', compact('respu'));
    }

}
