<?php
require_once "../Model/Post.php";
include_once "../conexao/Conexao.php";
include_once "../DAO/PostDAO.php";

include_once "../DAO/PostDAO.php";

require_once "../Model/Post.php";

$post = new Post();
$post->setTitulo($_POST['titulo']);

if($_POST['acao'] == "inserir"){

}
?>