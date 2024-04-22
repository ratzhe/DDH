<?php

namespace App\Http\Controllers;

use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfissionalController extends Controller
{
    public function index(){
        return view('site.profissional.index');
    }

    public function listar(Request $request){
        $profissionais = Profissional::where('email', 'like', '%'.$request->input('email').'%')
            ->get();
        return view('site.profissional.listar', ['profissionais' => $profissionais]);
    }
    

    public function adicionar(Request $request){
        
        // inclusão
        if($request->input('_token') != '' && $request->input('id') == ''){
            // validação
            
            $regras = [
                'nome' => 'required|min:3',
                'sobrenome' => 'required|min:3',
                'registro' => 'required|unique:profissionais',
                'cpf' => 'required|unique:cadastros',
                'datanasc' => 'required|date',
                'profissional' => 'required',
                
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
                'crm.required' => 'O CRM é obrigatório!',
                'crm.unique' => 'CRM já cadastrado!',
                'cpf.required' => 'O CPF é obrigatório!',
                'cpf.unique' => 'CPF já cadastrado!',
                'datanasc.required' => 'A data de nascimento é obrigatória!',
                'datanasc.date' => 'Por favor, insira uma data de nascimento válida!',
                'profissional.required' => 'Informe o tipo de profissional!',
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

            $profissional = Profissional::create($request->all());
            $profissional->senha = Hash::make($request->senha);
            $profissional->save();

           
        }
        // edição
        if($request->input('_token') != '' && $request->input('id') != ''){
            $profissional = Profissional::find($request->input('id'));
            $update = $profissional->update($request->all());

            if($update){
                echo 'atualizado com sucesso';
            } else{
                echo 'não foi possível atualizar';
            }
            return redirect()->route('site.profissional.listar');
        }
        return view('site.profissional.editar');
    }

    public function editar($id){
        $profissional = Profissional::find($id);
        return view('site.profissional.editar', ['profissional' => $profissional]);
    }

    public function excluir($id){
        Profissional::find($id)->delete();

        return redirect()->route('site.profissional.index');
    }
}
