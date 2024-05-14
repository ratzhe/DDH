<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller
{
    public function listar(Request $request){
        $pacientes = Paciente::where('email', 'like', '%'.$request->input('email').'%')
            ->get();
        return view('site.paciente.listar', ['pacientes' => $pacientes]);
    }

    public function adicionar(Request $request){
        
        // inclusão
        if($request->input('_token') != '' && $request->input('id') == ''){
            // validação
            
            $regras = [
                'nome' => 'required|min:3',
                'sobrenome' => 'required|min:3',
                'rg' => 'required|unique:pacientes',
                'cpf' => 'required|unique:pacientes',
                'datanasc' => 'required|date',
                'genero' => 'required_without_all:masculino,feminino',
                'cep' => 'required|regex:/^\d{5}-?\d{3}$/',
                'telefone' => 'required|regex:/^\(\d{2}\)\s\d{4,5}-\d{4}$/',
                'email' => 'required|email|unique:pacientes',
                'senha' => 'required|min:8|confirmed',
            ];

            $respostas =[
                'nome.required' => 'O nome é obrigatório!',
                'nome.min' => 'O nome precisa ter mais de 3 letras!',
                'sobrenome.required' => 'O sobrenome é obrigatório!',
                'sobrenome.min' => 'O sobrenome precisa ter mais de 3 letras!',
                'rg.required' => 'O RG é obrigatório!',
                'rg.unique' => 'RG já cadastrado!',
                'cpf.required' => 'O CPF é obrigatório!',
                'cpf.unique' => 'CPF já cadastrado!',
                'datanasc.required' => 'A data de nascimento é obrigatória!',
                'genero.required_without_all' => 'Por favor, selecione o gênero!',
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

            $paciente = Paciente::create($request->all());
            $paciente->senha = Hash::make($request->senha);
            $paciente->save();

            return redirect()->route('site.paciente.listar')->with('success', 'Paciente cadastrado com sucesso!');        
        }
        return view('site.paciente.editar');
    }

    public function editar($id, Request $request){
        $paciente = Paciente::find($id);
    
        if ($request->filled('senha')) {
            $paciente->senha = Hash::make($request->senha);
        }
    
        $paciente->fill($request->except('senha'));
        $paciente->save();
        return view('site.paciente.editar', ['paciente' => $paciente]);
        }
    
    public function excluir($id){
        Paciente::find($id)->delete();
            
        return redirect()->route('site.paciente.listar')->with('success', 'Paciente excluído com sucesso!');       
    }
}
