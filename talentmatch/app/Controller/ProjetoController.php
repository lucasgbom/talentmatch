<?php

require_once "../Model/Projeto.php";
include_once "../conexao/Conexao.php";
include_once "../DAO/ProjetoDAO.php";
session_start();
//PEGANDO VARIAVEL
$projeto = new Projeto();
$projetoDAO = new ProjetoDAO();

$tipoAcao = $_POST['tipo'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$idArtista = $_SESSION['idArtista'];
$arquivo = $_FILES['arquivo'];
//SETANDO
$projeto->setTitulo($titulo);
$projeto->setDescricao($descricao);
$projeto->setArquivoCaminho(arquivoCriacao($arquivo));
$projeto->setIdArtista($idArtista);

//ESCOLHENDO ENTRE INSERIR E ATUALIZAR
if ($tipoAcao == 'inserir') {
    $projetoDAO->inserir($projeto);
} else if ($tipoAcao == 'atualizar') {
    $projetoDAO->atualizar($projeto);
}

// FUNÇÂO PARA SALVAR ARQUIVO
function arquivoCriacao($arquivo)
{
    $info = pathinfo($arquivo['name']);
    $filename = $info['filename'];
    $extension = $info['extension'];
    $cript = md5($filename);
    $encrypt = $cript . '.' . $extension;
    $fileTmpPath = $arquivo['tmp_name'];
    $targetpath = "../../data/" . $encrypt;
    if (move_uploaded_file($fileTmpPath, $targetpath)) {
        echo "Arquivo enviado com sucesso para a pasta específica. Nome criptografado: " . $encrypt;
    } else {
        echo "Erro ao mover o arquivo para o diretório de uploads.";
    }
    return $encrypt;
    //$projeto->setArquivoCaminho($encrypt);
}
