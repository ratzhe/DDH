<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Adicionar - Profissional de Saúde</title>

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

        button {
            width: 200px;
            height: 50px;
            margin-right: 20px; 
            background-color: lightcyan;
            color: #3C7182;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            margin: 0 auto; 
            display: block; 
        }

        .radio-group {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(70px, 1fr)); 
            grid-gap: 1px; 
            margin-bottom: 5px;
             
        }

        .input-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-container label,
        .input-container input {
            display: block;
            margin-bottom: 10px;
        }

        .input-container input[type="radio"] {
            width: 20px; 
            height: 20px; 
        }

        label {
            color: lightcyan; 
        }

        .input-container input[type="text"], input[type="date"], input[type="email"], input[type="password"] {
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

        .error-message {
                color: red; 
                font-size: 0.8rem; 
                margin-top: 5px; 
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
                <a href="{{ route('site.novousuario') }}">Cadastros</a>
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
                <a href="{{ route('site.perfil') }}">Perfil</a>
            </div>
        </div>
        

        <div class="pesquisa-consultas">
            
           <div class="input-container">
                
                <form method="post" action="{{ route('site.profissional.adicionar') }}">
                    <input type="hidden" name="id" value="{{ $profissional->id ?? ''}}">
                    @csrf
                    <label>Nome: </label>
                    <input value="{{ $profissional->nome ?? old('nome') }}" name="nome" type="text" placeholder="Nome">
                    <div class="error-message">
                        {{ $errors->has('nome') ? $errors->first('nome') : ''}}
                    </div>

                    <label>Sobrenome:</label>
                    <input value="{{ $profissional->sobrenome ?? old('sobrenome') }}" name="sobrenome" type="text" placeholder="Sobrenome">
                     <div class="error-message">
                        {{ $errors->has('sobrenome') ? $errors->first('sobrenome') : ''}}
                    </div>

                    <label>Profissional</label>
                    <div class="radio-group">
                        <input type="radio" id="medico" name="profissional" value="medico">
                        <label for="medico">Médico</label>
                        <input type="radio" id="nutricionista" name="profissional" value="nutricionista">
                        <label for="nutricionista">Nutricionista</label>
                        <input type="radio" id="educador" name="profissional" value="educador">
                        <label for="educador">Educador Físico</label><br>
                    </div>
                    @error('profissional')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    
                    <label>Registro:</label>
                    <input value="{{ $profissional->registro ?? old('registro') }}" name="registro" type="text" placeholder="Registro Profissional (CRM ou CFN ou CREF)">
                    <div class="error-message">
                        {{ $errors->has('registro') ? $errors->first('registro') : ''}}
                    </div>
                    
                    <label>CPF: </label>
                    <input value="{{ $profissional->cpf ?? old('cpf') }}" name="cpf" type="text" placeholder="Apenas os números">
                     <div class="error-message">
                        {{ $errors->has('cpf') ? $errors->first('cpf') : ''}}
                    </div>

                    <label>Data de Nascimento: </label>
                    <input value="{{ $profissional->datanasc ?? old('datanasc') }}" name="datanasc" type="date" placeholder="">
                    @error('datanasc')
                        <div class="error-message">{{ $message }}</div>
                    @enderror

                    <label>Gênero</label>
                    <div class="radio-group">
                        
                        <input type="radio" id="genero_masculino" name="genero" value="masculino">
                        <label for="genero_masculino">Masculino</label>

                        <input type="radio" id="genero_feminino" name="genero" value="feminino">
                        <label for="genero_feminino">Feminino</label>

                    </div>
                    @error('genero')
                        <div class="error-message">{{ $message }}</div>
                    @enderror


                    <label>CEP:</label>
                    <input value="{{  $profissional->cep ?? old('cep') }}" name="cep" type="text" placeholder="CEP">
                     <div class="error-message">
                        {{ $errors->has('cep') ? $errors->first('cep') : ''}}
                    </div>

                    <label>Telefone:</label>
                    <input value="{{  $profissional->telefone ?? old('telefone') }}" name="telefone" type="text" placeholder="Telefone">
                     <div class="error-message">
                        {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}
                    </div>

                    <label>E-mail:</label>
                    <input value="{{  $profissional->email ?? old('email') }}" name="email" type="email" placeholder="E-mail">
                     <div class="error-message">
                        {{ $errors->has('email') ? $errors->first('email') : ''}}
                    </div>

                    <label>Senha: </label>
                    <input value="{{  $profissional->senha ?? old('senha') }}" name="senha" type="password" placeholder="Senha">
                     <div class="error-message">
                        {{ $errors->has('senha') ? $errors->first('senha') : ''}}
                    </div>

                    <label>Confirmar Senha: </label>
                    <input name="senha_confirmation" type="password" placeholder="Confirmar Senha">

                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
