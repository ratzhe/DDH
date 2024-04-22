<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifique se o usuário está autenticado
        if (!Auth::check()) {
            // Se não estiver autenticado, redirecione para a página de login
            return redirect()->route('site.login');
        }

        // Se estiver autenticado, deixe a solicitação passar para o próximo middleware na cadeia
        return $next($request);
    }
}
