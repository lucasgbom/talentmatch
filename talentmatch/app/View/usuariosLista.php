<?php 
    include_once('../Model/Usuario.php');
    include_once('../DAO/UsuarioDAO.php');
    include_once('../conexao/Conexao.php');
    $usuarioDAO = new UsuarioDAO();
    $nome = $_GET['nome'];
    $usuarios = $usuarioDAO->buscar('nome', $nome);
    $opcoesSelecionadas = $_GET['opcoes'];

    var_dump($opcoesSelecionadas);
    foreach($usuarios as $usuario){
        ?> 
        <a href="perfil.php?id=<?=$usuario['id']?>"><h2><?=$usuario['nome']?></h2></a> <br>
    <?php } ?>
