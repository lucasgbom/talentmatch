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
</body>
<?php
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'NomeOuSenhaIncorretos') {
        echo ('<script>alert("Nome ou senha incorretos.")</script>');
    }
} ?>

</html>