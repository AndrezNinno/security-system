<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Ingresos;
use App\VariablesGlobales;
use Illuminate\Support\Carbon;

class GuardiaVisitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $visitantes = User::where('rol', 'Visitante')->where('estado', 1)->get();
        $empleados = User::where('rol', 'Empleado')->where('estado', 1)->get();
        $tiempoMaximo = VariablesGlobales::where('nombre', 'tiempo_maximo')->first()->valor;
        $tiempoActual = now();

        $guardia = $request->guardia;

        if(count($visitantes) == 0){
            $visitantes = $empleados;
        } else {
            $visitantes = array_merge($visitantes, $empleados);
        }

        return view('guardia.visitantes.db-visitantes',[
            'visitantes' => $visitantes,
            'tiempoMaximo' => $tiempoMaximo,
            'tiempoActual' => $tiempoActual,
            'guardia' => $guardia
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
        $visitante = new User;
        $visitante->nombres = $request->input('regNombres');
        $visitante->genero = $request->input('regGenero');
        $visitante->tipo_documento = $request->input('regTipoDocumento');
        $visitante->numero_documento = $request->input('regNumDocumento');
        $visitante->correo = $request->input('regCorreo');
        $visitante->telefono = $request->input('regTelefono');
        $visitante->rol = 'Visitante';
        $visitante->estado = 0;

        $respuesta = $visitante->save();
        if($respuesta != null && $respuesta == 1){
            return redirect('/guardia/visitantes');
        } else {
            return redirect()->back()->withErrors(['Hubo un error registrando el usuario'])->withInput();
        }
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

    public function ingreso(Request $request)
    {
        $tipoDocumento = $request->input('ingresoTipoDocumento');
        $numeroDocumento = $request->input('ingresoNumDocumento');
        $temperatura = $request->input('ingresoTemperatura');

        $busqueda = User::where('tipo_documento', $tipoDocumento)->where('numero_documento', $numeroDocumento)->get();

        if($busqueda != null && count($busqueda) == 1){
            $usuario = $busqueda[0];

            if($usuario->rol == 'Visitante' || $usuario->rol == 'Empleado'){
                if($usuario->estado == 1){
                    return redirect()->back()->withErrors(['El usuario ya se encuentra dentro del centro.'])->withInput();
                }
    
                $ingreso = new Ingresos;
                $ingreso->descripcion = 'Ingreso';
                $ingreso->temperatura = $temperatura;
                $ingreso->id_usuario = $usuario->id;
    
                $usuario->estado = 1;
                $respuesta2 = $usuario->save();
    
                $respuesta = $ingreso->save();
                if($respuesta != null && $respuesta == 1 && $respuesta2 != null && $respuesta2 == 1){
                    return redirect()->back();
                } else {
                    return redirect()->back()->withErrors(['Hubo un error registrando el ingreso'])->withInput();
                }
            } else {
                return redirect()->back()->withErrors(['Hubo un error buscando el usuario'])->withInput();
            }
        } else {
            return redirect()->back()->withErrors(['Hubo un error buscando el usuario'])->withInput();
        }
    }

    public function salida(Request $request, User $user){
        $user->estado = 0;

        $salida = new Ingresos;
        $salida->descripcion = 'Salida';
        $salida->temperatura = 0;
        $salida->id_usuario = $user->id;

        $respuesta = $user->save();
        $respuesta2 = $salida->save();

        if($respuesta != null && $respuesta2 != null && $respuesta == 1 && $respuesta2 == 1){
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors(['Hubo un error cambiando el estado el usuario '.$user->nombres])->withInput();
        }
    }
}
