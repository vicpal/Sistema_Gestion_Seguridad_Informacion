<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Objcontrol;
use App\Dominios;

class ObjcontrolController extends Controller
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

        $objc=Objcontrol::orderBy('id','ASC')->paginate();
        return view('/sgsi/ObjControl/index', compact('objc'));
        
        /*$objc = Objcontrol::orderBy('id','ASC')->paginate();
        return view('/sgsi/objcontrol/index', compact('objc'));
        $objc = DB::table('objcontrols')
        ->join('dominios', 'dominios.id', '=', 'objcontrols.dominio_id')
        ->where('objcontrols.deleted_at', NULL)
        ->select('dominios.numero_dom', 'objcontrols.id', 'objcontrols.numero_objc', 'objcontrols.nombre_objc', 'objcontrols.dominio_id')
        ->get();*/
        
        //dd($objc);
        //return view('/sgsi/objcontrol/index'); //view('/unacarpeta/subcarpeta/terceracarpeta/nesimacarpeta/nombre_del_archivo_sin_blade.php')

    }

    public function create()
    {
        $dominios = Dominios::all();
        return view('/sgsi/objcontrol/create', compact('dominios'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            //'numero_objc' => 'required|integer',
            'nombre_objc' => 'required|string',
        ]);
            
            $nextNumControl = DB::table('objcontrols')
            ->join('dominios', 'objcontrols.dominio_id', '=', 'dominios.id')
            ->where('dominios.id', $request->input('dominio_id'))
            ->max('objcontrols.numero_objc');
            //SELECT MAX(numero_objc + 1) as NumAlto FROM objcontrols, dominios WHERE dominios.id = objcontrols.dominio_id
        
            $objc = new Objcontrol();
            $objc->numero_objc = $nextNumControl + 1;
            $objc->nombre_objc = $request->input('nombre_objc');
            // PARA CORREGIR EL ERROR POR EL CUAL NO INSERTABA, CAMBIÉ EL TIPO DE CAMPO DE UNIQUE A INDEX EN LA BD. 
            $objc->dominio_id = $request->input('dominio_id');

            $objc->save();

            //return response()->json(['res' => 'Dominio creado correctamente']); //devuelvo un resultado de exito
            return redirect()->route('objcontrol.create')->with('success','Objetivo de Control Creado Satisfactoriamente');
    }
    /* -- Esta funcion se creo para colocar un filtro en la vista create de Control. -- */
    public function findById($id){
        $objc = DB::table('objcontrols')
                        ->where('deleted_at', NULL)
                        ->where('dominio_id', $id)
                        ->get();

        return response()->json(['objc' => $objc ]);
    }

    public function show($id)
    {
        $objc = Objcontrol::find($id);
        return view('/sgsi/objcontrol/show', compact('objc'));
    }

    public function edit($id)
    {
        $objc=Objcontrol::find($id);
        //dd($objc->dominio->nombre_dom, $objc->dominio->id);
        return view('/sgsi/objcontrol/edit', compact('objc'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'numero_objc' => 'required|integer',
            'nombre_objc' => 'required|string',

        ]);
            $objc = Objcontrol::find($id);
            $objc->numero_objc = $request->input('numero_objc');
            $objc->nombre_objc = $request->input('nombre_objc');

            $objc->save();

            //return response()->json(['res' => 'Contacto Actualizado Correctamente']); //devuelvo un resultado de exito
            return redirect()->route('objcontrol.edit', $id)->with('success','Objetivo de Control Actualizado Satisfactoriamente');
    }
    
    public function destroy($id)
    {
        $objc = Objcontrol::find($id);
        $objc->delete();
        return back()->with('objcontrol.index')->with('success', 'Objetivo de Control Eliminado Satisfactoriamente');
        //Objcontrol::find($id)->delete();
        //return redirect()->route('objcontrol.index')->with('success','Dominio Eliminado Satisfactoriamente');
    }

}