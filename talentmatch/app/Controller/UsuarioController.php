<?php

require_once "../Model/Usuario.php";
include_once "../DAO/UsuarioDAO.php";

require_once "../Model/Projeto.php";
include_once "../DAO/ProjetoDAO.php";

include_once "../conexao/Conexao.php";
session_start();
$arquivo = isset($_FILES['foto']) ? $_FILES['foto'] : '';
$usuarioDAO = new UsuarioDAO();
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : new Usuario();
$usuario->setEmail($_POST['email']);

isset($_POST['nome']) ?          $usuario->setNome($_POST['nome'])               : '';
isset($_SESSION['usuario']) ?    $usuario->setId($_SESSION['usuario']->getId())  : '';
isset($_POST['nomeUsuario']) ?   $usuario->setNomeUsuario($_POST['nomeUsuario']) : '';
isset($arquivo['name']) ?        $usuario->setFotoPerfil($arquivo['name'])       : '';
if ($_POST['tipo'] == 'logar') {
    if ($usuarioDAO->logar($_POST['email'], $_POST['senha'])) {
        header('location: ../View/home.php');
    } else {
        header('location: ../View/pagina_inicial.php?msg=emailSenhaIncorretos');
    }
} else if ($_POST['tipo'] == 'cadastrar') {
    $usuarioDAO->inserir($_POST['email'], $_POST['senha'], $_POST['nome']);
    header('location: ../View/pagina_inicial.php');
} else if ($_POST['tipo'] == 'atualizar') {
    $usuarioDAO->atualizar($usuario);
}
