<?php
require_once "../Model/Post.php";
include_once "../conexao/Conexao.php";
include_once "../DAO/PostDAO.php";

include_once "../DAO/PostDAO.php";

require_once "../Model/Post.php";

$valor = preg_replace('/[^\d]/', '', $_POST['pagamento']);
$_POST['pagamento'] = intval($valor);

$Post = new Post();
$PostDAO = new PostDAO();
$Post->setLongitude($_POST['longitude']);
$Post->setLatitude($_POST['latitude']);
$Post->setTitulo($_POST['titulo']);
$Post->setDescricao($_POST['descricao']);
$Post->setData($_POST['date']);
$Post->setHabilidade($_POST['habilidade']);
$Post->setIdUsuario($_POST['idUsuario']);
$Post->setPagamento($_POST['pagamento']);

if ($_POST['acao'] == "inserir") {
    $PostDAO->inserir($Post);
}
