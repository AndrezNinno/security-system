<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminEmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empleados = User::where('rol', 'Empleado')->get();

        $administrador = $request->administrador;

        return view('administrador.empleados.db-empleados',
            [
                'empleados' => $empleados,
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
        $empleado = new User;

        $empleado->nombres = $request->input('nombres');
        $empleado->tipo_documento = $request->input('tipoDocumento');
        $empleado->numero_documento = $request->input('numeroDocumento');
        $empleado->correo = $request->input('correo');
        $empleado->telefono = $request->input('telefono');
        $empleado->estado = 0;
        $empleado->rol = 'Empleado';

        $respuesta = $empleado->save();

        if($respuesta == 1){
            return redirect('/administrador/empleados');
        } else {
            return redirect('/administrador/empleados',
                [
                    'error' => true
                ]
            );
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        $administrador = $request->administrador;
        return view('administrador.empleados.actualizar',
            [
                'empleado' => $user,
                'administrador' => $administrador
            ]
        );
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
        $user->nombres = $request->input('nombres');
        $user->tipo_documento = $request->input('tipoDocumento');
        $user->numero_documento = $request->input('numeroDocumento');
        $user->correo = $request->input('correo');
        $user->telefono = $request->input('telefono');

        $nuevaContrasena = $request->input('contrasena');
        if($nuevaContrasena != null && $nuevaContrasena != ''){
            $user->contrasena = $nuevaContrasena;
        }

        $resultado = $user->save();

        if ($resultado == 1) {
            return redirect('/administrador/empleados');
        } else {
            return redirect('/administrador/empleados/mostrar/'.$user->id,
                [
                    'error' => 'Hubo un error actualizando al usuario'
                ]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect('/administrador/empleados');
    }
}
