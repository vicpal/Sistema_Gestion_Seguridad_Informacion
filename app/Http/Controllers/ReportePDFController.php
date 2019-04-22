<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dominios;
use App\Objcontrol;
use App\Control;
use App\Preguntas;
use App\Respuestas;

class ReportePDFController extends Controller
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
        $repor = Respuestas::orderBy('id','ASC')->paginate(3);
        return view('/sgsi/respuesta/index', compact('repor'));
    }

    public function create()
    {
        $contr = Control::all();
        return view('/sgsi/pregunta/create', compact('contr'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'respuesta' => 'required|integer',

        ]);
            $repor = new ReportePDF();
            $repor->reportepdf = $request->input('encuesta_num');
            $repor->save();

            return redirect()->route('reportepdf.create')->with('success','Reporte Creado Satisfactoriamente');
    }

    public function show($id)
    {
        $repor = ReportePDF::find($id);
        return view('/sgsi/reportepdf/show', compact('respu'));
    }


}