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
        ->select('controls.id', 'dominios.numero_dom', 'objcontrols.numero_objc', 'controls.numero_con', 'controls.nombre_con')
        ->get();

        return view('/sgsi/Control/index', ['contr' => $contr]);
        //return view('/sgsi/objcontrol/index'); //view('/unacarpeta/subcarpeta/terceracarpeta/nesimacarpeta/nombre_del_archivo_sin_blade.php')

    }

    public function create()
    {
        $contr = DB::table('controls')
        ->join('dominios', 'dominios.id', '=', 'controls.dominio_id')
        ->join('objcontrols', 'objcontrols.id', '=', 'controls.objcontrol_id')
        ->select('controls.id', 'dominios.id', 'dominios.numero_dom', 'dominios.nombre_dom', 'objcontrols.id', 'objcontrols.numero_objc', 'objcontrols.nombre_objc', 'controls.dominio_id', 'controls.objcontrol_id', 'controls.numero_con', 'controls.nombre_con')
        ->get();
        //dd($contr);
        return view('/sgsi/control/create', ['contr' => $contr]);
        
        //return view('/sgsi/control/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'numero_dom' => 'required|integer',
            'numero_objc' => 'required|integer',
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






}
