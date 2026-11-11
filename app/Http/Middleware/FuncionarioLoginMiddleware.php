<?php

namespace App\Http\Middleware;

use App\Models\Funcionario;
use App\Models\FuncionarioToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class FuncionarioLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Cookie::has('token') && Cookie::has('funcionario_id')) {
            $funcionario_id = Cookie::get('funcionario_id');
            $token = Cookie::get('token');
            $token_funcionario = FuncionarioToken::where('funcionario_id', $funcionario_id)
                ->where('token', $token)
                ->where('valido_ate', '>', now())
                ->first();
            if ($token_funcionario) {
                $funcionario = Funcionario::find($funcionario_id);
                $request->funcionario = $funcionario;

                return $next($request);
            } else {
                dd("AQUI 2 ");
                Cookie::forget('token');
                Cookie::forget('funcionario_id');

                return redirect()->route('login_funcionario');
            }

            return $next($request);
        } else {
             dd("AQUI 3 ");
            Cookie::forget('token');
            Cookie::forget('funcionario_id');

            return redirect()->route('login_funcionario');
        }
    }
}
