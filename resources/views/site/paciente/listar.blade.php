<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Listar - Paciente</title>

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

        a {
            text-decoration: none;
            color: #3C7182;
        }

        .pesquisa-consultas {
            background-color: #3C7182;
            width: 100%;
            align-items: center;
            padding: 20px;
            flex-grow: 1;
        }

        .pesquisa-consultas h2{
            color: lightcyan;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse; 
            margin-bottom: 20px;
        }

        th, td {
            padding: 15px; 
            text-align: center; 
            background-color: lightcyan; 
            color: #3C7182; 
            border: 1px solid #ddd;
        }

        th {
            background-color: #3C7182; 
            color: lightcyan;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .icon {
            height: 20px;
            width: 20px;
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
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                @if (session('success'))
                    <div style="background-color: green; color: white; padding: 20px; margin-bottom: 10px; text-align:center; border-radius: 5px">
                        {{ session('success') }}
                    </div>
                @endif
                <h2>Pacientes Cadastrados</h2>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Matrícula</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th>Gênero</th>
                            <th>Data de Nascimento</th>
                            <th>CEP</th>
                            <th>Telefone</th>
                            <th>E-mail</th>  
                            <th>Editar</th>  
                            <th>Excluir</th>                    
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pacientes as $paciente)
                            <tr>
                                <td>{{$paciente->id}}</td>
                                <td>{{$paciente->nome}}</td>
                                <td>{{$paciente->sobrenome}}</td>
                                <td>{{$paciente->rg}}</td>
                                <td>{{$paciente->cpf}}</td>
                                <td>{{$paciente->genero}}</td>
                                <td>{{$paciente->datanasc}}</td>
                                <td>{{$paciente->cep}}</td>
                                <td>{{$paciente->telefone}}</td>
                                <td>{{$paciente->email}}</td>
                                
                                <td><a href="{{ route('site.paciente.editar', $paciente->id) }}"><i id="editar" class="icon" data-feather="edit-2"></i></a></td>
                                <td><a href="{{ route('site.paciente.excluir', $paciente->id) }}"><i id="excluir" class="icon" data-feather="trash"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>       
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
