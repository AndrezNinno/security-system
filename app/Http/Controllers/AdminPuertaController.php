<?php

namespace App\Http\Controllers;

use App\Puertas;
use App\PuertasGuardias;
use App\User;
use Illuminate\Http\Request;

class AdminPuertaController extends Controller
{
    /**
     * Mostrar una lista de Puertas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $puertas = Puertas::all();

        $guardiasAsignados = array();
        foreach ($puertas as $puerta) {
            $x = PuertasGuardias::where('id_puerta',$puerta->id)->orderBy('id','desc')->first();
            if ($x != null && $x->descripcion == 'Asignar'){
                $guardia = User::find($x->id_usuario);
                $guardiasAsignados = array_merge($guardiasAsignados, array($puerta->nombre => $guardia->nombres));
            } else {
                $guardiasAsignados = array_merge($guardiasAsignados, array($puerta->nombre => 'No hay un guardia asignado'));
            }
        }

        $administrador = $request->administrador;
        // Es como la vista dashboard de puertas donde se listan todas
        return view('administrador.puertas.db-puertas',
            [
                'puertas' => $puertas,
                'guardias' => $guardiasAsignados,
                'administrador' => $administrador
            ]    
        );
    }

    /**
     * Muestra un formulario para registrar una puerta.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Muestra la vista todo lo necesario para crear una puerta
    }

    /**
     * Guardar una nueva puerta que se está creando.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $puerta = new Puertas;
        $puerta->nombre = $request->input('nombre');
        $puerta->descripcion = $request->input('descripcion');
        $puerta->estado = $request->input('estado');

        $respuesta = $puerta->save();

        if($respuesta == 1){
            // Retorna nuevamente la lista de las puertas
            return redirect('/administrador/puertas');
        }else{
            // Retorna a la vista de crear puertas simulando un error.
            return redirect('/administrador/puertas',
                [
                    'error' => true
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Puertas  $puertas
     * @return \Illuminate\Http\Response
     */
    public function show(Puertas $puertas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Puertas  $puertas
     * @return \Illuminate\Http\Response
     */
    public function edit(Puertas $puertas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Puertas  $puertas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Puertas $puertas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Puertas  $puerta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Puertas $puerta)
    {
        // Busca si actualmente la puerta tiene un guardia asignado
        $registroHistorialPuerta = PuertasGuardias::where('id_puerta', $puerta->id)->orderBy('id', 'desc')->first();

        // Si el registro encontrado tiene como descripción asignado, entonces tiene un guardia al cual primero desasignaremos.
        if ($registroHistorialPuerta != null && $registroHistorialPuerta->descripcion == 'Asignar') {
            // Se encontró un guardia asignado.. ahora lo vamos a desasignar.
            $desasignacion = new PuertasGuardias;
            $desasignacion->descripcion = 'Desasignar';
            $desasignacion->id_usuario = $registroHistorialPuerta->id_usuario;
            $desasignacion->id_puerta = $puerta->id;

            $respuesta = $desasignacion->save();

            if($respuesta != 1){
                return redirect('/administrador/puertas/asignar/'.$puerta->id,
                    [
                        'error' => 'Hubo un error desasignando el anterior guardia.'
                    ]
                );
            }
        }
        
        $puerta->delete();

        return redirect('/administrador/puertas');
    }
}
