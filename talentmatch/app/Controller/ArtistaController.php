<?php

include_once "../conexao/Conexao.php";
include_once "../Model/Artista.php";
include_once "../DAO/ArtistaDAO.php";

$artista = new Artista();
$artistaDAO = new ArtistaDAO();

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';

$senha_crip = $senha;
// Verifica se pesquisaram alguma coisa.
/*
if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
    $artistas = $artistaDAO->buscar("id", $_GET['pesquisa']);
} else {
    $artistas = $artistaDAO->listarTodos();
}*/

if (isset($tipo)) {
    $artista->setSenha($senha);
    $artista->setNome($nome);
    $artista->setEndereco($endereco);
    $artista->setEmail($email);
    switch ($tipo) {
        case 'cadastro_artista':
            if (!$artistaDAO->artistaExiste($email, $senha)) {
                $artistaDAO->inserir($artista);
            }
            else{
                header('location: ../View/cadastro_artista.php?msg=emailIndisponivel');
            }
            break;
        case 'login_artista':
            if (!$artistaDAO->logar($artista)){
                header('location: ../View/login.php?msg=emailSenhaIncorretos');
            }
            break;
        case 'atualizar_artista':
            $artistaDAO->atualizar($artista);
            break;
    }
    /*
    if ($tipo == "cadastro_artista") {
        //$artista->setInstagram($u['instagram']);
        //$artista->setSpotify($u['spotify']);
        //$artista->setBiografia($u['biografia']);
        //$artista->setFotoPerfil($u['foto_perfil']);
        //$artista->setDisponivel($u['disponivel']);
        //$artista->setX($u['x']);
        //header("location: ../");
        $artistaDAO->inserir($artista);
    } else if ($tipo == "login_artista") {
        $artistaDAO->logar($artista);
    } else if ($tipo == "atualizar_artista") {
        $artistaDAO->atualizar($artista);
    }*/
}

// Cadastrar

// Editar
/*
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
}*/
