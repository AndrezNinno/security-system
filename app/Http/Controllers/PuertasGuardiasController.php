<?php

namespace App\Http\Controllers;

use App\PuertasGuardias;
use App\Puertas;
use App\User;
use Illuminate\Http\Request;

class PuertasGuardiasController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PuertasGuardias  $puertasGuardias
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Puertas $puerta)
    {
        $puertasAsignadas = PuertasGuardias::where('id_puerta', $puerta->id)->orderBy('id', 'desc')->first();
        $guardiaAsignado = 'No se encuentra un guardia asignado';
        if ($puertasAsignadas != null && $puertasAsignadas->descripcion == 'Asignar') {
            $guardia = User::find($puertasAsignadas->id_usuario);
            $guardiaAsignado = $guardia->nombres;
        }
        $guardias = User::where('rol', 'Guardia')->get();

        $administrador = $request->administrador;
        return view('administrador.puertas.asignar',
            [
                'puerta' => $puerta,
                'guardias' => $guardias,
                'guardiaAsignado' => $guardiaAsignado,
                'administrador' => $administrador
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PuertasGuardias  $puertasGuardias
     * @return \Illuminate\Http\Response
     */
    public function edit(PuertasGuardias $puertasGuardias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PuertasGuardias  $puertasGuardias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Puertas $puerta)
    {
        $puertaGuardia = new PuertasGuardias;

        $puertaGuardia->descripcion = 'Asignar';

        // Busca si el guardia a asignar ya se encuentra asignado a otra puerta
        $prueba = PuertasGuardias::where('id_usuario', $request->input('idGuardia'))->orderBy('id', 'desc')->first();

        // Si el último registro encontrado de ese guardia es que está asignado, no permite que lo asignen y retorna información.
        if($prueba != null && $prueba->descripcion == 'Asignar'){
            return redirect('/administrador/puertas/asignar/'.$puerta->id,
                [
                    'error' => 'El guardia ya se encuentra asignado a una puerta.'
                ]
            );
        }

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

        // Se se encontró un guardia asignado o no, proseguimos con la asignación del guardia actualmente en detalle.
        $puertaGuardia->id_usuario = $request->input('idGuardia');
        $puertaGuardia->id_puerta = $puerta->id;

        $resultado = $puertaGuardia->save();

        if($resultado == 1 ){
            return redirect('/administrador/puertas');
        } else {
            return redirect('/administrador/puertas', [
                'error' => 'No hubo ningún cambio.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PuertasGuardias  $puertasGuardias
     * @return \Illuminate\Http\Response
     */
    public function destroy(PuertasGuardias $puertasGuardias)
    {
        //
    }
}
