<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Dominios;

class DominiosController extends Controller
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
        $dominios = DB::table('dominios')->paginate(6);
        return view('/sgsi/listado', ['dominios' => $dominios]);
        /*
        $dominios = Dominios::orderBy('id','ASC')->paginate();
        return view('/sgsi/listado',compact('dominios'));*/
    }

    public function create()
    {
        return view('/sgsi/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'numero_dom' => 'required|integer',
            'nombre_dom' => 'required|string',
        ]);
            $dominios = new Dominios();
            $dominios->numero_dom = $request->input('numero_dom');
            $dominios->nombre_dom = $request->input('nombre_dom');

            $dominios->save();

            //return response()->json(['res' => 'Dominio creado correctamente']); //devuelvo un resultado de exito
            return redirect()->route('dominios.create')->with('success','Dominios Creado Satisfactoriamente');
    }
    
    public function show($id)
    {
        $dominios = Dominios::find($id);
        return view('dominios.show',compact('dominios'));
    }

    public function edit($id)
    {
        $dominios = Dominios::find($id);
        return view('/sgsi/edit', compact('dominios'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'numero_dom' => 'required|integer',
            'nombre_dom' => 'required|string',
        ]);
            $dominios = Dominios::find($id);
            $dominios->numero_dom = $request->input('numero_dom');
            $dominios->nombre_dom = $request->input('nombre_dom');

            $dominios->save();

            //return response()->json(['res' => 'Contacto Actualizado Correctamente']); //devuelvo un resultado de exito
            return redirect()->route('dominios.edit', $id)->with('success','Dominios Actualizado Satisfactoriamente');
    }
    
    public function destroy($id)
    {
        $dominios = Dominios::find($id);
        $dominios->delete();
        return back()->with('dominios.index')->with('success','Dominio Eliminado Satisfactoriamente');
        //Dominios::find($id)->delete();
        //return redirect()->route('dominios.index')->with('success','Dominio Eliminado Satisfactoriamente');
    }
}
