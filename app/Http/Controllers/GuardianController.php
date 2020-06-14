<?php

namespace App\Http\Controllers;

use App\User;
use App\VariablesGlobales;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $guardia = $request->guardia;
        $aforoTotal = VariablesGlobales::where('nombre', 'aforo')->get()[0]->valor;
        $aforo = User::where('estado', 1)->count();
        $visitantes = User::where('rol', 'Visitante')->where('estado', 1)->count();
        
        return view('guardia.db-guardia',[
                'aforoTotal' => $aforoTotal,
                'aforo' => $aforo,
                'visitantes' => $visitantes,
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

    public function login(Request $request)
    {
        return view('guardia.login');
    }

    public function auth(Request $request)
    {
        $guardia = User::where('tipo_documento', $request->input('tipoDocumento'))->where('numero_documento', $request->input('numeroDocumento'))->where('tipo_documento', 'CC')->where('contrasena', $request->input('contrasena'))->where('rol', 'Guardia')->get();
        
        if($guardia != null && count($guardia) == 1){
            $request->session()->put('guardia', $guardia[0]->id);
            return redirect('/guardia/dashboard');
        } else {
            return redirect()->back()->withErrors(['No se encontró un usuario con ese documento o contraseña'])->withInput();
        }
    }

    public function logout(Request $request){
        $request->session()->forget('guardia');

        return redirect('/');
    }

    public function perfil(Request $request){
        $guardia = $request->guardia;
        
        return view('guardia.perfil',[
            'guardia' => $guardia
        ]);
    }

    public function actualizar(Request $request){
        $guardia = $request->guardia;

        $guardia->nombres = $request->input('nombres');
        $guardia->tipo_documento = $request->input('tipoDocumento');
        $guardia->correo = $request->input('correo');
        $guardia->telefono = $request->input('telefono');
        $guardia->numero_documento = $request->input('numeroDocumento');

        $respuesta = $guardia->save();

        if($respuesta == 1){
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors(['Hubo un error guardando su información'])->withInput();
        }

    }
}
