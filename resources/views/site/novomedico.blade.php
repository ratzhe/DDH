<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Cadastro - Médico</title>

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

        .menu #menu {
            color: lightcyan;
            background-color: #3C7182;   
        }

        .menu-cadastros {
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

        .menu-cadastros:hover {
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

        .pesquisa-consultas h2{
            color: lightcyan;
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
            margin-bottom: 20px;
        }
        
        .input-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-container input {
            margin-bottom: 10px; 
        }

        .botoes-container {
            display: flex;
            justify-content: center; 
        }

        .botao {
            width: 400px;
            height: 50px;
            margin-right: 20px; 
            background-color: lightcyan;
            color: #3C7182;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon input {
            padding-right: 20px; 
        }

        .input-with-icon .icon {
            position: absolute;
            top: 50%;
            right: 10px; 
            transform: translateY(-50%);
            color: #3C7182;
            pointer-events: none; 
        }

        .input-container input[type="radio"] {
            margin-right: 5px;
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
    <div class="consultas-container">
        <div class="paciente">
            <h2>DDH</h2>

            <div class="circulo-foto">
                <i class="icon" data-feather="user"></i>
            </div>
        </div>

        <div class="menu">
            <div class="menu-cadastros" id="menu">
                <p>Cadastros</p>
            </div>
            <div class="menu-cadastros">
                <p>Exames</p>
            </div>
            <div class="menu-cadastros">
                <p>Alimentação</p>
            </div>
            <div class="menu-cadastros">
                <p>Treinamento</p>
            </div>
            <div class="menu-cadastros">
                <p>Perfil</p>
            </div>
        </div>
        

        <div class="pesquisa-consultas">
            <div class="input-container">
                
                    <h2>Novo Usuário - Médico</h2>
                    @csrf         
                    <div style="position: relative;">
                        <label for="nome">Nome: </label><br>
                        <div class="input-with-icon">
                            <input value="{{ old('nome')}}" name="nome" type="text" placeholder="" class="{{ $errors->has('nome') ? 'input-error' : '' }}">

                            <div class="error-message">
                                {{$errors->has('nome') ? $errors->first('nome') : ''}}
                            </div>

                            <i class="icon" data-feather="edit-2"></i>
                        </div>
                    </div>

                    <div style="position: relative;">
                        <label for="nome">Sobrenome: </label><br>
                        <div class="input-with-icon">
                            <input value="{{ old('sobrenome')}}" name="sobrenome" type="text" placeholder="" class="{{ $errors->has('sobrenome') ? 'input-error' : '' }}">

                            <div class="error-message">
                                {{$errors->has('sobrenome') ? $errors->first('sobrenome') : ''}}
                            </div>

                            <i class="icon" data-feather="edit-2"></i>
                        </div>
                    </div>

                    <div style="position: relative;">
                        <label for="crm">CRM: </label><br>
                        <div class="input-with-icon">
                            <input value="{{ old('crm')}}" name="crm" type="text" placeholder="" class="{{ $errors->has('crm') ? 'input-error' : '' }}">

                            <div class="error-message">
                                {{$errors->has('crm') ? $errors->first('crm') : ''}}
                            </div>

                            <i class="icon" data-feather="edit-2"></i>
                        </div>
                    </div>
                    
                    <div style="position: relative;">
                        <label for="cpf">CPF: </label><br>
                        <div class="input-with-icon">
                            <input value="{{ old('cpf')}}" name="cpf" type="text" placeholder="" class="{{ $errors->has('cpf') ? 'input-error' : '' }}">

                            <div class="error-message">
                                {{$errors->has('cpf') ? $errors->first('cpf') : ''}}
                            </div>

                            <i class="icon" data-feather="edit-2"></i>
                        </div>
                    </div>

                    <div style="position: relative;">
                        <label for="datanasc">Data de Nascimento:  </label><br>
                        <div class="input-with-icon">
                            <input value="{{ old('datanasc')}}" name="datanasc" type="text" placeholder="" class="{{ $errors->has('datanasc') ? 'input-error' : '' }}">

                            <div class="error-message">
                                {{$errors->has('cpf') ? $errors->first('datanasc') : ''}}
                            </div>

                            <i class="icon" data-feather="edit-2"></i>
                        </div>
                    </div>

                    <div style="position: relative;">
                        <label for="genero" >Gênero: </label><br>
                        <div class="input-with-icon">
                            <input value="{{ old('genero')}}" type="radio" id="genero_masculino" name="genero" value="masculino" class="{{ $errors->has('datanasc') ? 'input-error' : '' }}">
                            <label for="genero_masculino">Masculino</label>
                            <input  value="{{ old('genero')}}" type="radio" id="genero_feminino" name="genero" value="feminino" class="{{ $errors->has('datanasc') ? 'input-error' : '' }}">
                            <label for="genero_feminino">Feminino</label>
                        </div>
                    </div>


                    <div>
                        <label for="cep">CEP: </label><br>
                        <div class="input-with-icon">
                            <input name="cep" type="text" placeholder="">
                            <i class="icon" data-feather="edit-2"></i>
                        </div>
                    </div>

                    <div>
                        <label for="telefone">Telefone: </label><br>
                        <div class="input-with-icon">
                            <input name="telefone" type="text" placeholder="">
                            <i class="icon" data-feather="edit-2"></i>
                        </div>
                    </div>

                    <div>
                        <label for="email">E-mail: </label><br>
                        <div class="input-with-icon">
                            <input name="email" type="email" placeholder="">
                            <i class="icon" data-feather="edit-2"></i>
                        </div>
                    </div>

                    <div>
                        <label for="senha">Senha: </label><br>
                        <div class="input-with-icon">
                            <input name="senha" type="password" placeholder="">
                            <i class="icon" data-feather="edit-2"></i>
                        </div>
                    </div>

                     <div>
                        <label for="senha_confirmation">Confirmar Senha: </label><br>
                        <div class="input-with-icon">
                            <input name="senha_confirmation" type="password" placeholder="">
                            <i class="icon" data-feather="edit-2"></i>
                        </div>
                    </div>

                    <div class="botoes-container">
                        <button class="botao" type="submit">Cadastrar</button>
                    </div>
            </div>       
        </div>
    
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
