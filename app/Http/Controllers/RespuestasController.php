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
            /*$respu = DB::table('respuestas')
            ->join('dominios', 'dominios.id', '=', 'respuestas.dominio_id')
            ->join('objcontrols', 'objcontrols.id', '=', 'respuestas.objcontrol_id')
            ->join('controls', 'controls.id', '=', 'respuestas.control_id')
            ->join('usuarios', 'usuarios.id', '=', 'respuestas.usuario_id')
            ->where('respuestas.deleted_at', NULL)
            ->select('dominios.numero_dom', 'dominios.nombre_dom', 'objcontrols.numero_objc', 'objcontrols.nombre_objc', 'controls.numero_con', 'controls.nombre_con', 'usuarios.nombre')
            ->groupBy('respuestas.control_id')->get();*/
            $respu = Respuestas::groupBy('respuestas.control_id')->get();
            return view('/sgsi/respuesta/detalle', compact('respu'));
        }
    /* ----------------- VISTA PARA MOSTRAR EL INFORME TÉCNICO --------------- */

    public function show($id)
    {
        return 'Estamos Trabajando en Vincular en esta Función SHOW la nueva vista Detalle. <br> Atte. <strong>VicPal</strong><br>';
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
