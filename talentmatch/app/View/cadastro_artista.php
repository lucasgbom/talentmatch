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
        <?php include('../../html/form_cadastro.html') ?>
        <input type="hidden" value="cadastro_artista" name="tipo">
    </form> <br>
    <a href="login_artista.php"><button>Login</button></a> <br> <br>
    <a href="pagina_inicial.php"><button>Página Inicial</button> </a>
</body>

</html>
<?php include('../../php/emailIndisponivel.php'); ?>