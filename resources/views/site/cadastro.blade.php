<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      display: flex;
      flex-direction: row;
      width: 50%;
      max-width: 1000px;
      height: 600px;
      margin: auto;
      position: relative;
      top: 50%;
      transform: translateY(-50%);
      box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
    }

    .boas-vindas {
      background: #cdf2ff;
      width: 40%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 20px;
      border-radius: 10px 0 0 10px;
    }

    .boas-vindas img {
      height: 200px;
      width: 200px;
    }

    .boas-vindas h1, .boas-vindas h2 {
      margin: 10px;
      color: #3C7182;
    }

    .login {
      background: #3C7182;
      width: 60%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 20px;
      border-radius: 0 10px 10px 0;
    }

    .login h2 {
      color: lightcyan;
      margin-bottom: 20px;
      text-align: center;
    }

    .input-group {
      position: relative;
      width: 100%;
      max-width: 320px;
      margin-bottom: 20px;
    }

    .input-group input {
      width: 100%;
      padding: 10px 100px 10px 15px;
      border: none;
      border-radius: 5px;
      background-color: #cdf2ff;
      color: #3C7182;
      font-size: 1rem;
    }

    .input-group label {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      color: #3C7182;
      font-size: 1rem;
      pointer-events: none;
      transition: all 0.2s ease-out;
    }

    .input-group input:focus + label,
    .input-group input:not(:placeholder-shown) + label {
      top: -10px;
      left: 15px;
      font-size: 0.8rem;
      color: #3C7182;
      background-color: #cdf2ff;
      padding: 0 5px;
      border-radius: 5px;
    }

    .input-group .icon {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      color: #3C7182;
    }

    .login button {
      width: 50%;
      max-width: 320px;
      margin-left: 25%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #cdf2ff;
      color: #3C7182;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
    }

    .login button:hover {
      background-color: lightcyan;
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

      .boas-vindas {
        border-radius: 10px 10px 0 0;
      }

      .login {
        border-radius: 0 0 10px 10px;
      }

      .boas-vindas img {
        height: 150px;
        width: 150px;
      }
    }
  </style>
</head>

  <body>
    <div class="login-container">
      <div class="boas-vindas">
        <h2>Cadastre-se no</h2>
        <h1>DDH</h1>
        <img src="logo.png" alt="Logo">
      </div>
      <div class="login">
        <form action="{{ route('site.cadastro') }}" method="post">
          <h2>Cadastro</h2>
          @csrf
          <div class="input-group">
            <input name="nome" value="{{ old('nome')}}" type="text" placeholder="Nome" class="{{ $errors->has('nome') ? 'input-error' : '' }}">
            <div class="error-message">
                {{$errors->has('nome') ? $errors->first('nome') : ''}}
            </div>
            <i class="icon" data-feather="user"></i>
          </div>
          <div class="input-group">
            <input name="sobrenome" value="{{ old('sobrenome')}}" type="text" placeholder="Sobrenome" class="{{ $errors->has('sobrenome') ? 'input-error' : '' }}">
            <div class="error-message">
                {{$errors->has('sobrenome') ? $errors->first('sobrenome') : ''}}
            </div>
            <i class="icon" data-feather="user-check"></i>
          </div>
          <div class="input-group">
            <input name="cpf" value="{{ old('cpf')}}" type="text" placeholder="CPF" class="{{ $errors->has('cpf') ? 'input-error' : '' }}">
            <div class="error-message">
                {{$errors->has('cpf') ? $errors->first('cpf') : ''}}
            </div>
            <div class="error-message">
                {{$errors->has('email') ? $errors->first('email') : ''}}
            </div>
            <i class="icon" data-feather="book"></i>
          </div>
          <div class="input-group">
            <input name="email" value="{{ old('email')}}" type="email" placeholder="E-mail" class="{{ $errors->has('email') ? 'input-error' : '' }}">
            <i class="icon" data-feather="mail"></i>
          </div>
          <div class="input-group">
            <input id="senha" name="senha" type="password" placeholder="Senha" class="{{ $errors->has('senha') ? 'input-error' : '' }}">
            <div class="error-message">
                {{$errors->has('senha') ? $errors->first('senha') : ''}}
            </div>
            <i id="verSenha" class="icon" data-feather="eye-off"></i>
          </div>
          <div class="input-group">
            <input id="senha_confirmation" name="senha_confirmation" type="password" placeholder="Confirme a senha" class="{{ $errors->has('confirmarsenha') ? 'input-error' : '' }}">
            <div class="error-message">
                {{$errors->has('senha_confirmation') ? $errors->first('senha_confirmation') : ''}}
            </div>
            <i id="verConfirmarSenha" class="icon" data-feather="eye-off"></i>
          </div>
          <button type="submit">Cadastrar</button>
        </form>
      </div>
    </div>

    <script>
      feather.replace();
      document.addEventListener("DOMContentLoaded", function(event) {
          var senhaInput = document.getElementById('senha');
          var confirmarSenhainput = document.getElementById('senha_confirmation');
          var iconSenha = document.getElementById('verSenha');
          var iconConfirmarSenha = document.getElementById('verConfirmarSenha');

          // Evento click para alternar a visibilidade da senha
          iconSenha.addEventListener('click', function() {
              // Alterne entre mostrar e ocultar a senha
              if (senhaInput.type === 'password') {
                  senhaInput.type = 'text';
                  iconSenha.setAttribute('data-feather', 'eye');
              } else {
                  senhaInput.type = 'password';
                  iconSenha.setAttribute('data-feather', 'eye-off');
              }
              feather.replace();
          });

          iconConfirmarSenha.addEventListener('click', function() {
              // Alterne entre mostrar e ocultar a senha
              if (confirmarSenhainput.type === 'password') {
                  confirmarSenhainput.type = 'text';
                  iconConfirmarSenha.setAttribute('data-feather', 'eye');
              } else {
                  confirmarSenhainput.type = 'password';
                  iconConfirmarSenha.setAttribute('data-feather', 'eye-off');
              }
              feather.replace();
          });
      });
    </script>
</body>
</html>
