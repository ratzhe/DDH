<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://unpkg.com/feather-icons"></script>
      <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
      <title>Login</title>

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
        width: 80%;
        max-width: 1000px;
        height: 450px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        flex-direction: row;
      }

      .boas-vindas {
        background: #3C7182;
        width: 40%;
        height: 100%;
        color: lightcyan;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 10px 0 0 10px;
        padding: 20px;
      }

      .boas-vindas img {
        height: 150px;
        width: 150px;
        margin: 20px 0;
      }

      .boas-vindas h1, .boas-vindas h2 {
        margin: 10px;
      }

      .boas-vindas a {
        font-size: 1.1rem;
        color: white;
        text-decoration: none;
        border: 2px solid white;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
      }

      .boas-vindas a:hover {
        background-color: white;
        color: #3C7182;
      }

      .login {
        background: #cdf2ff;
        width: 60%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 0 10px 10px 0;
        padding: 20px;
        text-align: center;
      }

      .login h2 {
        color: #3C7182;
        margin-bottom: 20px;
        font-size: 30px;
      }

      .input-container {
        position: relative;
        width: 100%;
        max-width: 320px;
        margin-bottom: 20px;
      }

      .input-container input {
        width: 150%;
        height: 40px;
        padding: 10px 40px 10px 15px;
        margin-left: -40px;
        border: none;
        border-radius: 5px;
        background-color: #3C7182;
        color: lightcyan;
      }

      .input-container input::placeholder {
        color: lightcyan;
      }

      .input-container .icon {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        color: lightcyan;
      }

      .login button {
        background-color: #cdf2ff;
        border: solid;
        border-color: #3C7182;
        border-width: 2px;
        border-radius: 5px;
        width: 150px;
        height: 40px;
        color: #3C7182;
        text-align: center;
        font-size: 1.1rem;
        font-weight: bold;
        margin: 20px 0;
        transition: background-color 0.3s, color 0.3s;
      }

      .login button:hover {
        cursor: pointer;
        background-color: #3C7182;
        color: white;
      }

      .recuperar-senha {
        text-align: center;
        margin-top: 10px;
      }

      .recuperar-senha a {
        text-decoration: none;
        color: #3C7182;
        font-weight: bold;
      }

      @media (max-width: 768px) {
        .login-container {
          flex-direction: column;
          width: 90%;
          height: auto;
          top: 10%;
          transform: translateY(0);
        }

        .boas-vindas {
          width: 100%;
          height: auto;
          border-radius: 10px 10px 0 0;
          padding: 10px;
        }

        .login {
          width: 100%;
          height: auto;
          border-radius: 0 0 10px 10px;
          padding: 10px;
        }

        .boas-vindas img {
          height: 100px;
          width: 100px;
        }

        .input-container {
          width: 100%;
          max-width: 100%;
        }

        .login button {
          width: 100%;
          max-width: 150px;
        }
      }

      .error-message {
            color: red; 
            font-size: 0.8rem; 
            margin-top: 5px; 
      }
    </style>
</head>
<body>
  <div class="login-container">
    <div class="boas-vindas">
      <h2>Bem-vindo ao</h2>
      <h1>DDH</h1>
      
      <img src="{{ asset('img/logo.png') }}" alt="Logo">
      <a href="{{ route('site.cadastro') }}">Cadastre-se</a>
    </div>
    
    <div class="login">

      <form action="{{ route('site.login') }}" method="post">
      @csrf
        <h2>Login</h2>
        
        <div class="input-container">
          <input name="email" value="{{ old('email')}}" type="text" placeholder="E-mail">
          <div class="error-message">
              {{$errors->has('email') ? $errors->first('email') : ''}}
          </div>
          <i class="icon" data-feather="user"></i>
        </div>
        <div class="input-container">
          <input name="senha" id="senha" value="{{ old('senha')}}" type="password" placeholder="Senha">
          <div class="error-message">
              {{$errors->has('senha') ? $errors->first('senha') : ''}}
          </div>
          <i id="verSenha" class="icon" data-feather="eye-off"></i>
        </div>
        
        <button type="submit">Entrar</button>
        <div class="error-message">
            {{isset($erro) && $erro != '' ? $erro : ''}}
        </div>
      </form>
        <div class="recuperar-senha">
          <a href="{{ route('site.recuperarsenha') }}">Esqueci minha senha</a>
        </div>
      
    </div>
  </div>
  
  <script>
  document.addEventListener("DOMContentLoaded", function(event) {
          var senhaInput = document.getElementById('senha');
          var icon = document.getElementById('verSenha');

          // Evento click para alternar a visibilidade da senha
          icon.addEventListener('click', function() {
              // Alterne entre mostrar e ocultar a senha
              if (senhaInput.type === 'password') {
                  senhaInput.type = 'text';
                  icon.setAttribute('data-feather', 'eye');
              } else {
                  senhaInput.type = 'password';
                  icon.setAttribute('data-feather', 'eye-off');
              }
              feather.replace();
          });
      });
  </script>
</body>
</html>
