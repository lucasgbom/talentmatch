<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: pagina_inicial.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../bootstrap/bootstrap.cs">
    <script src="../../bootstrap/bootstrap.js"></script>
</head>
<body style="background-color: #f5f5f5;">
    <?php include('../../php/navbar_home.php') ?>
    <main class="d-flex justify-content-center" style="">
            <div class="container posts" style="background-color: white;">a</div>
    </main>
</body>

</html>