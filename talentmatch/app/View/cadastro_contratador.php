<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>CADASTRO PARA CONTRATADORES</h1>
    <form action="../Model/cadastrar.php" method="POST">
        <?php include('../../html/form_cadastro.html') ?>
        <input type="hidden" value="contratador" name="tipo">
    </form>
    <a href="login_contratador"><button>Login</button></a> <br>
    <a href="pagina_inicial">Página Inicial</a>
</body>

</html>
<?php include('../../php/emailIndisponivel.php'); ?>