<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Listar - Plano Alimentar</title>

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
            border-collapse: separate; 
            border-spacing: 0;
        }

        th, td {
            padding: 10px; 
            text-align: center; 
            background-color: lightcyan; 
            color: #3C7182; 
            border: none;
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
                    <div style="background-color: green; color: white; padding: 10px; margin-bottom: 10px; text-align:center; border-radius: 5px">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div style="background-color: red; color: white; padding: 20px; margin-bottom: 10px; text-align:center; border-radius: 5px">
                        {{ session('error') }}
                    </div>
                @endif
                <h2>Plano Cadastrado</h2>
                <table border="1" width: 100%>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Paciente</th>
                            <th>Café da manhã I</th>
                            <th>Lanche da Manhã I</th>
                            <th>Almoço I</th>         
                            <th>Lanche da Tarde I</th>  
                            <th>Jantar I</th>  
                            <th>Ceia I</th>       
                            <th>Editar</th>        
                            <th>Excluir</th>                   
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($alimentacoes as $alimentacao)
                            <tr>
                                <td>{{$alimentacao->id}}</td>
                                <td>{{$alimentacao->paciente->nome}} {{$alimentacao->paciente->sobrenome}}</td>
                                <td>{{$alimentacao->cafe_1}}</td>
                                <td>{{$alimentacao->lanche_m_1}}</td>
                                <td>{{$alimentacao->almoco_1}}</td>
                                <td>{{$alimentacao->lanche_1}}</td>
                                <td>{{$alimentacao->jantar_1}}</td>
                                <td>{{$alimentacao->ceia_1}}</td>
                                
                                
                                <td><a href="{{ route('site.alimentacao.editar', $alimentacao->id) }}"><i id="editar" class="icon" data-feather="edit-2"></i></a></td>
                                <td><a href="{{ route('site.alimentacao.excluir', $alimentacao->id) }}"><i id="excluir" class="icon" data-feather="trash"></i></a></td>
                        
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
