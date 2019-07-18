<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $respu = Respuestas::groupBy('respuestas.encuesta_num')->get();
        return view('/sgsi/respuesta/index', compact('respu'));
    }

    public function show($encuesta_num)
    {
        $respu  = Respuestas::select('*')->groupBy('dominio_id')->where('encuesta_num', '=', $encuesta_num)->get();
        $respu1 = Respuestas::select('*')->groupBy('objcontrol_id')->where('encuesta_num', '=', $encuesta_num)->get();
        $respu2 = Respuestas::select('*')->groupBy('control_id')->where('encuesta_num', '=', $encuesta_num)->get();
        //dd($respu);
        return view('/sgsi/respuesta/show', compact('respu', 'respu1', 'respu2'));
    }

    // ---------------------------- PDF ---------------------------------
    public function reportPDF(){
        $respu = Respuestas::get();
        $pdf = PDF::loadView('sgsi/reportepdf/report', compact('respu'));
        //dd($encu);
        return $pdf->download('report-sgsi.pdf');
    }
    // -------------------------------------------------------------------

}
