<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChecarSolicitudPropia
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cita = $request->route('citas');

        if($cita&&$cita->user_id != auth()->id()){
            return response()->json(['error'=>'No tienes los permisos para realizar la accion']);
        }
        return $next($request);
    }
}