<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encuesta;
use App\Preguntas;
use App\Respuestas;

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
        $encu = Encuesta::orderBy('id','ASC')->paginate(3);
        return view('/sgsi/encuesta/index', compact('encu'));
    }

    public function create()
    {
        $encu = Respuestas::all();
        return view('/sgsi/respuestas/create', compact('encu'));
    }

    public function show($id)
    {
        $encu = Respuestas::find($id);
        //dd($encu);
        return view('/sgsi/encuesta/show', compact('encu'));
    }
    
    public function destroy($id)
    {
        Encuesta::find($id)->delete();
        return redirect()->route('encuesta.index')->with('success','Encuesta Eliminada Satisfactoriamente');
    }


}