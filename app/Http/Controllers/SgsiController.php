<?php

namespace Sgsi\Http\Controllers;

use Sgsi\sgsi;
use Illuminate\Http\Request;

class SgsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*echo 'Prueba';*/
        return view('sgsi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Sgsi\sgsi  $sgsi
     * @return \Illuminate\Http\Response
     */
    public function show(sgsi $sgsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Sgsi\sgsi  $sgsi
     * @return \Illuminate\Http\Response
     */
    public function edit(sgsi $sgsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Sgsi\sgsi  $sgsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sgsi $sgsi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Sgsi\sgsi  $sgsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(sgsi $sgsi)
    {
        //
    }
}
