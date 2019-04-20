<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Control;
use App\Preguntas;
use App\Respuestas;

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
            $respu = new Respuestas();
        
            $respu->respuesta = $request->input('respuesta');

            $respu->control_id = $request->input('control_id');
            $respu->pregunta_id = $request->input('pregunta_id');

            $respu->save();

            return redirect()->route('respuestas.create')->with('success','Respuesta Creada Satisfactoriamente');
    }

    public function show($id)
    {
        $respu = Respuestas::find($id);
        return view('/sgsi/respuestas/show', compact('respu'));
    }

    

}
