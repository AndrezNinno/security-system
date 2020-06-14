<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class AutenticacionGuardia
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
        if($request->session()->exists('guardia')){
            $guardia = User::find($request->session()->get('guardia'));
            $request->merge(['guardia' => $guardia]);
            
            return $next($request);
        } else {
            return redirect('/')->withErrors('Por favor inicie sesión como guardia')->withInput();
        }
    }
}
