<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Control;
use App\Preguntas;

class PreguntasController extends Controller
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
        $pregu = Preguntas::orderBy('id','ASC')->paginate(3);
        return view('/sgsi/pregunta/index', compact('pregu'));
    }

    public function create()
    {
        $contr = Control::all();
        return view('/sgsi/pregunta/create', compact('contr'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'numero_preg' => 'required|integer',
            'nombre_preg' => 'required|string',
        ]);
            $pregu = new Preguntas();
            $pregu->numero_preg = $request->input('numero_preg');
            $pregu->nombre_preg = $request->input('nombre_preg');
            // PARA CORREGIR EL ERROR POR EL CUAL NO INSERTABA, CAMBIÉ EL TIPO DE CAMPO DE UNIQUE A INDEX EN LA BD. 
            $pregu->control_id = $request->input('control_id');

            $pregu->save();

            return redirect()->route('preguntas.create')->with('success','Pregunta Creada Satisfactoriamente');
    }





}
