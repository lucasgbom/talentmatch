<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>CADASTRO PARA ARTISTAS</h1>
    <form action="../Controller/ArtistaController.php" method="POST">
        <label for="nome">Nome: </label><input type="text" name="nome">
        <label for="senha">Senha: </label><input type="password" name="senha">
        <label for="email">Email: </label><input type="email" name="email">
        <label for="endereco">Endereço: </label><input type="text" name="endereco">
        <input type="submit" value="Enviar">
    <input type="hidden" value="cadastro_artista" name="tipo">
    </form> <br>
    <a href="login.php"><button>Login</button></a> <br> <br>
    <a href="pagina_inicial.php"><button>Página Inicial</button> </a>
</body>

</html>
<?php include('../../php/emailIndisponivel.php'); ?>