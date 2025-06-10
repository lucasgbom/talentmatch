<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>

  <style>
    /* Import Google font - Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      min-height: 100vh;
      width: 100%;
      background-image: url(fundo.jpg); 
 /*background: #000000;
background: linear-gradient(117deg, rgba(0, 0, 0, 1) 0%, rgb(92, 38, 2) 70%, rgb(80, 34, 4) 100%);*/
      color: #ffffff;
    }

    
    .container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      max-width: 430px;
      width: 100%;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 7px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
    }

    .container .registration {
      display: none;
    }

    #check:checked ~ .registration {
      display: block;
    }

    #check:checked ~ .login {
      display: none;
    }

    #check {
      display: none;
    }

    .container .form {
      padding: 2rem;
    }

    .form header {
      font-size: 2rem;
      font-weight: 500;
      text-align: center;
      margin-bottom: 1.5rem;
      color: #ffffff;
    }

    .form input {
      height: 60px;
      width: 100%;
      padding: 0 15px;
      font-size: 17px;
      margin-bottom: 1.3rem;
      border: 1px solid #5a1c00;
      border-radius: 6px;
      outline: none;
      background:whitesmoke;
      color: black;
      letter-spacing: 1.5px;
    }

    .form input:focus {
      box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .form a {
      font-size: 16px;
      color: #e63946;
      text-decoration: none;
    }

    .form a:hover {
      text-decoration: underline;
    }

    .form input.button {
      color:  whitesmoke;
      background:rgb(90, 18, 0);
      font-size: 1.2rem;
      font-weight: 500;
      letter-spacing: 1px;
      margin-top: 1.7rem;
      cursor: pointer;
      transition: 0.4s;
    }

    .form input.button:hover {
      background:#5a1c00;
    }

    .signup {
      font-size: 17px;
      text-align: center;
      color: #d3cfcf;
    }

    .signup label {
      font-weight: bolder;
      color:rgb(240, 232, 232);
      cursor: pointer;
    }

    .signup label:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header style="color:rgb(255, 255, 255);">Login</header>
      <form action="../Controller/UsuarioController.php" method="POST" style="color: #5a1c00;">
      
        <input type="email" name="email" placeholder="talentmatch@gmail.com" required>
        
        <input type="password" name="senha" placeholder="senha" required>
        <input type="hidden" value="logar" name="tipo">
        <input type="submit" value="Logar" class="button">
      </form>
      <div class="signup">
        <span style="color:rgb(255, 255, 255);">Não possui uma conta ainda?
          <label for="check">Cadastrar</label>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header>Cadastro</header>
      <form action="../Controller/UsuarioController.php" method="POST" style="color:rgb(5, 5, 5);">
        
        <input type="text" name="nome" placeholder="nome" required>
       
        <input type="email" name="email" placeholder="talentmatch@gmail.com">
        <input type="password" name="senha" placeholder="senha" required>
        <input type="hidden" name="tipo" value="cadastrar">
        <input type="submit" value="Cadastrar" class="button">
      </form>
      <div class="signup">
        <span>Já possui uma conta?
          <label for="check">Logar</label>
        </span>
      </div>
    </div>
  </div>
  <?php include_once('../../php/emailIndisponivel.php');
  include_once('../../php/emailSenhaIncorretos.php'); ?>
</body>

</html>
