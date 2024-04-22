<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Cadastro;
use Illuminate\Support\Facades\Hash;

class AuthenticateCustom
{
    public function handle(Request $request, Closure $next)
    {
        if (! $this->autenticar($request)) {
            return redirect()->route('site.errorota');
        }

        return $next($request);
    }

    // Lógica de autenticação personalizada
    protected function autenticar($request)
    {
        // Verifica se o email e senha fornecidos correspondem a um usuário cadastrado
        $email = $request->input('email');
        $senha = $request->input('senha');

        // Busca o usuário no banco de dados pelo email
        $cadastro = Cadastro::where('email', $email)->first();

        // Verifica se o usuário existe e se a senha está correta
        if ($cadastro && Hash::check($senha, $cadastro->senha)) {
            // Se as credenciais estiverem corretas, retorna true (usuário autenticado)
            return redirect()->route('site.perfil');
        } else {
            // Se o usuário não existe ou a senha está incorreta, retorna false (usuário não autenticado)
            return false;
        }
    }
}