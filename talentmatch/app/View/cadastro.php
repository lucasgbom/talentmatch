<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <h1>CADASTRO</h1>
    <form action="../Controller/UsuarioController.php" method="POST">
        <label for="email">Nome: </label><input type="text" name="nome">
        <label for="email">Email: </label><input type="email" name="email">
        <label for="senha">Senha: </label><input type="password" name="senha">
        <input type="hidden" name="tipo" value="cadastrar">
        <input type="submit" value="Enviar">
    </form> <br>
    <a href="login.php"><button>Login</button></a> <br> <br>
    <a href="pagina_inicial.php"><button>Página Inicial</button> </a>
</body>

</html>
<?php include('../../php/emailIndisponivel.php'); ?>