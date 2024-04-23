<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Login</title>

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
            height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto; 
            position: relative; 
            top: 50%; 
            transform: translateY(-50%); 
        }

        .boas-vindas {
            background: #3C7182;
            width: 40%;
            height: 450px;
            color: lightcyan;
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

        .boas-vindas h1, .boas-vindas h2 {
            margin: 10px;
        }

        .boas-vindas a:link, a:visited, a:hover, a:active {
            font-size: 1.1rem;
            color: white;
            text-decoration: none; 
        }


        .login {
            background: #cdf2ff;
            width: 60%;
            height: 450px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 0 10px 10px 0;
        }

        .login h2 {
            display: flex;
            justify-content: center;
            color: #3C7182;
        }

        .login input {
            width: 320px;
            height: 40px;
            color: cdf2ff;
            padding: 10px 40px 10px 15px; 
            margin: 10px auto;
            border-radius: 5px;
            border: none;
            background-color: #3C7182;
            position: relative;
        }

        .login input::placeholder {
            color: lightcyan;
        }

        .login .icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 13px; 
            color: lightcyan;
        }

        .login button {
            background-color: #3C7182;
            border: none;
            border-radius: 5px;
            width: 120px;
            height: 35px;
            color: lightcyan;
            text-align: center;
            margin: 20px auto;
            font-size: 1rem;
            font-weight: bold;
        }

        .login button:hover {
            cursor: pointer;
            background: #5eb4d1;
            color: #3C7182;
        }

        .recuperar-senha a {
            cursor: pointer;
            text-decoration: none;
            color: #3C7182;
            font-weight: bold;
        }

        .error-message {
                color: red; 
                font-size: 0.8rem; 
                margin-top: 5px; 
        }

    </style>
</head>
<body>
    <div class="login-container">
        <div class="boas-vindas">
            <h2>Bem-vindo ao</h2>
            <h1>DDH</h1>

            <img src="{{ asset('img/logo.png') }}" alt="Logo">
            <a href="{{ route('site.cadastro') }}">Cadastre-se</a>
        </div>

        <div class="login">

            <form action="{{ route('site.login') }}" method="post">
            @csrf
                <h2>Login</h2>

                <div style="position: relative;">
                    <input name="email" value="{{ old('email')}}" type="text" placeholder="E-mail">
                     <div class="error-message">
                        {{$errors->has('email') ? $errors->first('email') : ''}}
                    </div>
                    <i class="icon" data-feather="user"></i>
                </div>
                
                <div style="position: relative;">
                    <input name="senha" id="senha" value="{{ old('senha')}}" type="password" placeholder="Senha">
                    <div class="error-message">
                        {{$errors->has('senha') ? $errors->first('senha') : ''}}
                    </div>
                    <i id="verSenha" class="icon" data-feather="eye-off"></i>
                </div>



                <button type="submit">Entrar</button>
            <form>
                <div class="error-message">
                    {{isset($erro) && $erro != '' ? $erro : ''}}
                </div>

            <div class="recuperar-senha">
                <a href="{{ route('site.recuperarsenha') }}">Esqueci minha senha</a>
            </div>
            
        </div>
    </div>

     <script>
        feather.replace();
        document.addEventListener("DOMContentLoaded", function(event) {
            var senhaInput = document.getElementById('senha');
            var icon = document.getElementById('verSenha');

            // Evento click para alternar a visibilidade da senha
            icon.addEventListener('click', function() {
                // Alterne entre mostrar e ocultar a senha
                if (senhaInput.type === 'password') {
                    senhaInput.type = 'text';
                    icon.setAttribute('data-feather', 'eye');
                } else {
                    senhaInput.type = 'password';
                    icon.setAttribute('data-feather', 'eye-off');
                }
                feather.replace();
            });
        });
    </script>




</body>
</html>
