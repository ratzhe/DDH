<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Treinamentos</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .consultas-container {
            display: flex;
            flex-direction: column; 
            min-height: 100vh;
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
            color: lightcyan;
            background-color: #3C7182;
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

        .pesquisa-consultas {
            background-color: #3C7182;
            width: 100%;
            align-items: center;
            padding: 20px;
            flex-grow: 1;
        }

        .dia-semana-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 50px;
        }

        h2 {
            margin: 20px;
            color: lightcyan;
        }

        input[type="radio"] {
            transform: scale(1.4); 
        }

        label {
            color: lightcyan;
            font-size: 1.2rem;
        }

        .botoes-container {
            display: flex;
            justify-content: center; 
        }

        button {
            width: 400px;
            height: 50px;
            margin-right: 20px; 
            background-color: lightcyan;
            color: #3C7182;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
        }

        select {
            width: 1460px; 
            height: 50px; 
            background-color: lightcyan;
            color: #3C7182;
            font-size: 1rem;
            padding: 10px;
            border-radius: 5px;
            margin: 10px;
        }

        .menu a {
            color: lightcyan;
        }

        .menu a #menu{
            text-decoration: none;
            color: #3C7182;
        } 
        .menu a:hover {
            color: lightcyan;
        }

        .error-message {
            color: red; 
            font-size: 0.8rem; 
            margin-top: 5px; 
        }

        .menu a {
            color: #3C7182;
            background-color: lightcyan;
        }

        h1, h2, h3 {
            color: lightcyan;
            margin: 0 10px;
        }

        .plano {
            width: calc(33.33% - 20px);
            padding: 10px;
            box-sizing: border-box;
        }

        .plano input {
            width: 100%;
            height: 100px;
            background-color: lightcyan;
            border-radius: 5px;
            border: none;
            padding: 20px;
            margin: 10px;
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
            <div class="menu-consultas">
                <a href="{{ route('site.novousuario') }}">Cadastros</a>
            </div>
            <div class="menu-consultas">
                <p>Exames</p>
            </div>
            <div class="menu-consultas">
                <p>Alimentação</p>
            </div>
            <div class="menu-consultas" id="menu">
                <p>Treinamento</p>
            </div>
            <div class="menu-consultas">
                <a href="{{ route('site.perfil') }}">Perfil</a>
            </div>
        </div>

        <div class="pesquisa-consultas">
            <div class="input-container">
                <form method="post" action="{{ route('site.treino.adicionar') }}">
                    @csrf
                    <h1>Plano de Treinamento</h1><br><br>
                    <h3>Paciente</h3>
                    <div class="select-container">
                        <select name="paciente_id" id="paciente_id">
                            <option value="" selected disabled>Selecione o paciente:</option>
                            @foreach ($pacientes as $paciente)
    <option value="{{ $paciente->id }}">{{ $paciente->nome }} {{ $paciente->sobrenome }}</option>
@endforeach
</select>
@if ($errors->has('paciente_id'))
    <span class="error-message">{{ $errors->first('paciente_id') }}</span>
@endif
</div>

<div class="dia-semana-container">
    <div class="plano">
        <h3>Treino Dia 1</h3>
        <input name="treino_1" type="text" placeholder="Opção I">
        @error('treino_1')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </div>

    <div class="plano">
        <h3>Treino Dia 2</h3>
        <input name="treino_2" type="text" placeholder="Opção II">
        @error('treino_2')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </div>

    <div class="plano">
        <h3>Treino Dia 3</h3>
        <input name="treino_3" type="text" placeholder="Opção III">
        @error('treino_3')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </div>

    <div class="plano">
        <h3>Treino Dia 4</h3>
        <input name="treino_4" type="text" placeholder="Opção IV">
        @error('treino_4')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </div>

    <div class="plano">
        <h3>Treino Dia 5</h3>
        <input name="treino_5" type="text" placeholder="Opção V">
        @error('treino_5')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </div>

    <div class="plano">
        <h3>Treino Dia 6</h3>
        <input name="treino_6" type="text" placeholder="Opção VI">
        @error('treino_6')
            <div class="error-message">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="botoes-container">
    <button type="submit">Adicionar Plano de Treinamento</button>
</div>
</form>
</div>
</div>
<script>
    feather.replace();
</script>
</body>
</html>

                            