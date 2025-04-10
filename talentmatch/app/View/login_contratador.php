<!DOCTYPE html>
<html lang="pt-br">

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
    </form> <br>
    <a href="cadastro_contratador.php"><button>Cadastro</button></a> <br> <br>
    <a href="pagina_inicial.php"><button>Página Inicial</button></a>
</body>
<?php include('../../php/emailSenhaIncorretos.php') ?>

</html>