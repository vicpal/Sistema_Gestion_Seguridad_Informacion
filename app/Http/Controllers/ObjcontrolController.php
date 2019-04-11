<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        /*$objc = DB::table('objcontrols')->paginate(6);
        return view('/sgsi/objControl/index', ['objc' => $objc]);
        $objc = Objcontrol::orderBy('id','ASC')->paginate(6);
        return view('/sgsi/ObjControl/objcontrol',compact('objc'));*/
        
        return view('/sgsi/ObjControl/index');//view('/unacarpeta/subcarpeta/terceracarpeta/nesimacarpeta/nombre_del_archivo_sin_blade.php')

    }

    public function create()
    {
        return view('/sgsi/objcontrol/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'numero_objc' => 'required|integer',
            'nombre_objc' => 'required|string',
        ]);
            $objc = new Objcontrol();
            $objc->numero_objc = $request->input('numero_objc');
            $objc->nombre_objc = $request->input('nombre_objc');

            $objc->save();

            //return response()->json(['res' => 'Dominio creado correctamente']); //devuelvo un resultado de exito
            return redirect()->route('objcontrol.create')->with('success','Objetivo de Control Creado Satisfactoriamente');
    }
    
    public function show($id)
    {
        $objc = Objcontrol::find($id);
        return view('objcontrol.show',compact('objc'));
    }

    public function edit($id)
    {
        $objc = Objcontrol::find($id);
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
