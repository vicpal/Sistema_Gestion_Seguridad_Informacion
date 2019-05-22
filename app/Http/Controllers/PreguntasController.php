<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Dominios;
use App\Objcontrol;
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
        $pregu = Preguntas::orderBy('id','ASC')->paginate();
        return view('/sgsi/pregunta/index', compact('pregu'));
    }

    public function create()
    {
        $contr = Control::all()->unique('dominio_id');
        return view('/sgsi/pregunta/create', compact('contr'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            //'numero_preg' => 'required|integer',
            'nombre_preg' => 'required',
            'dominio_id' => 'required|integer',
            'objcontrol_id' => 'required|integer',
            'control_id' => 'required|integer',
        ]);
            
            $nextNumPregunta = DB::table('preguntas')
            ->join('controls', 'preguntas.objcontrol_id', '=', 'controls.id')
            ->join('objcontrols', 'preguntas.objcontrol_id', '=', 'objcontrols.id')
            ->join('dominios', 'preguntas.dominio_id', '=', 'dominios.id')
            ->where('controls.id', $request->input('control_id'))
            ->where('objcontrols.id', $request->input('objcontrol_id'))
            ->where('dominios.id', $request->input('dominio_id'))
            ->max('preguntas.numero_preg');
        
            //dd($request->input('nombre_preg'));

            foreach($request->input('nombre_preg') as $preg){
                $pregu = new Preguntas();
                $pregu->numero_preg = ++$nextNumPregunta;
                $pregu->nombre_preg = $preg;
                $pregu->dominio_id = $request->input('dominio_id');
                $pregu->objcontrol_id = $request->input('objcontrol_id');
                $pregu->control_id = $request->input('control_id');
                $pregu->save();
            }
                        
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
        return view('/sgsi/pregunta/edit', compact('pregu'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            //'numero_preg' => 'required|integer',
            'nombre_preg' => 'required|string',
            
        ]);
            $pregu = Preguntas::find($id);
            //$pregu->numero_preg = $request->input('numero_preg');
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
