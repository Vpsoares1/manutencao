<?php

namespace App\Http\Middleware;

use App\Models\Usuario;
use App\Models\UsuarioToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class LogadoWebMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Cookie::has('token') && Cookie::has('usuario_id')) {
            $usuario_id = Cookie::get('usuario_id');
            $token = Cookie::get('token');
            $token_usuario = UsuarioToken::where('usuario_id', $usuario_id)
                ->where('token', $token)
                ->where('valido_ate', '>', now())
                ->first();
            if ($token_usuario) {
                $usuario = Usuario::find($usuario_id);
                $request->usuario = $usuario;

                return $next($request);
            } else {
                Cookie::forget('token');
                Cookie::forget('usuario_id');

                return redirect()->route('login');
            }

            return $next($request);
        } else {
            Cookie::forget('token');
            Cookie::forget('usuario_id');

            return redirect()->route('login');
        }
    }
}
