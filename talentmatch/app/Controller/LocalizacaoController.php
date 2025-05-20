<?php

include('../conexao/Conexao.php');
include('../Model/Localizacao.php');
include('../DAO/LocalizacaoDAO.php');
include('../Model/Usuario.php');
include('../DAO/UsuarioDAO.php');
session_start();
$usuario = $_SESSION['usuario'];
$localizacao = new Localizacao();
$localizacaoDAO = new LocalizacaoDAO();
$localizacao->setLat($_POST['lat']);
$localizacao->setLon($_POST['lon']);
$localizacao->setIdUsuario($usuario->getId());
if ($_POST['acao'] == 'inserir') {
    $localizacaoDAO->inserir($localizacao);
}
