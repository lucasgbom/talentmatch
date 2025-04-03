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
</body>
</html>
<?php
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == 'emailIndisponivel') {
            echo ('<script>alert("Email indisponível.")</script>');
        }
    }
    ?>