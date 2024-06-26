<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Agenda</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
            margin: 0;
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

        .menu a {
            text-decoration: none;
        }

        .pesquisa-consultas {
            background-color: #3C7182;
            width: 100%;
            align-items: center;
            padding: 20px;
            flex-grow: 1;
        }

        .dia-semana-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); 
            grid-gap: 10px; 
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

        .plano input{
            width: 470px;
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
            <div class="menu-consultas" id="menu">
                <p>Alimentação</p>
            </div>
            <div class="menu-consultas">
                <p>Treinamento</p>
            </div>
            <div class="menu-consultas">
                <a href="{{ route('site.perfil') }}">Perfil</a>
            </div>
        </div>

        <div class="pesquisa-consultas">
            <div class="input-container">
                <form method="post" action="{{ route('site.alimentacao.adicionar') }}">
                    @csrf
                    <h1>Plano Alimentar</h1><br><br>
                    <h3>Paciente</h3>
                    <div class="select-container">
                        <select name="paciente_id" id="paciente_id">
                            <option value="" selected disabled>Selecione o paciente: </option>
                            @foreach ($pacientes as $paciente)
                                <option value="{{ $paciente->id }}">{{ $paciente->nome }} {{ $paciente->sobrenome }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('paciente_id'))
                            <span class="error-message">{{ $errors->first('paciente_id') }}</span>
                        @endif
                    </div>
                    
                    <div class="plano">
                        <h3>Café da Manhã</h3>
                        <input name="cafe_1" type="text" placeholder="Opção I">
                        @error('cafe_1')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <input name="cafe_2" type="text" placeholder="Opção II">
                        @error('cafe_2')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <input name="cafe_3" type="text" placeholder="Opção III">
                        @error('cafe_3')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="plano">
                        <h3>Lanche da Manhã</h3>
                        <input name="lanche_m_1" type="text" placeholder="Opção I">
                        @error('lanche_m_1')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <input name="lanche_m_2" type="text" placeholder="Opção II">
                        @error('lanche_m_2')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <input name="lanche_m_3" type="text" placeholder="Opção III">
                        @error('lanche_m_3')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>                

                    <div class="plano">
                        <h3>Almoço</h3>
                        <input name="almoco_1" type="text" placeholder="Opção I">
                        @error('almoco_1')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <input name="almoco_2" type="text" placeholder="Opção II">
                        @error('almoco_2')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <input name="almoco_3" type="text" placeholder="Opção III">
                        @error('almoco_3')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>      

                    <div class="plano">
                        <h3>Lanche da Tarde</h3>
                        <input name="lanche_1" type="text" placeholder="Opção I">
                        @error('lanche_1')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <input name="lanche_2" type="text" placeholder="Opção II">
                        @error('lanche_2')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <input name="lanche_3" type="text" placeholder="Opção III">
                        @error('lanche_3')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="plano">
                        <h3>Jantar</h3>
                        <input name="jantar_1" type="text" placeholder="Opção I">
                        @error('jantar_1')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <input name="jantar_2" type="text" placeholder="Opção II">
                        @error('jantar_2')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <input name="jantar_3" type="text" placeholder="Opção III">
                        @error('jantar_3')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="plano">
                        <h3>Ceia</h3>
                        <input name="ceia_1" type="text" placeholder="Opção I">
                        @error('ceia_1')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <input name="ceia_2" type="text" placeholder="Opção II">
                        @error('ceia_2')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <input name="ceia_3" type="text" placeholder="Opção III"><br><br><br>
                        @error('ceia_3')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="botoes-container">
                        <button type="submit">Adicionar Plano Alimentar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        feather.replace();
    </script>
</body>
</html>
