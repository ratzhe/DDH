<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller 
{
    protected $cadastro;

    public function __construct(Cadastro $cadastro)
    {
        $this->cadastro = $cadastro;
    }

    public function cadastrar(Request $request)
    {
        return view('site.cadastro');
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'cpf' => 'required|unique:cadastros',
            'email' => 'email|unique:cadastros',
            'senha' => 'required|min:8|confirmed',
        ], [
            'nome.required' => 'O nome é obrigatório!',
            'sobrenome.required' => 'O sobrenome é obrigatório!',
            'cpf.required' => 'O CPF é obrigatório!',
            'cpf.unique' => 'CPF já cadastrado!',
            'email.email' => 'O e-mail é obrigatório!',
            'email.unique' => 'E-mail já cadastrado!',
            'senha.required' => 'A senha é obrigatória!',
            'senha.min' => 'A senha precisa ter 8 ou mais caracteres!',
            'senha.confirmed' => 'As senhas estão divergentes!'
        ]);

        $cadastro = new Cadastro();
        $cadastro->fill($request->all());
        $cadastro->senha = Hash::make($request->senha);
        $cadastro->save();

        return redirect()->route('site.login');
    }

}
