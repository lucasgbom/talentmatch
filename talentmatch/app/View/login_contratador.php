<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>LOGIN PARA CONTRATADORES</h1>
    <form action="../Model/logar.php" method="POST">
        <?php include('../../html/form_login.html') ?>
        <input type="hidden" value="contratador" name="tipo">
    </form>
    <a href="cadastro_contratador.php">Cadastro</a>
    <a href="pagina_inicial">Página Inicial</a>
</body>
<?php include('../../php/emailSenhaIncorretos.php') ?>

</html>