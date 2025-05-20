<?php
include('../conexao/conexao.php');
include('../../php/conversao.php');
include('../Model/Post.php');
include('../DAO/PostDAO.php');
include('../Model/Projeto.php');
include('../DAO/ProjetoDAO.php');
include('../Model/Usuario.php');
include('../DAO/usuarioDAO.php');
$usuarioDAO = new UsuarioDAO();
if (isset($_GET['id'])){
    $id = $_GET['id'];
}
$usuario = $usuarioDAO->buscar('id', $id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do <?= $usuario['nome'] ?></title>
</head>

<body>
    <h2>Nome: <?= $usuario['nome'] ?></h2>
    <h2>Email: <?= $usuario['email'] ?></h2>
    <h1>Posts:</h1>
    <?php
    $postDAO = new PostDAO();
    $posts = $postDAO->buscar('idUsuario', $usuario['id']);
    foreach ($posts as $post) {
    ?>
        <h1>Titulo: <?= $post['titulo'] ?></h1>
        <p>Descrição: <?= $post['descricao'] ?></p>
        <p>Data: <?= formatarData($post['data_']) ?></p>
        <p>Pagamento: <?= formatarParaReal($post['pagamento']) ?></p>
    <?php } ?>
    <h1>Projetos: </h1>
    <?php
    $projetoDAO = new ProjetoDAO();
    $projetos = $projetoDAO->buscar('idUsuario', $usuario['id']);
    foreach ($projetos as $projeto) {
    ?>
        <h1>Titulo: <?= $projeto['titulo'] ?></h1>
        <p>Descrição: <?= $projeto['descricao'] ?></p>
        Vídeo: <video controls src="../../data/<?=$projeto['arquivoCaminho']?>" class="projeto"></video>
    <?php } ?>
</body>
</html>