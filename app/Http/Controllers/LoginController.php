<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Mockery\Generator\StringManipulation\Pass\Pass;




class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';

        if($request->get('erro') == 1){
            $erro = "Usuário e/ou senha não existe";
        }
        return view('site.login', ['erro' => $erro]);
    }

    /*public function autenticar(Request $request){
        $regras = [
            'email' => 'required|email',
            'senha' => 'required'
        ];

        $feedback = [
            'email.required' => 'O campo E-mail é obrigatório!',
            'email.email' => 'Digite um E-mail válido!',
            'senha.required' => 'O campo Senha é obrigatório!'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('email');
        $senha = $request->get('senha');
        //$senha = $request->Hash::make('senha');
        

        echo "User:  $email | Senha: $senha";

        $cadastro = new Cadastro();

        $cadastrado = $cadastro->where('email', $email)->where('senha', $senha)->get()->first();

        if(isset($cadastrado->nome)){
            echo 'Usuário existe';
        } else {
           return redirect()->route('site.login', ['erro' => 1]);
        };
        
    }*/

    public function autenticar(Request $request){
        $regras = [
            'email' => 'required|email',
            'senha' => 'required'
        ];
    
        $feedback = [
            'email.required' => 'O campo E-mail é obrigatório!',
            'email.email' => 'Digite um E-mail válido!',
            'senha.required' => 'O campo Senha é obrigatório!'
        ];
    
        $request->validate($regras, $feedback);
    
        $email = $request->get('email');
        $senha = $request->get('senha');
    
        $cadastro = Cadastro::where('email', $email)->first();
    
        if($cadastro && Hash::check($senha, $cadastro->senha)){
            //echo 'Usuário existe';
            return redirect()->route('site.perfil');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        };
    }
    

    public function recuperarsenha(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'email' => 'email|required',
            ], [
                'email.email' => 'Digite um E-mail válido!',
                'email.required' => 'O campo E-mail é obrigatório!',
            ]);

            $status = Password::sendResetLink(
                $request->only('email')
                //['email' => $request->input('email')]
            );

            if($status === Password::RESET_LINK_SENT){
                return back()->with(['status' => _($status)]);
            }
            return back()->withErrors(['email' => _($status)]);
        }

        if($request->isMethod('get')){
            return view('site.recuperarsenha');
        }
    }

    public function reiniciarsenha(string $token){
        return view('site.trocarsenha', ['token' =>$token]);
    }

    public function trocarsenha(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'senha' => 'required|min:8|confirmed',
        ],
        
        [
            'token.required' => 'Esse link expirou. Recupere a senha novamente!',
            'email.required' => 'Os dados informados estão incorretos!',
            'email.email' => 'Dados incorretos. Recupere a senha novamente!',
            'senha.required' => 'A senha é obrigatória!',
            'senha.min' => 'A senha precisa ter 8 ou mais caracteres!',
            'senha.confirmed' => 'As senhas estão divergentes!'
        ]
    );

        $status = Password::reset(
            //$request->only('email', 'senha', 'senha_confirmation', 'token'),
            $request->only('email', 'senha', 'token'),
            function (Cadastro $cadastro, string $senha){
                $cadastro->forceFill([
                    'senha' =>Hash::make($senha)
                ])->setRememberToken(Str::random(60));

             $cadastro->save();

                event(new PasswordReset($cadastro));
            }
        );
    }

    
    

}
