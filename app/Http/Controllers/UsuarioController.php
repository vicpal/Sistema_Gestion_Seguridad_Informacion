<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Usuario;
use App\Tipousuario;

class UsuarioController extends Controller
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
        //$usua = DB::table('usuario')->paginate(5);
        $usua = DB::table('usuario')
        ->join('tipousuario', 'usuario.tipoid', '=', 'tipousuario.id')
        ->where('usuario.deleted_at', NULL)
        ->select('usuario.id', 'usuario.nombre', 'usuario.correo', 'tipousuario.id', 'tipousuario.tipo_nombre')->paginate();
        //dd($usua);
        return view('/sgsi/usuario/index', compact('usua'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usua = Tipousuario::all()->unique('id');
        return view('/sgsi/usuario/create', compact('usua'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string',
            'correo' => 'required|string',
            'clave'  => 'required|string',
        ]);
        //dd($request);

        $usua = new Usuario();
        $usua->nombre = $request->input('nombre');
        $usua->correo = $request->input('correo');
        //$password = bcrypt('my-secret-password');
        //$usua->clave = $request->input->('clave');
        $usua->clave = bcrypt('clave');  
        $usua->tipoid = $request->input('tipoid');

        $usua->save();
        //dd($usua);
        //return response()->json(['res' => 'Control creado correctamente']); //devuelvo un resultado de exito
        return redirect()->route('usuario.create')->with('success','Usuario Creado Satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usua = Usuario::find($id);
        //dd($usua);
        return view('/sgsi/usuario/edit', compact('usua'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            //'tipoid' => 'required|integer',
            'nombre' => 'required|string',
            'correo' => 'required|string',
            'clave'  => 'required|string',
            
        ]);
            $usua = Usuario::find($id);
            //$usua->tipoid = $request->input('tipoid');
            $usua->nombre = $request->input('nombre');
            $usua->correo = $request->input('correo');
            $usua->clave = $request->input('clave');

            $usua->save();
            return redirect()->route('usuario.edit', $id)->with('success','Usuario Actualizado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usua = Usuario::find($id);
        $usua->delete();
        return back()->with('usuario.index')->with('success','Usuario Eliminado Satisfactoriamente');
    }
}
