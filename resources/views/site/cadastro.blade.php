<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Cadastro</title>

    <style>
            * {
                font-family: Arial, Helvetica, sans-serif;
                box-sizing: border-box;

            }

            html, body {
                height: 100%;
                margin: 0;
                background-color: rgb(237, 253, 253);
            }

            .login-container {
                width: 50%;
                height: 600px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: auto; 
                position: relative; 
                top: 50%; 
                transform: translateY(-50%); 
            }

            .boas-vindas {
                background: #cdf2ff;
                width: 40%;
                height: 550px;
                color: #3C7182;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                border-radius: 10px 0 0 10px;
            }

            .boas-vindas img {
                height: 200px;
                width: 200px;
            }

            .boas-vindas h1, h2 {
                margin: 10px;
            }

            .login {
                background: #3C7182;;
                width: 60%;
                height: 550px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                border-radius: 0 10px 10px 0;
            }

            .login h2 {
                display: flex;
                justify-content: center;
                color: lightcyan;
            }

            .login input {
                width: 320px;
                height: 40px;
                color: #3C7182;;
                padding: 10px 40px 10px 15px; 
                margin: 5px auto;
                border-radius: 5px;
                border: none;
                background-color: #cdf2ff;
                position: relative;
            }

            .login input::placeholder {
                color: #3C7182;;
            }

            .login .icon {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                right: 13px; 
                color: #3C7182;;
            }

            .login button {
                background-color: #cdf2ff;
                border: none;
                border-radius: 5px;
                width: 120px;
                height: 35px;
                color: #3C7182;;
                text-align: center;
                margin: 20px auto;
                font-size: 1rem;
                font-weight: bold;
            }

            .login button:hover {
                cursor: pointer;
                background: lightcyan;

            }

            .error-message {
                color: red; 
                font-size: 0.8rem; 
                margin-top: 5px; 
            }

            .input-error {
                border: solid 1px red !important; 
                background-color: #ffe9e9 !important;
            }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="boas-vindas">
            <h2>Cadastre-se no</h2>
            <h1>DDH</h1>
            
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </div>
        
        <div class="login">
        <form action="{{ route('site.cadastro') }}" method="post">

            <h2>Cadastro</h2>
            @csrf
            <div style="position: relative;">
               <input value="{{ old('nome')}}" name="nome" type="text" placeholder="Nome" class="{{ $errors->has('nome') ? 'input-error' : '' }}">

                <div class="error-message">
                    {{$errors->has('nome') ? $errors->first('nome') : ''}}
                </div>
                <i class="icon" data-feather="user"></i>
            </div>

            <div style="position: relative;">
                <input value="{{ old('sobrenome')}}" name="sobrenome" type="text" placeholder="Sobrenome" class="{{ $errors->has('sobrenome') ? 'input-error' : '' }}">
                <div class="error-message">
                    {{$errors->has('sobrenome') ? $errors->first('sobrenome') : ''}}
                </div>
                <i class="icon" data-feather="user-check"></i>
            </div>
            
            <div style="position: relative;">
                <input value="{{ old('cpf')}}" name="cpf" type="text" placeholder="CPF" class="{{ $errors->has('cpf') ? 'input-error' : '' }}">
                <div class="error-message">
                    {{$errors->has('cpf') ? $errors->first('cpf') : ''}}
                </div>
                <i class="icon" data-feather="book"></i>
            </div>

            <div style="position: relative;">
                <input value="{{ old('email')}}" name="email" type="email" placeholder="E-mail" class="{{ $errors->has('email') ? 'input-error' : '' }}" >
                <div class="error-message">
                    {{$errors->has('email') ? $errors->first('email') : ''}}
                </div>
                <i class="icon" data-feather="mail"></i>
            </div>

            <div style="position: relative;">
                <input id="senha" name="senha" type="password" placeholder="Senha" class="{{ $errors->has('senha') ? 'input-error' : '' }}">
                <div class="error-message">
                    {{$errors->has('senha') ? $errors->first('senha') : ''}}
                </div>
                <i id="verSenha" class="icon" data-feather="eye-off"></i>
            </div>

            <div style="position: relative;">
                <input id="senha_confirmation" name="senha_confirmation" type="password" placeholder="Confirme a senha" class="{{ $errors->has('confirmarsenha') ? 'input-error' : '' }}">
                <div class="error-message">
                    {{$errors->has('senha_confirmation') ? $errors->first('senha_confirmation') : ''}}
                </div>
                <i id="verConfirmarSenha" class="icon" data-feather="eye-off"></i>
            </div>

            <button type="submit">Cadastrar</button>
        </form>
        </div>

    </div>

    <script>
        feather.replace();
        document.addEventListener("DOMContentLoaded", function(event) {
            var senhaInput = document.getElementById('senha');
            var confirmarSenhainput = document.getElementById('senha_confirmation');
            var iconSenha = document.getElementById('verSenha');
            var iconConfirmarSenha = document.getElementById('verConfirmarSenha');

            // Evento click para alternar a visibilidade da senha
            iconSenha.addEventListener('click', function() {
                // Alterne entre mostrar e ocultar a senha
                if (senhaInput.type === 'password') {
                    senhaInput.type = 'text';
                    iconSenha.setAttribute('data-feather', 'eye');
                } else {
                    senhaInput.type = 'password';
                    iconSenha.setAttribute('data-feather', 'eye-off');
                }
                feather.replace();
            });

            iconConfirmarSenha.addEventListener('click', function() {
                // Alterne entre mostrar e ocultar a senha
                if (confirmarSenhainput.type === 'password') {
                    confirmarSenhainput.type = 'text';
                    iconConfirmarSenha.setAttribute('data-feather', 'eye');
                } else {
                    confirmarSenhainput.type = 'password';
                    iconConfirmarSenha.setAttribute('data-feather', 'eye-off');
                }
                feather.replace();
            });
        });
    </script>
</body>
</html>


