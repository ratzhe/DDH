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
            <form method="post" action="{{ route('site.protocolo.adicionar') }}">
                @csrf
                
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

                <div>
                    <h2>Especilidade</h2>
                    <select name="especialidade" id="especialidade">
                        <option value="" selected disabled>Selecione a especialidade: </option>
                        <option value="anestesiologia">Anestesiologia</option>
                        <option value="cardiologia">Cardiologia</option>
                        <option value="clinica">Clinica Médica</option>
                        <option value="dermatologia">Dermatologia</option>
                        <option value="endocrionolia">Endocrionolia</option>
                        <option value="gastroenterologia">Gastroenterologia</option>
                        <option value="geriatria">Geriatria</option>
                        <option value="ginecologia">Ginecologia e Obstetrícia</option>
                        <option value="hematologia">Hematologia</option>
                        <option value="infectologia">Infectologia</option>
                        <option value="nefrologia">Nefrologia</option>
                        <option value="neurologia">Neurologia</option>
                        <option value="oftalmologia">Oftalmologia</option>
                        <option value="oncologia">Oncologia</option>
                        <option value="ortopedia">Ortopedia e Traumatologia</option>
                        <option value="otorrinolaringologia">Otorrinolaringologia</option>
                        <option value="patologia">Patologia</option>
                        <option value="pedriatria">Pedriatria</option>
                        <option value="pneumologia">Pneumologia</option>
                        <option value="psiquiatria">Psiquiatria</option>
                        <option value="reumatologia">Reumatologia</option>
                        <option value="urologia">Urologia</option>
                        <option value="nutricao">Nutrição</option>
                        <option value="avalicaoFisica">Avaliação Física</option>
                    </select>
                </div>   
                @error('especialidade')
                        <div class="error-message">{{ $message }}</div>
                @enderror   

                <div class="botoes-container">
                    <button class="botao">Cadastrar Protocolo</button>
                </div>
            </form>
            </div>
            
        </div>
    
    </div>

</body>
</html>