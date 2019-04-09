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

    public function edit()
    {
        return view('/sgsi/edit');
    }

    public function show()
    {
        $dominios = Dominios::orderBy('id', 'DESC')->paginate();
        return view('/sgsi/show', compact('dominios'));
    }

}
