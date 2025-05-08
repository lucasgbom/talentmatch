<?php
var_dump($_POST);
include_once "../conexao/Conexao.php";

require_once "../Model/Usuario.php";
include_once "../DAO/UsuarioDAO.php";

require_once "../Model/Projeto.php";
include_once "../DAO/ProjetoDAO.php";

$usuarioDAO = new UsuarioDAO();


if ($_POST['tipo'] == 'logar') {
    if ($usuarioDAO->logar($_POST['email'], $_POST['senha'])) {
        header('location: ../View/perfil.php');
    } else {
        header('location: ../View/login.php?msg=emailSenhaIncorretos');
    }
}
else if ($_POST['tipo'] == 'cadastrar'){
    echo('sdalj');
    $usuarioDAO->inserir($_POST['email'], $_POST['senha']);
}
