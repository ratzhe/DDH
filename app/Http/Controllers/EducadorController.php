<?php

namespace App\Http\Controllers;

use App\Models\Educador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class EducadorController extends Controller
{
    public function index(){
        return view('site.educador.index');
    }

    public function listar(Request $request){
        $educadores = Educador::where('email', 'like', '%'.$request->input('email').'%')
            ->get();
        return view('site.educador.listar', ['educadores' => $educadores]);
    }

    public function adicionar(Request $request){
        
        // inclusão
        if($request->input('_token') != '' && $request->input('id') == ''){
            // validação
            
            $regras = [
                'nome' => 'required|min:3',
                'sobrenome' => 'required|min:3',
                'cref' => 'required|unique:educadores',
                'cpf' => 'required|unique:cadastros',
                'datanasc' => 'required|date',
                //'genero' => 'required|in:masculino,feminino',
                'cep' => 'required|regex:/^\d{5}-?\d{3}$/',
                'telefone' => 'required|regex:/^\(\d{2}\)\s\d{4,5}-\d{4}$/',
                'email' => 'required|email|unique:cadastros',
                'senha' => 'required|min:8|confirmed',
            ];

            $respostas =[
                'nome.required' => 'O nome é obrigatório!',
                'nome.min' => 'O nome precisa ter mais de 3 letras!',
                'sobrenome.required' => 'O sobrenome é obrigatório!',
                'sobrenome.min' => 'O sobrenome precisa ter mais de 3 letras!',
                'cref.required' => 'O CRM é obrigatório!',
                'cref.unique' => 'CRM já cadastrado!',
                'cpf.required' => 'O CPF é obrigatório!',
                'cpf.unique' => 'CPF já cadastrado!',
                'datanasc.required' => 'A data de nascimento é obrigatória!',
                'datanasc.date' => 'Por favor, insira uma data de nascimento válida!',
                //'genero.required' => 'Informe o gênero!',
                //'genero.in' => 'Gênero inválido!',
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

            $educador = Educador::create($request->all());
            $educador->senha = Hash::make($request->senha);
            $educador->save();
        }
        // edição
        if($request->input('_token') != '' && $request->input('id') != ''){
            $educador = Educador::find($request->input('id'));
            $update = $educador->update($request->all());

            if($update){
                echo 'atualizado com sucesso';
            } else{
                echo 'não foi possível atualizar';
            }
            return redirect()->route('site.educador.editar');
        }
        return view('site.educador.editar');
    }

    public function editar($id){
        $educador = Educador::find($id);
        return view('site.educador.editar', ['educador' => $educador]);
        
    }

    public function excluir($id){
        Educador::find($id)->delete();

        return redirect()->route('site.educador.index');
    }
}
