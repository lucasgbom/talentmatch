<?php

require_once "../Model/Projeto.php";
include_once "../conexao/Conexao.php";
include_once "../DAO/ProjetoDAO.php";


include_once "../DAO/usuarioDAO.php";

require_once "../Model/usuario.php";
session_start();
$usuario = $_SESSION["usuario"];

//PEGANDO VARIAVEL
$projeto = new Projeto();
$projetoDAO = new ProjetoDAO();
var_dump($_POST);
$id = isset($_POST['id'])? $_POST['id']: '';
$tipoAcao = $_POST['tipo'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$idUsuario = $usuario->GetId();

$arquivo = $_FILES['video'];
//SETANDO
$projeto->setTitulo($titulo);
$projeto->setDescricao($descricao);
$projeto->setArquivoCaminho(arquivoCriacao($arquivo));
$projeto->setIdUsuario($idUsuario);
//ESCOLHENDO ENTRE INSERIR E ATUALIZAR
if ($tipoAcao == 'inserir') {
    $projetoDAO->inserir($projeto);
    header("Location: ../view/meuPerfil.php");
} else if ($tipoAcao == 'editar') {
    $projeto->setId($id);
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
    } else {
        echo "Erro ao mover o arquivo para o diretório de uploads.";
    }
    return $encrypt;
    $projeto->setArquivoCaminho($encrypt);
}
