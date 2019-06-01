<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\Dominio;
use App\Objcontrol;
use App\Control;
use App\Preguntas;
use App\Respuestas;
use App\Encuesta;
use App\Usuario;


class ReportePDFController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reportPDF(){

        $reports = Respuestas::get();
        $pdf = PDF::loadView('sgsi/reportepdf/report', compact('reports'));
        //dd($reports);
        return $pdf->download('report-sgsi.pdf');
    }


}
