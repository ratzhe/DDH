
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Editar - Médico</title>

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

        button {
            width: 200px;
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
        .input-container input {
            margin-bottom: 10px;
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
                <form method="post" action="{{ route('site.agenda.adicionar') }}">
                <input type="hidden" name="id" value="{{ $agenda->id ?? ''}}">
                
                    @csrf
                <div>
                    <label>Dia da Semana</label>
                    <input type="radio" id="segunda" name="dia" value="segunda">
                    <label for="dia_segunda">Segunda-Feira</label>

                    <input type="radio" id="terca" name="dia" value="terca">
                    <label for="dia_tercao">Terça-Feira</label>

                    <input type="radio" id="quarta" name="dia" value="quarta">
                    <label for="dia_quarta">Quarta-Feira</label>

                    <input type="radio" id="quinta" name="dia" value="quinta">
                    <label for="dia_quinta">Quinta-Feira</label>

                    <input type="radio" id="sexta" name="dia" value="sexta">
                    <label for="dia_sexta">Sexta-Feira</label>
                </div>

                <div>
                    <label>Horário de Início</label>
                    <select name="hora_inicio" id="hora_inicio">
                        <option value="08:00:00">08:00:00</option>
                        <option value="09:00:00">09:00:00</option>
                        <option value="10:00:00">10:00:00</option>
                        <option value="11:00:00">11:00:00</option>
                        <option value="12:00:00">12:00:00</option>
                        <option value="13:00:00">13:00:00</option>
                        <option value="14:00:00">14:00:00</option>
                        <option value="15:00:00">15:00:00</option>
                        <option value="16:00:00">16:00:00</option>
                    </select>
                </div>      

                <div>
                    <label>Horário de Fim</label>
                    <select name="hora_fim" id="hora_fim">
                        <option value="09:00:00">09:00:00</option>
                        <option value="10:00:00">10:00:00</option>
                        <option value="11:00:00">11:00:00</option>
                        <option value="12:00:00">12:00:00</option>
                        <option value="13:00:00">13:00:00</option>
                        <option value="14:00:00">14:00:00</option>
                        <option value="15:00:00">15:00:00</option>
                        <option value="16:00:00">16:00:00</option>
                        <option value="17:00:00">17:00:00</option>
                    </select>
                </div>   


                <div class="select-container">
                <select name="profissional_id" id="profissional_id">
                        <option value="" selected disabled>Selecione uma opção</option>
                        
                        <option>
                            @foreach ($profissionais as $profisional)                                
                                <option value="{{$profisional->id}}">{{$profisional->nome}} {{$profisional->sobrenome}}  ({{$profisional->profissional}}) </option>
                            @endforeach
                        <option>
                        
                </select>
                </div>

                <div class="botoes-container">
                    <button class="botao">Cadastrar Agenda</button>
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