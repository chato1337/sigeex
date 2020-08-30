<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::with('documento')->with('correo')->where('estado', 1)->get();
        
        return ['personas' => $personas];
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
        
        $validacion = request()->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required',
            'documento_id' => 'required',
            'numero_documento' => 'required|unique:personas',
        ]);

        $persona = new Persona();
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
        $persona->documento_id = $request->documento_id;
        $persona->numero_documento = $request->numero_documento;
        $persona->save();

        return 'se igreso correctamente a al comunero';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        $personas = Persona::with('documento')->with('correo')->where('estado', 1)->where('id', $persona->id)->first();


        return ['personas' => $personas];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $desactivar_comunero = Persona::findOrFail($persona->id);
        $desactivar_comunero->estado = 0;
        $desactivar_comunero->save();

        return 'se desactivo correctamente';
    }
}