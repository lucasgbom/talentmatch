<?php session_start(); 
if (!isset($_SESSION['nome'])){
    header('location: pagina_inicial.php'); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home </title>
</head>
<body>
    <h1>Bem vindo, <?php echo($_SESSION['nome'])?></h1>
    <a href="../Model/sair.php"><button>Sair</button></a>
</body>
</html>