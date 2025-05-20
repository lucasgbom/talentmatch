<?php

include('../conexao/Conexao.php');
include('../Model/Usuario.php');
include('../DAO/UsuarioDAO.php');
session_start();
$usuario = $_SESSION['usuario'];
$usuarioDAO = new UsuarioDAO();
$usuario->setLatitude($_POST['lat']);
$usuario->setLongitude($_POST['lon']);
if ($_POST['acao'] == 'atualizar') {
    $usuarioDAO->atualizar($usuario);
}
