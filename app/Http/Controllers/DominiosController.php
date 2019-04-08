<?php

namespace Sgsi\Http\Controllers;

use Illuminate\Http\Request;
use Sgsi\Dominios;

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
        //return "index";
        $variables = Dominios::orderBy('id', 'DESC')->paginate();
        return view('sgsi/index', compact('variables'));
    }

    /*public function index(){
        $variables = Dominios::orderBy('id', 'DESC')->paginate();
        return view('sgsi.index', compact('variables'));
    }*/

}
