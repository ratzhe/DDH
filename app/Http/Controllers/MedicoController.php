<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MedicoController extends Controller
{
    public function index(){
        return view('site.medico.index');
    }

    public function listar(){
        return view('site.medico.listar');
    }

    public function adicionar(Request $request){
        

        if($request->input('_token') != ''){
            
            $regras = [
                'nome' => 'required|min:3',
                'sobrenome' => 'required|min:3',
                'crm' => 'required|unique:medicos',
                'cpf' => 'required|unique:cadastros',
                'datanasc' => 'required|date',
                'genero' => 'required|in:masculino,feminino',
                'cep' => 'required|regex:/^\d{5}-?\d{3}$/',
                'telefone' => 'required|regex:/^\(\d{2}\)\s\d{4,5}-\d{4}$/',
                'email' => 'required|email|unique:cadastros',
                //'senha' => 'required|min:8',
                'senha' => 'required|min:8|confirmed',
            ];

            $respostas =[
                'nome.required' => 'O nome é obrigatório!',
                'nome.min' => 'O nome precisa ter mais de 3 letras!',
                'sobrenome.required' => 'O sobrenome é obrigatório!',
                'sobrenome.min' => 'O sobrenome precisa ter mais de 3 letras!',
                'crm.required' => 'O CRM é obrigatório!',
                'crm.unique' => 'CRM já cadastrado!',
                'cpf.required' => 'O CPF é obrigatório!',
                'cpf.unique' => 'CPF já cadastrado!',
                'datanasc.required' => 'A data de nascimento é obrigatória!',
                'datanasc.date' => 'Por favor, insira uma data de nascimento válida!',
                'genero.required' => 'Informe o gênero!',
                'genero.in' => 'Gênero inválido!',
                'cep.required' => 'O CEP é obrigatório!',
                'cep.regex' => 'Por favor, insira um CEP válido!',
                'telefone.required' => 'O telefone é obrigatório!',
                'telefone.regex' => 'Por favor, insira um telefone válido!',
                'email.required' => 'O e-mail é obrigatório!',
                'email.email' => 'Por favor, insira um e-mail válido!',
                'email.unique' => 'E-mail já cadastrado!',
                'senha.required' => 'A senha é obrigatória!',
                'senha.min' => 'A senha precisa ter 8 ou mais caracteres!',
                'senha.confirmed' => 'As senhas estão divergentes!'
            ];

            $request->validate($regras, $respostas);

            $medico = new Medico();
            $medico->create($request->all());
        }
        
        return view('site.medico.adicionar');
    }

    
}