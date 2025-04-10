<?php   

/* @Autor: Adaptado por ChatGPT
   Classe Controller para Contratador */

include_once "../conexao/Conexao.php";
include_once "../model/Contratador.php";
include_once "../dao/ContratadorDAO.php";

$contratador = new Contratador();
$contratadorDAO = new ContratadorDAO();

$u = filter_input_array(INPUT_POST);

// Verifica se pesquisaram alguma coisa.
if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
    $contratadores = $contratadorDAO->buscar("id", $_GET['pesquisa']);  
} else {
    $contratadores = $contratadorDAO->listarTodos(); 
}

// Cadastrar
if (isset($_POST['cadastrar'])) {
    $contratador->setId($u['id']);
    $contratador->setNome($u['nome']);
    $contratador->setSenha($u['senha']);
    $contratador->setEndereco($u['endereco']);
    $contratador->setFoto($u['foto']);
    $contratador->setDescricao($u['descricao']);
    $contratador->setEmail($u['email']);
    
    $contratadorDAO->inserir($contratador);
    header("Location: ../../contratador.php?msg=adicionado");
} 
// Editar
else if (isset($_POST['editar'])) {
    $contratador->setId($u['id']);
    $contratador->setNome($u['nome']);
    $contratador->setSenha($u['senha']);
    $contratador->setEndereco($u['endereco']);
    $contratador->setFoto($u['foto']);
    $contratador->setDescricao($u['descricao']);
    $contratador->setEmail($u['email']);
    
    $contratadorDAO->atualizar($contratador);
    header("Location: ../../contratador.php?msg=editado");
} 
// Deletar
else if (isset($_GET['deletar'])) {
    $contratador->setId($_GET['deletar']);
    $contratadorDAO->deletar($contratador);
    header("Location: ../../contratador.php?msg=apagado");
} else {
    header("Location: ../../contratador.php?msg=erro");
}
