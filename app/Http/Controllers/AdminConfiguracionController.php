<?php

namespace App\Http\Controllers;

use App\VariablesGlobales;
use Illuminate\Http\Request;

class AdminConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $variables = VariablesGlobales::all();

        $administrador = $request->administrador;
        return view('administrador.configuraciones.db-configuraciones',
            [
                'variables' => $variables,
                'administrador' => $administrador
            ]
        );
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
     * @param  \App\VariablesGlobales  $variablesGlobales
     * @return \Illuminate\Http\Response
     */
    public function show(VariablesGlobales $variablesGlobales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VariablesGlobales  $variablesGlobales
     * @return \Illuminate\Http\Response
     */
    public function edit(VariablesGlobales $variablesGlobales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VariablesGlobales  $variablesGlobales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $variables = VariablesGlobales::all();

        $aforo = $variables[0];
        $tiempoMaximo = $variables[1];

        $aforo->valor = $request->input('aforo');
        $tiempoMaximo->valor = $request->input('tiempoMaximo');

        $respuestaAforo = $aforo->save();
        $respuestaTiempo = $tiempoMaximo->save();

        if($respuestaAforo == 1 || $respuestaTiempo == 1){
            return redirect('/administrador/configuraciones');
        } else {
            return redirect('/administrador/configuraciones');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VariablesGlobales  $variablesGlobales
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariablesGlobales $variablesGlobales)
    {
        //
    }
}
