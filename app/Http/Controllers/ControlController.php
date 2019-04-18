<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Control;
use App\Objcontrol;
use App\Dominios;

class ControlController extends Controller
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

        $contr = DB::table('controls')
        ->join('dominios', 'dominios.id', '=', 'controls.dominio_id')
        ->join('objcontrols', 'objcontrols.id', '=', 'controls.objcontrol_id')
        ->where('controls.deleted_at', NULL)
        ->select('controls.id', 'dominios.numero_dom', 'dominios.nombre_dom', 'objcontrols.numero_objc', 'objcontrols.nombre_objc', 'controls.numero_con', 'controls.nombre_con')
        ->get();

        return view('/sgsi/Control/index', ['contr' => $contr]);
        //return view('/sgsi/objcontrol/index'); //view('/unacarpeta/subcarpeta/terceracarpeta/nesimacarpeta/nombre_del_archivo_sin_blade.php')

    }

    public function create()
    {
        $contr = DB::table('dominios')
        ->join('objcontrols', 'objcontrols.dominio_id', '=', 'dominios.id')
        ->select('dominios.id', 'dominios.nombre_dom', 'objcontrols.id', 'objcontrols.nombre_objc', 'objcontrols.dominio_id')
        ->get();
        
        //dd($contr);
        return view('/sgsi/control/create', compact('contr'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'numero_con' => 'required|integer',
            'nombre_con' => 'required|string',
        ]);
            $contr = new Control();
            $contr->numero_con = $request->input('numero_con');
            $contr->nombre_con = $request->input('nombre_con');
            // PARA CORREGIR EL ERROR POR EL CUAL NO INSERTABA, CAMBIÉ EL TIPO DE CAMPO DE UNIQUE A INDEX EN LA BD. 
            $contr->dominio_id = $request->input('dominio_id');
            $contr->objcontrol_id = $request->input('objcontrol_id');

            $contr->save();

            //return response()->json(['res' => 'Dominio creado correctamente']); //devuelvo un resultado de exito
            return redirect()->route('control.create')->with('success','Control Creado Satisfactoriamente');

    }

    public function show($id)
    {
        $contr = Control::find($id);
        return view('/sgsi/control/show', compact('contr'));
    }

    public function edit($id)
    {
        $contr = Control::find($id);
        //dd($contr->dominio->nombre_dom, $contr->objcontrol->nombre_objc);
        return view('/sgsi/control/edit', compact('contr'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'numero_con' => 'required|integer',
            'nombre_con' => 'required|string',
            
        ]);
            $contr = Control::find($id);
            $contr->numero_con = $request->input('numero_con');
            $contr->nombre_con = $request->input('nombre_con');

            $contr->save();
            return redirect()->route('control.edit', $id)->with('success','Control Actualizado Satisfactoriamente');
    }

    public function destroy($id)
    {
        Control::find($id)->delete();
        return redirect()->route('control.index')->with('success','Dominio Eliminado Satisfactoriamente');
    }

}
