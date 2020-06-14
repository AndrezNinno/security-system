<?php

namespace App\Http\Controllers;

use App\User;
use App\PuertasGuardias;
use App\Puertas;
use Illuminate\Http\Request;

class AdminGuardController extends Controller
{
    /**
     * Retorna la lista de todos los guardias.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $guardias = User::where('rol', 'Guardia')->get();

        $puertas = array();
        foreach ($guardias as $guardia) {
            $prueba = PuertasGuardias::where('id_usuario', $guardia->id)->orderBy('id', 'desc')->first();
            if($prueba != null && $prueba->descripcion == 'Asignar'){
                $puerta = Puertas::find($prueba->id_puerta);
                $puertas = array_merge($puertas, array($guardia->nombres => $puerta->nombre));
            } else {
                $puertas = array_merge($puertas, array($guardia->nombres => null));
            }
        }

        $administrador = $request->administrador;
        return view('administrador.guardias.db-guardias',
            [
                'guardias' => $guardias,
                'puertas' => $puertas,
                'administrador' => $administrador
            ]
        );
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Guarda un nuevo guardian en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guardia = new User;

        // No implementaron para guardar una imagen dentro del formulario de registro de guardias.
        // $path = $request->file('imagen')->store('', 'imagenes');

        // $guardia->foto = $path;
        $guardia->nombres = $request->input('nombres');
        $guardia->contrasena = $request->input('contrasena');
        $guardia->tipo_documento = $request->input('tipoDocumento');
        $guardia->numero_documento = $request->input('numeroDocumento');
        $guardia->correo = $request->input('correo');
        $guardia->telefono = $request->input('telefono');
        $guardia->estado = '0';
        $guardia->rol = 'Guardia';

        $respuesta = $guardia->save();

        if($respuesta == 1){
            // Muestra la vista del registro de guardias del administrador.
            return redirect('/administrador/guardias');
        } else {
            // Retorna una vista de error o dependiendo de lo que vaya a mostrar.
            return redirect('/administrador/guardias', [
                'error' => true
            ]);
        }
    }

    /**
     * Muestra un recurso específico.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        $administrador = $request->administrador;
        return view('administrador.guardias.actualizar',
            [
                'guardia' => $user,
                'administrador' => $administrador
            ]
        );
    }

    /**
     * Muestra el formulario para editar un Guardian.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Actualiza la información del guardián.
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
            return redirect('/administrador/guardias');
        } else {
            return redirect('/administrador/guardias/mostrar/'.$user->id,
                [
                    'error' => 'Hubo un error actualizando al usuario'
                ]
            );
        }
    }

    /**
     * Elimina un guardián.
     * 
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect('/administrador/guardias');
    }

    /**
     * Desasigna una puerta del guardian
     */
    public function desasignarPuerta(Request $request, User $user)
    {
        $registro = PuertasGuardias::where('id_usuario', $user->id)->orderBy('id','desc')->first();

        if($registro != null && $registro->descripcion == 'Asignar'){
            $nuevoRegistro = new PuertasGuardias;
            $nuevoRegistro->descripcion = 'Desasignar';
            $nuevoRegistro->id_usuario = $user->id;
            $nuevoRegistro->id_puerta = $registro->id_puerta;
            $respuesta = $nuevoRegistro->save();
            if($respuesta == 1){
                return redirect('/administrador/guardias');
            } else {
                return redirect('/administrador/guardias',
                    [
                        'error' => 'Se encontró un error realizando la desasignación.'
                    ]
                );
            }
        } else {
            return redirect('/administrador/guardias',
                [
                    'error' => 'Se encontró un error en la primera validación, contactar soporte técnico.'
                ]
            );
        }
    }
}
