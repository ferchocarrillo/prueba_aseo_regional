<?php

namespace App\Http\Controllers;

use App\Models\Mapas;
use Illuminate\Http\Request;

class MapasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       // $url = "https://www.google.com/maps/@4.6270855,-24.1475591,11z?hl=es";


        return view('mapas.index', compact('url'));
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
     * @param  \App\Models\Mapas  $mapas
     * @return \Illuminate\Http\Response
     */
    public function show(Mapas $mapas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapas  $mapas
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapas $mapas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapas  $mapas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapas $mapas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapas  $mapas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapas $mapas)
    {
        //
    }
}
