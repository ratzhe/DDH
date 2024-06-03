<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Listar - Plano de Treinamento</title>

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
            color: lightcyan;
        }

        .menu {
            display: flex;
            flex-wrap: wrap; 
            width: 100%;
            height: 30px;
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
            cursor: pointer;
        }

        .menu-cadastros:hover {
            color: lightcyan;
            background-color: #3C7182;
        }

        .menu a {
            text-decoration: none;
            color: #3C7182;
        }

        .menu a:hover {
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

        .pesquisa-consultas h2 {
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

        .icon-action {
            cursor: pointer;
            color: #3C7182;
        }

        .icon-action:hover {
            color: #F44336; 
        }

        .meal-options {
            text-align: left;
            padding-left: 10px;
        }
    
        @media screen and (max-width: 768px) {
            th, td {
                padding: 10px;
            }

            .menu-cadastros {
                width: 100%;
                margin-bottom: 10px;
            }

            .paciente h2, .circulo-foto {
                margin: 0 auto;
                display: block;
                text-align: center;
            }

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
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Paciente</th>
                            <th>Treino I</th>
                            <th>Treino II</th>
                            <th>Treino III</th>
                            <th>Treino IV</th>
                            <th>Treino V</th>
                            <th>Treino VI</th>
                            <th>Editar</th>        
                            <th>Excluir</th>                   
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($treinos as $treino)
                            <tr>
                                <td>{{$treino->id}}</td>
                                <td>{{$treino->paciente->nome}} {{$treino->paciente->sobrenome}}</td>
                                <td class="meal-options">
                                    <span style="font-weight: bold;">Treino:  </span>
                                    {{$treino->treino_1}}<br><br>
                                    <span style="font-weight: bold;">Repetições: </span>
                                    {{$treino->rep_1}}<br><br>
                                    <span style="font-weight: bold;">Séries: </span>
                                    {{$treino->serie_1}}
                                </td>
                                <td class="meal-options">
                                    <span style="font-weight: bold;">Treino:  </span>
                                    {{$treino->treino_2}}<br><br>
                                    <span style="font-weight: bold;">Repetições: </span>
                                    {{$treino->rep_2}}<br><br>
                                    <span style="font-weight: bold;">Séries: </span>
                                    {{$treino->serie_2}}
                                </td>
                               <td class="meal-options">
                                    <span style="font-weight: bold;">Treino:  </span>
                                    {{$treino->treino_3}}<br><br>
                                    <span style="font-weight: bold;">Repetições: </span>
                                    {{$treino->rep_3}}<br><br>
                                    <span style="font-weight: bold;">Séries: </span>
                                    {{$treino->serie_3}}
                                </td>
                                <td class="meal-options">
                                    <span style="font-weight: bold;">Treino:  </span>
                                    {{$treino->treino_4}}<br><br>
                                    <span style="font-weight: bold;">Repetições: </span>
                                    {{$treino->rep_4}}<br><br>
                                    <span style="font-weight: bold;">Séries: </span>
                                    {{$treino->serie_4}}
                                </td>
                                <td class="meal-options">
                                    <span style="font-weight: bold;">Treino:  </span>
                                    {{$treino->treino_5}}<br><br>
                                    <span style="font-weight: bold;">Repetições: </span>
                                    {{$treino->rep_5}}<br><br>
                                    <span style="font-weight: bold;">Séries: </span>
                                    {{$treino->serie_5}}
                                </td>
                                <td class="meal-options">
                                    <span style="font-weight: bold;">Treino:  </span>
                                    {{$treino->treino_6}}<br><br>
                                    <span style="font-weight: bold;">Repetições: </span>
                                    {{$treino->rep_6}}<br><br>
                                    <span style="font-weight: bold;">Séries: </span>
                                    {{$treino->serie_6}}
                                </td>
                                <td><a href="{{ route('site.treino.editar', $treino->id) }}"><i class="icon icon-action" data-feather="edit-2"></i></a></td>
                                <td><a href="{{ route('site.treino.excluir', $treino->id) }}"><i class="icon icon-action" data-feather="trash"></i></a></td>
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
