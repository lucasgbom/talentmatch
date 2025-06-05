<?php
include('../../php/funcoes.php');
require_once("../Model/Usuario.php");
include_once("../DAO/UsuarioDAO.php");
include_once("../Model/Projeto.php");
include_once("../DAO/ProjetoDAO.php");
include_once("../DAO/PostDAO.php");
include_once("../conexao/Conexao.php");
session_start();
if (isset($_SESSION["usuario"])) {
    $usuario = $_SESSION["usuario"];
} else {
    header("location: pagina_inicial.php");
}
$projetoDAO = new ProjetoDAO();
$postDAO = new PostDAO();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Perfil - <?= $usuario->getNome() ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <?php include("meuPerfilCss.php"); ?>
    <?php include("perfilCss.php"); ?>
</head>

<body>
    <!-- Modal Luis (usuario) -->
    <?php include("../../php/modalUsuario.php"); ?>
    <!-- Modal Lemuel (projeto, post) -->
    <?php include("../../php/modalPost.php"); ?>


    <?php include("meuPerfilJs.php"); ?>
    <?php include("../../../teste/criarjs.php"); ?>
</body>

</html>