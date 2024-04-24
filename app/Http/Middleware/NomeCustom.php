<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cadastro;

class NomeCustom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('email')) {
            $email = Session::get('email');
            $cadastro = Cadastro::where('email', $email)->first();
            if ($cadastro) {
                // Compartilha o nome do usuário com todas as views
                view()->share('nome', $cadastro->nome);
            }
        }

        return $next($request);
    }
}
