<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Novos Usuários</title>

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
            margin: 0;
        }

        body {
            height: 100%;
        }

        .consultas-container {
            display: flex;
            flex-direction: column; 
            min-height: 100%;
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

        .usuarios {
            background-color: #3C7182;
            width: 100%;
            align-items: center;
            padding: 20px;
        }

        .usuarios input {
            width: 600px;
            height: 40px;
            color: #cdf2ff;
            padding: 0 15px;
            margin-top: 70px;
            border-radius: 5px;
            border: none;
            color: #3C7182;
            background-color: lightcyan;
            font-size: 1rem;
            display: flex;
            justify-content: center; 
            flex-direction: column; 
            position: relative;
        }

        .usuarios input + .icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 13px; 
            color: lightcyan;
        }

        .usuarios input::placeholder {
            color: #3C7182;
        }

        .usuarios label {
            color: lightcyan;
            margin-bottom: 20px ;
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

        .botao:hover {
            cursor: pointer;
            background: #5eb4d1;
            color: lightcyan;
        }

        .titulo {
            background-color: #3C7182;
            color: lightcyan;
            font-size: 1.5rem;
            padding: 25px;
        }

        .input-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 20px; 
        }

        .input-wrapper input {
            width: 70%; 
        }


    </style>
</head>
<body>
    <div class="consultas-container">
        <div class="paciente">
            <h2>Olá, Paciente!</h2>
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

        <div class="conteudo">
            <h3 class="titulo">Novos Usuários</h3>

            <div class="usuarios">
                <div class="botoes-container">
                    <button class="botao">Médico</button>
                    <button class="botao">Nutricionista</button>
                    <button class="botao">Educador Físico</button>
                </div>

                <div class="input-wrapper">
                    <input type="text" placeholder="Pesquisar usuário">
                </div>
            </div>
        </div>
    </div>  

    <script>
        feather.replace();
    </script>
</body>
</html>

        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
