<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Cadastro</title>

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            margin: 0;
            background-color: #3C7182;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        img {
            height: 450px;
            width: 450px;
            display: block;
            margin: 0 auto;
        }

        .erro-container {
            text-align: center;
            margin-top: 20px; 
        }

        button {
            background-color: lightcyan;
            border: none;
            border-radius: 5px;
            width: 180px;
            height: 60px;
            color: #3C7182;
            text-align: center;
            margin: 20px auto;
            font-size: 1.4rem;
            font-weight: bold;
        }

        button:hover {
            cursor: pointer;
            background: #5eb4d1;
            color: lightcyan;
        }

        a {
            text-decoration: none;
            color: #3C7182;
        }

        h2 {
            color: lightcyan;
        }

    </style>
</head>
<body>

<img src="{{ asset('img/logo.png') }}" alt="Logo">

<div class="erro-container">

    <h2>Você precisa efetuar login para acessar essa página!</h2>
    
    <button><a href="{{ route('site.login') }}">Login</a></button>
</div>


</body>
</html>
