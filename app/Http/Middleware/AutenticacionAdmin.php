<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class AutenticacionAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->exists('usuario')){
            $administrador = User::find($request->session()->get('usuario'));
            $request->merge(['administrador' => $administrador]);

            return $next($request);
        } else {
            return redirect('/administrador')->withErrors('Por favor inicie sesión como administrador')->withInput();
        }
    }
}
