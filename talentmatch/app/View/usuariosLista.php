<?php 
    include_once('../Model/Usuario.php');
    include_once('../DAO/UsuarioDAO.php');
    include_once('../conexao/Conexao.php');
    $usuarioDAO = new UsuarioDAO();
    $nome = $_GET['nome'];
    $usuarios = $usuarioDAO->buscar('nome', $nome);
    //var_dump($usuarios);
    foreach($usuarios as $usuario){
        echo($usuario['nome'].'<br>');
    }
?>