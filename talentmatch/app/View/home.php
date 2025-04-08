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
</head>

<body>
    <h1>Bem-vindo, <?php echo $_SESSION['nome']; ?></h1>
    <a href="../Model/sair.php"><button>Sair</button></a>
    <a href="perfil.php"><button>Perfil</button></a>
</body>

</html>