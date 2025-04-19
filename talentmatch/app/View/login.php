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
        <?php include('../../html/form_login.html') ?>
        <input type="hidden" value="login_artista" name="tipo">
    </form> <br>
</body>
<?php include('../../php/emailSenhaIncorretos.php') ?>

</html>