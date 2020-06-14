<?php

namespace App\Http\Controllers;

use App\User;
use App\Puertas;
use App\VariablesGlobales;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cantPuertas = Puertas::all()->count();
        $cantGuardias = User::where('rol', 'Guardia')->count();
        $aforoTotal = VariablesGlobales::where('nombre', 'aforo')->get()[0]->valor;
        $aforo = User::where('estado', 1)->count();
        $visitantes = User::where('rol', 'Visitante')->where('estado', 1)->count();

        $administrador = $request->administrador;

        return view('administrador.db-principal',
            [
                'puertas' => $cantPuertas,
                'guardias' => $cantGuardias,
                'aforoTotal' => $aforoTotal,
                'aforo' => $aforo,
                'visitantes' => $visitantes,
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $administrador = $request->administrador;

        return view('administrador.perfil',
            [
                'administrador' => $administrador
            ]
        );
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
        $user->genero = $request->input('genero');
        $user->fecha_nacimiento = $request->input('fechaNacimiento');
        $user->correo = $request->input('correo');
        $user->telefono = $request->input('telefono');

        $anterior = $request->input('anterior');
        $nueva = $request->input('nueva');

        if($nueva != null && $nueva != '' && $anterior != null && $anterior != ''){
            if($user->contrasena == $anterior){
                $user->contrasena = $nueva;
            }
        }

        $resultado = $user->save();

        if($resultado == 1){
            return redirect('/administrador/perfil');
        } else {
            return redirect('/administrador/perfil');
        }
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

    /**
     * Retorna la vista del formulario de inicio de sesión.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginForm()
    {
        return view('administrador.login');
    }

    /**
     * Realiza el proceso del login de un administrador.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $cedula = $request->input('cedula');
        $contrasena = $request->input('contrasena');

        $admin = User::where('numero_documento',$cedula)->where('rol', 'Administrador')->where('contrasena', $contrasena)->get();

        if($admin != null && count($admin) == 1){
            $request->session()->put('usuario', $admin[0]->id);
            return redirect('/administrador/dashboard');
        } else {
            return redirect()->back()->withErrors(['No se encontró un usuario con ese documento o contraseña'])->withInput();
        }
    }

    public function logout(Request $request){
        $request->session()->forget('usuario');

        return redirect('/administrador');
    }
}
