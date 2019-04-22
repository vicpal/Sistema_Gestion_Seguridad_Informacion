<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Control;
use App\Preguntas;
use App\Respuestas;
use App\ReportePDF;
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
        $respu = Respuestas::orderBy('id','ASC')->paginate(3);
        return view('/sgsi/respuesta/index', compact('respu'));
    }
   

}
