<?php

namespace App\Http\Controllers;

use App\Models\Rutas;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class RutasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rutas = Rutas::all();
        return view('rutas.index', compact('rutas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rutas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Rutas::create($request->all());
        return redirect('rutas')
        ->with('info', 'Registro Guardado Satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function show(Rutas $rutas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rutasEdit = Rutas::findOrFail($id);
        return view('rutas.edit', compact('rutasEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rutas  $rutas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'codigo' => ['required', 'max:6' ],
                'nombre' => ['required', 'max:30' ],
            ],
            [],
            [
                'codigo' => 'Codigo',
                'nombre' => 'Nombre',
            ],
        );

        $datosRutas = request()->except(['_token', '_method']);
        Rutas::where('id', '=', $id)->update($datosRutas);
        return redirect('rutas')
        ->with('info', 'La ruta se ha registrado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param\App\Models\$id
     * @return\Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Rutas::destroy($id);

        return redirect()->route('rutas.index')
            ->with('status_success', 'registro successfully removed');

    }




}
