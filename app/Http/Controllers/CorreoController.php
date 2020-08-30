<?php

namespace App\Http\Controllers;

use App\Correo;
use Illuminate\Http\Request;

class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $correo = new Correo;

        $correo->persona_id = $request->persona_id;
        $correo->descripcion = $request->descripcion;

        $correo->save();

        return 'correo guardado exitosamente';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Correo  $correo
     * @return \Illuminate\Http\Response
     */
    public function show(Correo $correo)
    {
        $listado_correos = Correo::where('persona_id', $correo->id)->get();

        return ['listado_correos' => $listado_correos];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Correo  $correo
     * @return \Illuminate\Http\Response
     */
    public function edit(Correo $correo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Correo  $correo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Correo $correo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Correo  $correo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Correo $correo)
    {
        //
    }
}