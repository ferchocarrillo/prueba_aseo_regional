<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Rutas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::select(
            'id',
            'documento',
            'nombres',
            'apellidos',
            'telefono',
            'lat',
            'lng',
            'rutas_id'
        )
        ->get();
        return view('clientes.index', compact('clientes'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function urls(Request $request)
    {


        $query = DB::table('clientes')
            ->where(
                'id', '=', $request->id
            );

        return view('clientes.index', compact(['query']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rutas = Rutas::select('id as id', 'nombre as text')->pluck(
            'text',
            'id'
        );
        return view('clientes.create', compact('rutas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Clientes::create($request->all());
        return redirect('clientes')->with(
            'info',
            'Registro Guardado Satisfactoriamente'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }


    public function coords(Request $request )

    {
         $coord =  Clientes::FindOrFail($request->id);
         print_r([$coord]);
         return view('clientes.coords', compact('coord'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rutas = Rutas::select('id as id', 'nombre as text')->pluck('text', 'id');
        $clientesEdit = Clientes::findOrFail($id);
        return view('clientes.edit', compact('clientesEdit', 'rutas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'documento' => ['required', 'max:6'],
                'nombres' => ['required', 'max:30'],
                'apellidos' => ['required', 'max:30'],
                'telefono' => ['required', 'max:10', 'min:10'],
                'lat_lon' => ['required'],
            ],
            [],
            [
                'documento' => 'Codigo',
                'nombres' => 'Nombre',
                'apellidos' => 'Apellidos ',
                'telefono' => 'Telefono ',
                'lat_lon' => 'Latitud Longitud',
            ]
        );

        $datosClientes = request()->except(['_token', '_method']);
        Clientes::where('id', '=', $id)->update($datosClientes);
        return redirect('clientes')->with(
            'info',
            'El cliente se ha registrado correctamente'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clientes::destroy($id);

        return redirect()
            ->route('clientes.index')
            ->with('status_success', 'registro successfully removed');
    }
}
