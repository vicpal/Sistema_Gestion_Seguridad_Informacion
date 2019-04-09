<?php

namespace App\Http\Controllers;

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
        return view('/sgsi/index');
    }

    public function create()
    {
        return view('/sgsi/create');
    }

    public function store(Request $request)
    {
        //return view('/sgsi/store');
        $this->validate($request, [
            'numero_dom' => 'required|integer',
            'nombre_dom' => 'required|string',
        ]);
            $dir = new Dominios();
            $dir->numero_dom = $request->input('numero_dom');
            $dir->nombre_dom = $request->input('nombre_dom');

            $dir->save();

            //return response()->json(['res' => 'Dominio creado correctamente']); //devuelvo un resultado de exito
            return redirect()->route('dominios.create')->with('success','Dominios Creado Satisfactoriamente');
    }
    
    public function edit($id)
    {
        //return view('/sgsi/edit');
        $dominios=dominio::find($id);
        return view('dominio.show',compact('dominios'));
    }

    public function show()
    {
        $dominios = Dominios::orderBy('id', 'ASC')->paginate();
        return view('/sgsi/show', compact('dominios'));
    }

    public function destroy($id)
    {
        dominio:show($id)->delete();
        return redirect()->route('dominio.show')->with('success','Dominio Eliminado Satisfactoriamente');
    }

}
