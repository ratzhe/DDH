<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Recuperar Senha</title>

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
   
        }

        html, body {
            height: 100%;
            margin: 0;
            background-color: rgb(237, 253, 253);
        }

        .login-container {
            width: 50%;
            height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto; 
            position: relative; 
            top: 50%; 
            transform: translateY(-50%); 
        }

        .boas-vindas {
            background: #3C7182;
            width: 40%;
            height: 450px;
            color: lightcyan;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 10px 0 0 10px;
        }

        .boas-vindas img {
            height: 200px;
            width: 200px;
        }

        .boas-vindas h1, .boas-vindas h2 {
            margin: 10px;
        }

        .login {
            background: #cdf2ff;
            width: 60%;
            height: 450px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 0 10px 10px 0;
        }

        .login h2 {
            display: flex;
            justify-content: center;
            color: #3C7182;
        }

        .login input {
            width: 320px;
            height: 40px;
            color: cdf2ff;
            padding: 10px 40px 10px 15px; 
            margin: 10px auto;
            border-radius: 5px;
            border: none;
            background-color: #3C7182;
            position: relative;
        }

        .login input::placeholder {
            color: lightcyan;
        }

        .login .icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 13px; 
            color: lightcyan;
        }

        .login button {
            background-color: #3C7182;
            border: none;
            border-radius: 5px;
            width: 150px;
            height: 35px;
            color: lightcyan;
            text-align: center;
            margin: 20px auto;
            font-size: 1rem;
            font-weight: bold;
        }

        .login button:hover {
            cursor: pointer;
            background: #5eb4d1;
            color: #3C7182;
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

    </style>
</head>
<body>
    <div class="login-container">
        <div class="boas-vindas">
            <h1>DDH</h1>

            <img src="{{ asset('img/logo.png') }}"  alt="DDH">
            
        </div>

        <div class="login">

            <form action="{{ route('site.recuperarsenha') }}" method="post">
                @csrf
                <h2>Recuperar Senha</h2>

                <div style="position: relative;">
                    <input type="text" placeholder="E-mail" name="email" required autofocus value="{{old('email')}}">
                    <div class="error-message">
                        {{$errors->has('email') ? $errors->first('email') : ''}}
                    </div>
                    <i class="icon" data-feather="user"></i>
                </div>

                <a href="#"><button>Enviar E-mail</button></a>
            </form> 
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
