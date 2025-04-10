<?php
include('../conexao/conexao.php');
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_crip = md5(sha1($senha));
$tipo = $_POST['tipo'];
$sql = gerarSQL($tipo, 1);
$consulta = Conexao::getConexao()->prepare($sql);
$consulta->bindValue(':email', $email);
$consulta->bindValue(':senha', $senha_crip);
$consulta->execute();
$usuario = $consulta->fetch(PDO::FETCH_ASSOC);
if ($usuario) {
    salvarSession($usuario);
} else {
    gerarSQL($tipo, 0);
}








































function salvarSession($usuario)
{
    session_start();
    var_dump($_SESSION); 
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['senha'] = $usuario['senha'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['endereco'] = $usuario['endereco'];
    $_SESSION['id'] = $usuario['id'];
    header('location: ../View/home.php');
}
function gerarSQL($tipo, $procurar)
{
    if ($procurar) {
        if ($tipo == 'contratador') {
            $sql = 'SELECT * FROM contratador WHERE email = :email AND senha = :senha';
        } else {
            $sql = 'SELECT * FROM artista WHERE email = :email AND senha = :senha';
        }
        return $sql;
    }
    if ($tipo == 'contratador') {
        header('location: ../View/login_contratador.php?msg=NomeOuSenhaIncorretos');
    } else {
        header('location: ../View/login_artista.php?msg=NomeOuSenhaIncorretos');
    }
}
