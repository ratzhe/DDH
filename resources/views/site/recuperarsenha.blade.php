<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 90%;
            max-width: 800px;
            display: flex;
            flex-direction: row;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .boas-vindas {
            background: #3C7182;
            width: 40%;
            padding: 50px;
            color: lightcyan;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .boas-vindas img {
            max-width: 150%;
            height: auto;
        }

        .boas-vindas h1 {
            margin: 20px 0;
            font-size: 2.5rem;
        }

        .login {
            background: #cdf2ff;
            width: 70%;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .login h2 {
            color: #3C7182;
            margin-bottom: 20%;
            font-size: 1.8rem;
            margin-left: -3%;
        }

        .login input {
            width: 150%;
            max-width: 320px;
            height: 45px;
            color: lightcyan;
            padding: 10px 15px;
            margin-bottom: 15px;
            margin-left: -20%;
            border-radius: 5px;
            border: none;
            background-color: #3C7182;
            font-size: 1rem;
            position: relative;
        }

        textarea:focus, input:focus, select:focus {
            box-shadow: 0 0 0 0;
            border: 0 none;
            outline: 0;
        } 

        .login input::placeholder {
            color: lightcyan;
        }

        .login .icon {
          position: absolute;
          top: 50%;
          transform: translateY(-70%);
          right: -5%;
          color: lightcyan;
        }

        .login button {
            background-color: #3C7182;
            border: none;
            border-radius: 5px;
            width: 160px;
            height: 45px;
            color: lightcyan;
            text-align: center;
            font-size: 1.1rem;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
            margin-top: 20px;
            margin-left: 15%;
        }

        .login button:hover {
            cursor: pointer;
        }

        .error-message {
            color: red; 
            font-size: 0.8rem; 
            margin-top: -10px;
            margin-bottom: 10px;
        }

        .input-error {
            border: solid 1px red !important; 
            background-color: #ffe9e9 !important;
        }

        @media (max-width: 768px) {
          .login-container {
            flex-direction: column;
            height: auto;
            top: 10%;
            transform: translateY(0);
          }

          .boas-vindas, .login {
            width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
            padding: 20px;
          }

            .boas-vindas h1 {
                font-size: 2rem;
            }

            .login h2 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .login input {
                width: 100%;
                font-size: 0.9rem;
            }

            .login button {
                width: 100%;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="boas-vindas">
            <h1>DDH</h1>
            <img src="logo.png" alt="DDH Logo">
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
                <button type="submit">Enviar E-mail</button>
            </form> 
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
