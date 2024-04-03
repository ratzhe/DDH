<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="../assets/logo.png" />
    <title>Perfil</title>

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

        .menu #menu {
            color: lightcyan;
            background-color: #3C7182;
            
        }

        .pesquisa-consultas {
            background-color: #3C7182;
            width: 100%;
            
            align-items: center;
            padding: 20px;
        }

        .pesquisa-consultas input {
            width: 500px;
            height: 40px;
            color: #cdf2ff;
            padding: 0 15px;
            margin-right: 600px;
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
            margin-bottom: 20px ;
        }
        .prontuario-consultas {
            background-color: #3C7182;
            display: flex;
        }

        .listar-consultas {
            flex: 1;
            padding: 10px;
        }

        .card {
            width: 685px;
            background-color: lightcyan;
            height: 150px;
            margin: 10px;
            border-radius: 5px;
            display: block;
            color: #3C7182;
            position: relative;
        }

        .card p {
            padding: 15px;
        }

        .card button {
            width: 90px;
            height: 30px;
            background-color: #3C7182;
            color: lightcyan;
            border: none;
            border-radius: 5px;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.1rem;
        }

        .card button:hover {
            cursor: pointer;
            background: #5eb4d1;
            color: #3C7182;
        }

        .card button:hover {
            cursor: pointer;
            background: #5eb4d1;
            color: #3C7182;
        }

        .calendario-consultas {
            background-color: #3C7182; 
            flex: 1; 
            padding: 0;
            margin-left: 120px;
        }

        .month {
            font-size: 1.5rem;
            color: lightcyan;
            margin-bottom: 10px;
        }

        .days-container {
            display: grid;
            grid-template-columns: repeat(7, 80px); 
            gap: 10px 15px; /
        }
        .day {
            position: relative; 
            background-color: lightcyan;
            width: 83px;
            height: 83px;
            border-radius: 2px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.9rem;
        }

        .day .number {
            color: #3C7182;
            position: absolute; 
            top: 5px;
            right: 5px; 
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
            <div class="menu-consultas" >
                <p>Consultas</p>
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
        
            <div class="menu-consultas" id="menu">
                <p>Perfil</p>
            </div>
        </div>
        

        <div class="pesquisa-consultas">
            <div>
                <label for="nome">Nome: </label><br>
                <input name="nome" type="text" placeholder=""><br><br>
                <i class="icon" data-feather="pen"></i>
            </div>
            
            <div>
                <label for="cpf">CPF: </label><br>
                <input name="cpf" type="text" placeholder=""><br><br>
                <i class="icon" data-feather="pen"></i>
            </div>

            <div>
                <label for="rg">RG: </label><br>
                <input name="rg" type="text" placeholder=""><br><br>
                <i class="icon" data-feather="pen"></i>
            </div>

            <div>
                <label for="email">E-Mail: </label><br>
                <input name="email" type="email" placeholder=""><br><br>
                <i class="icon" data-feather="pen"></i>
            </div>

            <div>
                <label for="telefone">Telefone: </label><br>
                <input name="telefone" type="text" placeholder=""><br><br>
                <i class="icon" data-feather="pen"></i>
            </div>

            <div>
                <label for="senha">Senha: </label><br>
                <input name="senha" type="password" placeholder=""><br><br>
                <i class="icon" data-feather="pen"></i>
            </div>
            
        </div>
        
    
    
    </div>


    <script>
        feather.replace();

        const daysInMonth = 31; 
        const daysContainer = document.querySelector('.days-container');

        for (let i = 1; i <= daysInMonth; i++) {
        const dayElement = document.createElement('div');
            dayElement.classList.add('day');
            const numberSpan = document.createElement('span'); 
            numberSpan.classList.add('number'); 
            numberSpan.textContent = i; 
            dayElement.appendChild(numberSpan); 
            daysContainer.appendChild(dayElement);
        }
    </script>
</body>
</html>
