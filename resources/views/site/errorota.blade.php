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
                background-color: rgb(237, 253, 253);
            }

            .login-container {
                width: 50%;
                height: 600px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: auto; 
                position: relative; 
                top: 50%; 
                transform: translateY(-50%); 
            }

            .boas-vindas {
                background: #cdf2ff;
                width: 40%;
                height: 550px;
                color: #3C7182;
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

            .boas-vindas h1, h2 {
                margin: 10px;
            }

            .login {
                background: #3C7182;;
                width: 60%;
                height: 550px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                border-radius: 0 10px 10px 0;
            }

            .login h2 {
                display: flex;
                justify-content: center;
                color: lightcyan;
            }

            .login input {
                width: 320px;
                height: 40px;
                color: #3C7182;;
                padding: 10px 40px 10px 15px; 
                margin: 5px auto;
                border-radius: 5px;
                border: none;
                background-color: #cdf2ff;
                position: relative;
            }

            .login input::placeholder {
                color: #3C7182;;
            }

            .login .icon {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                right: 13px; 
                color: #3C7182;;
            }

            .login button {
                background-color: #cdf2ff;
                border: none;
                border-radius: 5px;
                width: 120px;
                height: 35px;
                color: #3C7182;;
                text-align: center;
                margin: 20px auto;
                font-size: 1rem;
                font-weight: bold;
            }

            .login button:hover {
                cursor: pointer;
                background: lightcyan;

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
        Você precisa efetuar login para acessar essa página!
        <br>
        <br>
        
        <a href="{{ route('site.login') }}">Login</button>
    </div>

    
</body>
</html>


