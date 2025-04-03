<?php
include('../conexao/conexao.php');
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_crip = md5(sha1($senha));
$tipo = $_POST['tipo'];
$sql = tipo($tipo, 1);
$consulta = $conexao->prepare($sql);
$consulta->bindValue(':email', $email);
$consulta->bindValue(':senha', $senha_crip);
$consulta->execute();
$usuario = $consulta->fetchAll(PDO::FETCH_ASSOC);
if (count($usuario) >= 1) {
    session_start();
    salvarSession($usuario);
    var_dump($_SESSION);
} else {
    tipo($tipo, 0);
}








































function salvarSession($usuario)
{
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['senha'] = $usuario['senha'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['endereco'] = $usuario['endereco'];
    $_SESSION['id'] = $usuario['id'];
    //header('location: ../View/home.php');
}
function tipo($tipo, $procurar)
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
        //header('location: ../View/login_contratador.php?msg=NomeOuSenhaIncorretos');
    } else {
        //header('location: ../View/login_artista.php?msg=NomeOuSenhaIncorretos');
    }
}
