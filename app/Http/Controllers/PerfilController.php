<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function index(){
        $email = Session::get('email');
        $usuario = Cadastro::where('email', $email)->first();
        return view('site.perfil', ['usuario' => $usuario]);
    }

    public function validacao(Request $request){
        $regras = [
            'nome' => 'required',
            'sobrenome' => 'required',
            'cpf' => 'required|unique:usuarios',
            'email' => 'email|unique:usuarios',
            'senha' => 'required|min:8|confirmed',
        ];

        $feedback = [
            'nome.required' => 'O nome é obrigatório!',
            'sobrenome.required' => 'O sobrenome é obrigatório!',
            'cpf.required' => 'O CPF é obrigatório!',
            'cpf.unique' => 'CPF já cadastrado!',
            'email.email' => 'O e-mail é obrigatório!',
            'email.unique' => 'E-mail já cadastrado!',
            'senha.required' => 'A senha é obrigatória!',
            'senha.min' => 'A senha precisa ter 8 ou mais caracteres!',
            'senha.confirmed' => 'As senhas estão divergentes!'
        ];

        $request->validate($regras, $feedback);
    }
    
    public function editar(Request $request){
        $email = Session::get('email');
        $usuario = Cadastro::where('email', $email)->first();
    
        if ($request->filled('senha')) {
            $usuario->senha = Hash::make($request->senha);
        }

        $usuario->fill($request->except('senha'));
        $usuario->save();
        return redirect()->route('site.perfil')->with('success', 'Perfil atualizado com sucesso!');
    }
}
