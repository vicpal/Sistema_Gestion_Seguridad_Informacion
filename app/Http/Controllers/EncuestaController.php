<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Dominios;
use App\Objcontrol;
use App\Control;
use App\Criterio;
use App\Encuesta;
use App\Preguntas;
use App\Respuestas;
use App\Usuario;

class EncuestaController extends Controller
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
        //$encu = Encuesta::all();
        //return view('/sgsi/encuesta/index', compact('encu'));

        $respu = DB::table('respuestas')->where('deleted_at', NULL)->get();
        return view('/sgsi/encuesta/index', compact('respu'));
    }
        
    public function reporte()
    {
        $encu = Respuestas::all();
        return view('/sgsi/encuesta/reporte', compact('encu'));
    }
    
    public function create()
    {
        $encu = Encuesta::all();
        return view('/sgsi/encuesta/create', compact('encu'));
    }

    public function store(Request $request)
    {
        //
    }
       
    public function show($id)
    {
        $encu = Respuestas::find($id);
        return view('/sgsi/encuesta/show',compact('encu'));
    }
    
    public function destroy($id)
    {
        Encuesta::find($id)->delete();
        return redirect()->route('encuesta.index')->with('success','Encuesta Eliminada Satisfactoriamente');
    }

    // ---------------------------- PDF ---------------------------------
   
    public function reportPDF(){
        $encu = Respuestas::get();
        $pdf = PDF::loadView('sgsi/reportepdf/report', compact('encu'));
        //dd($encu);
        return $pdf->download('report-sgsi.pdf');
    }
    // -------------------------------------------------------------------

}
