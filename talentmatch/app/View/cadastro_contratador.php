<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>CADASTRO PARA CONTRATADORES</h1>
    <form action="../Controller/ContratadorController.php" method="POST">
        <?php include('../../html/form_cadastro.html') ?>
        <input type="hidden" value="cadastro_contratador" name="tipo">
    </form> <br>
    <a href="login_contratador.php"><button>Login</button></a> <br> <br>
    <a href="pagina_inicial.php"><button>Página Inicial</button></a>
</body>

</html>
<?php include('../../php/emailIndisponivel.php'); ?>