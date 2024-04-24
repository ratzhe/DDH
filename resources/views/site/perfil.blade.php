<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Perfil</title>

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
            margin: 0;
        }


        .consultas-container {
            display: flex;
            flex-direction: column; 
        }

        .paciente {
            position: relative;
            width: 100%; 
            height: 115px;
            float: left; 
            padding-right: 20px; 
            display: flex; 
            align-items: center; 

        }


        .paciente h2 {
            text-align: left;
            margin: 0 20px 0 20px; 
            color: #3C7182;
        }

        .circulo-foto {
            width: 100px; 
            height: 100px; 
            background-color: #3C7182;
            border-radius: 50%; 
            display: flex;
            justify-content: center; 
            align-items: center; 
            position: absolute; 
            top: 50%; 
            right: 20px; 
            transform: translateY(-50%); 
        }

        .circulo-foto .icon {
            height: 50px;
            width: 50px;
            position: absolute;
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%);
            color: lightcyan;
        }

        .menu {
            display: flex;
            flex-wrap: wrap; 
            width: 100%;
            height: 30px;
        }

        .menu-consultas {
            background-color: lightcyan;
            height: 100%;
            width: 180px;
            text-align: center;
            padding: 6px;
            border-radius: 5px 5px 0 0;
            color: #3C7182;
            margin: 0 7px;
            margin-top: auto; 
            cursor: pointer;
        }

        .menu-consultas:hover {
            color: lightcyan;
            background-color: #3C7182;
        }

        .menu a{
            text-decoration: none;
            color: #3C7182;
            background-color: lightcyan;
        }

        .menu a:hover {
            text-decoration: none;
            color: lightcyan;
            background-color: #3C7182;
        }

        .menu #menu {
            color: lightcyan;
            background-color: #3C7182;
            
        }

        .menu a {
            text-decoration: none;
        }

        .pesquisa-consultas {
            background-color: #3C7182;
            width: 100%;
            
            align-items: center;
            padding: 20px;
        }

        .pesquisa-consultas input {
            width: 500px;
            height: 43px;
            color: #cdf2ff;
            padding: 0 15px;
            border-radius: 5px;
            border: none;
            color: #3C7182;
            background-color: lightcyan;
            font-size: 1rem;
        }


        .pesquisa-consultas input::placeholder {
            color: #3C7182;
        }

        .pesquisa-consultas label {
            color: lightcyan;
            margin-bottom: 20px ;
        }
        
        .input-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

    </style>
</head>
<body>
    <div class="consultas-container">
        <div class="paciente">
            <h2>Olá, {{ $usuario->nome }}!</h2>

            <div class="circulo-foto">
                <i class="icon" data-feather="user"></i>
            </div>
        </div>

        <div class="menu">
            <div class="menu-consultas" >
                <a href="{{ route('site.novousuario') }}">Cadastros</a>
            </div>
        
            <div class="menu-consultas">
                <p>Exames</p>
            </div>
        
            <div class="menu-consultas">
                <p>Alimentação</p>
            </div>
        
            <div class="menu-consultas">
                <p>Treinamento</p>
            </div>
        
            <div class="menu-consultas" id="menu">
                <p>Perfil</p>
            </div>
        </div>
        

        <div class="pesquisa-consultas">
            <div class="input-container">
                <form action="{{ route('site.perfil.editar') }}" method="post">

                    @csrf
                    <div style="position: relative;">
                    <p>Nome: </p>
                    <input value="{{ $usuario->nome }}"  name="nome" type="text" placeholder="Nome" class="{{ $errors->has('nome') ? 'input-error' : '' }}">
                        <div class="error-message">
                            {{$errors->has('nome') ? $errors->first('nome') : ''}}
                        </div>
                    </div>

                    <div style="position: relative;">
                    <p>Sobrenome:</p>
                        <input value="{{ $usuario->sobrenome }}" name="sobrenome" type="text" placeholder="Sobrenome" class="{{ $errors->has('sobrenome') ? 'input-error' : '' }}">
                        <div class="error-message">
                            {{$errors->has('sobrenome') ? $errors->first('sobrenome') : ''}}
                        </div>
                    </div>
                    
                    <div style="position: relative;">
                    <p>CPF: </p>
                        <input value="{{ $usuario->cpf }}" name="cpf" type="text" placeholder="CPF" class="{{ $errors->has('cpf') ? 'input-error' : '' }}">
                        <div class="error-message">
                            {{$errors->has('cpf') ? $errors->first('cpf') : ''}}
                        </div>
                    </div>

                    <div style="position: relative;">
                        <p>E-mail</p>
                        <input value="{{ $usuario->email }}" name="email" type="email" placeholder="E-mail" class="{{ $errors->has('email') ? 'input-error' : '' }}" >
                        <div class="error-message">
                            {{$errors->has('email') ? $errors->first('email') : ''}}
                        </div>
                    </div>

                    <div style="position: relative;">
                        <p>Senha: </p>
                        <input value="{{ $usuario->senha }}" id="senha" name="senha" type="password" placeholder="Senha" class="{{ $errors->has('senha') ? 'input-error' : '' }}">
                        <div class="error-message">
                            {{$errors->has('senha') ? $errors->first('senha') : ''}}
                        </div>
                    </div>

                    <div style="position: relative;">
                        <p>Confirmar Senha: </p>
                        <input id="senha_confirmation" name="senha_confirmation" type="password" placeholder="Confirme a senha" class="{{ $errors->has('confirmarsenha') ? 'input-error' : '' }}">
                        <div class="error-message">
                            {{$errors->has('senha_confirmation') ? $errors->first('senha_confirmation') : ''}}
                        </div>
                    </div>

                    <button type="submit">Atualizar</button>
                </form>

            </div>
            
        </div>
        
    
    
    </div>


    <script>
        feather.replace();

    </script>
</body>
</html>
