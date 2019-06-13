<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Dominios;
use App\Objcontrol;
use App\Control;
use App\Preguntas;
use App\Respuestas;
use App\Usuario;
use App\Criterio;

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
        $respu = Respuestas::groupBy('respuestas.encuesta_num')->get();
        
        return view('/sgsi/respuesta/index', compact('respu'));
    }

    public function show($id)
    {
        $respu = Respuestas::find($id);
        //dd($respu);
        return view('/sgsi/respuesta/show', compact('respu'));
    }

    public function reporte()
    {
        //$respu = Respuestas::groupBy('respuestas.encuesta_num')->get();
        //dd($respu);
        //return view('/sgsi/respuesta/reporte', compact('respu'));
        return view('/sgsi/respuestas/reporte');
    }

}
