<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>LOGIN</h1>
    <form action="../Controller/ArtistaController.php" method="POST">
        <label for="email">Email: </label><input type="email" name="email">
        <label for="senha">Senha: </label><input type="password" name="senha">
        <input type="submit" value="Enviar">
        <input type="hidden" value="login" name="tipo">
    </form> <br>
</body>
<?php include('../../php/emailSenhaIncorretos.php') ?>

</html>