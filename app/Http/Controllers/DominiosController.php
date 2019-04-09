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
        //return "/sgsi/index";
        $dominios = Dominios::orderBy('id', 'DESC')->paginate();
        return view('/sgsi/index', compact('dominios'));
    }

}
