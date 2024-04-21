<?php

namespace App\Http\Controllers;

use App\Models\Nutricionista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NutricionistaController extends Controller
{
    public function teste() {
        return view('site.nutricionista.teste');
    }
    public function index(){
        return view('site.nutricionista.index');
    }  

    public function listar(Request $request){
        $nutricionistas = Nutricionista::where('email', 'like', '%'.$request->input('email').'%')
            ->get();
        return view('site.nutricionista.listar', ['nutricionistas' => $nutricionistas]);
    }

    public function adicionar(Request $request){
        
        // inclusão
        if($request->input('_token') != '' && $request->input('id') == ''){
            // validação
            //dd($request->all());
            $regras = [
                'nome' => 'required|min:3',
                'sobrenome' => 'required|min:3',
                'cfn' => 'required|unique:nutricionistas',
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
                'cfn.required' => 'O CFN é obrigatório!',
                'cfn.unique' => 'CFN já cadastrado!',
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

            $nutricionista = Nutricionista::create($request->all());
            $nutricionista->senha = Hash::make($request->senha);
            $nutricionista->save();
        }
        // edição
        if($request->input('_token') != '' && $request->input('id') != ''){
            $nutricionista = Nutricionista::find($request->input('id'));
            $update = $nutricionista->update($request->all());

            if($update){
                echo 'atualizado com sucesso';
            } else{
                echo 'não foi possível atualizar';
            }
            return redirect()->route('site.nutricionista.editar');
        }
        return view('site.nutricionista.editar');
    }

    public function editar($id){
        $nutricionista = Nutricionista::find($id);
        return view('site.nutricionista.editar', ['nutricionista' => $nutricionista]);
    }

    public function excluir($id){
        Nutricionista::find($id)->delete();

        return redirect()->route('site.nutricionista.index');
    }

}
