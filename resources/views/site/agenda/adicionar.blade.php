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

        select {
            width: 400px; 
            height: 50px; 
            background-color: lightcyan;
            color: #3C7182;
            font-size: 1rem;
            padding: 10px;
            border-radius: 5px;
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
            <div class="menu-consultas"  id="menu">
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
        
            <div class="menu-consultas">
                <a href="{{ route('site.perfil') }}">Perfil</a>
            </div>
        </div>
        

        <div class="pesquisa-consultas">
            <div class="input-container">
            <form method="post" action="{{ route('site.agenda.adicionar') }}">
               
                @csrf
                <h2>Dia da Semana</h2>
                <div class="dia-semana-container">
                    <input type="radio" id="segunda" name="dia" value="segunda">
                    <label for="dia_segunda">Segunda-Feira</label>

                    <input type="radio" id="terca" name="dia" value="terca">
                    <label for="dia_terca">Terça-Feira</label>

                    <input type="radio" id="quarta" name="dia" value="quarta">
                    <label for="dia_quarta">Quarta-Feira</label>

                    <input type="radio" id="quinta" name="dia" value="quinta">
                    <label for="dia_quinta">Quinta-Feira</label>

                    <input type="radio" id="sexta" name="dia" value="sexta">
                    <label for="dia_sexta">Sexta-Feira</label>
                </div>
                @error('dia')
                        <div class="error-message">{{ $message }}</div>
                @enderror

                <div>
                    <h2>Horário de Início</h2>
                    <select name="hora_inicio" id="hora_inicio">
                        <option value="" selected disabled>Selecione o horário de início do atendimento: </option>
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
                @error('hora_inicio')
                        <div class="error-message">{{ $message }}</div>
                @enderror   

                <div>
                    <h2>Horário de Fim</h2>
                    <select name="hora_fim" id="hora_fim">
                        <option value="" selected disabled>Selecione o horário de término do atendimento: </option>
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
                @error('hora_fim')
                    <div class="error-message">{{ $message }}</div>
                @enderror

                <h2>Profissional</h2>
                <div class="select-container">
                    <select name="profissional_id" id="profissional_id">
                            <option value="" selected disabled>Selecione o profissional: </option>

                            <option>
                                @foreach ($profissionais as $profisional)                                
                                    <option value="{{$profisional->id}}">{{$profisional->nome}} {{$profisional->sobrenome}}  ({{$profisional->profissional}}) </option>
                                @endforeach
                        <option>
                    </select>
                </div>
                @error('profissional_id')
                        <div class="error-message">{{ $message }}</div>
                @enderror

                <div class="botoes-container">
                    <button class="botao">Cadastrar Protocolo</button>
                </div>
            </form>
            </div>
            
        </div>
    
    </div>


    <script>
        document.getElementById('hora_inicio').addEventListener('change', function() {
            var selectFim = document.getElementById('hora_fim');
            selectFim.innerHTML = '';

            var horaInicio = this.value;

            var opcoesFim = [
                '09:00:00',
                '10:00:00',
                '11:00:00',
                '12:00:00',
                '13:00:00',
                '14:00:00',
                '15:00:00',
                '16:00:00',
                '17:00:00'
            ];

            var opcoesFiltradas = opcoesFim.filter(function(opcao) {
                return opcao > horaInicio;
            });

            opcoesFiltradas.forEach(function(opcao) {
                var option = document.createElement('option');
                option.text = opcao;
                option.value = opcao;
                selectFim.add(option);
            });
        });
        feather.replace();
    </script>
</body>
</html>