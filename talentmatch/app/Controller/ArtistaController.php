<?php

/* @Autor: Adaptado por ChatGPT
   Classe Controller para Artista */

include_once "../conexao/Conexao.php";
include_once "../model/Artista.php";
include_once "../dao/ArtistaDAO.php";

$artista = new Artista();
$artistaDAO = new ArtistaDAO();

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$endereco = $_POST['endereco'];
$email = $_POST['email'];
$senha_crip = md5(sha1($senha));
$tipo = $_POST['tipo'];

// Verifica se pesquisaram alguma coisa.
if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
    $artistas = $artistaDAO->buscar("id", $_GET['pesquisa']);
} else {
    $artistas = $artistaDAO->listarTodos();
}

// Cadastrar
if (isset($tipo)) {
    if ($artistaDAO->logar($senha, $email)) {
        $artista->setSenha($senha);
        $artista->setNome($nome);
        $artista->setEndereco($endereco);
        $artista->setEmail($tipo);
        //$artista->setInstagram($u['instagram']);
        //$artista->setSpotify($u['spotify']);
        //$artista->setBiografia($u['biografia']);
        //$artista->setFotoPerfil($u['foto_perfil']);
        //$artista->setDisponivel($u['disponivel']);
        //$artista->setX($u['x']);
        //header("location: ../");
        $artistaDAO->inserir($artista);
        
    }
}
// Editar
else if (isset($_POST['editar'])) {
    $artista->setId($u['id']);
    $artista->setBiografia($u['biografia']);
    $artista->setSenha($u['senha']);
    $artista->setNome($u['nome']);
    $artista->setFotoPerfil($u['foto_perfil']);
    $artista->setEndereco($u['endereco']);
    $artista->setDisponivel($u['disponivel']);
    $artista->setX($u['x']);
    $artista->setInstagram($u['instagram']);
    $artista->setSpotify($u['spotify']);
    $artista->setEmail($u['email']);

    $artistaDAO->atualizar($artista);
    header("Location: ../../artista.php?msg=editado");
}
else if (isset($_GET['deletar'])) {
    $artista->setId($_GET['deletar']);
    $artistaDAO->deletar($artista);
    header("Location: ../../artista.php?msg=apagado");
} else {
    header("Location: ../../artista.php?msg=erro");
}
