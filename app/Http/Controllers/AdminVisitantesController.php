<?php

namespace App\Http\Controllers;

use App\User;
use App\VariablesGlobales;
use App\Ingresos;
use Illuminate\Http\Request;

class AdminVisitantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $visitantes = User::where('rol', 'Visitante')->where('estado', 1)->get()->all();
        $empleados = User::where('rol', 'Empleado')->where('estado', 1)->get()->all();
        $tiempoMaximo = VariablesGlobales::where('nombre', 'tiempo_maximo')->first()->valor;
        $tiempoActual = now();

        if(count($visitantes) == 0){
            $visitantes = $empleados;
        } else {
            $visitantes = array_merge($visitantes, $empleados);
        }

        $tiempos = array();
        foreach ($visitantes as $visitante) {
            $ingreso = Ingresos::where("id_usuario", $visitante->id)->orderBy('id', 'desc')->first();
            if($ingreso != null && $ingreso->descripcion == 'Ingreso'){
                $tiempos = array_merge($tiempos, array($visitante->nombres => $ingreso->created_at));
            } else {
                return redirect('/administrador')->withErrors(['El visitante '.$visitante->tipo_documento.'-'.$visitante->numero_documento.' está activo pero su último registro es de salida.']);
            }
        }

        $administrador = $request->administrador;
        return view('administrador.visitantes.db-visitantes',[
            'visitantes' => $visitantes,
            'tiempoMaximo' => $tiempoMaximo,
            'tiempoActual' => $tiempoActual,
            'administrador' => $administrador,
            'tiempos' => $tiempos
        ]);
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
