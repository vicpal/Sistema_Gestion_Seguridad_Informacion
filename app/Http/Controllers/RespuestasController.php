<?php

namespace App\Http\Controllers;

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

    /* ----------------- VISTA PARA MOSTRAR EL INFORME TÉCNICO --------------- */
        public function detalle()
        {
            //$respu = Respuestas::all();
            $respu = Respuestas::groupBy('respuestas.control_id')->get();
            
            return view('/sgsi/respuesta/detalle', compact('respu'));
        }
    /* ----------------- VISTA PARA MOSTRAR EL INFORME TÉCNICO --------------- */

    public function show($encuesta_num)
    {
        $respu = Respuestas::select('*')->groupBy('control_id')->where('encuesta_num', '=', $encuesta_num)->get();
        //dd($respu);
        return view('/sgsi/respuesta/detalle', compact('respu'));
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
