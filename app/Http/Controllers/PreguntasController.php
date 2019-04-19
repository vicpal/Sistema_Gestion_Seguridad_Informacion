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

    public function show($id)
    {
        $pregu = Preguntas::find($id);
        return view('/sgsi/pregunta/show', compact('pregu'));
    }

    public function edit($id)
    {
        $pregu = Preguntas::find($id);
        //dd($pregu->preguntas->numero_preg, $pregu->preguntas->nombre_preg);
        return view('/sgsi/pregunta/edit', compact('pregu'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'numero_preg' => 'required|integer',
            'nombre_preg' => 'required|string',
            
        ]);
            $pregu = Preguntas::find($id);
            $pregu->numero_preg = $request->input('numero_preg');
            $pregu->nombre_preg = $request->input('nombre_preg');

            $pregu->save();
            return redirect()->route('preguntas.edit', $id)->with('success','Pregunta Actualizada Satisfactoriamente');
    }

    public function destroy($id)
    {
        Preguntas::find($id)->delete();
        return redirect()->route('preguntas.index')->with('success','Pregunta Eliminada Satisfactoriamente');
    }


}
