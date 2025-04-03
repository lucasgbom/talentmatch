<?php
include('../conexao/conexao.php');
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$endereco = $_POST['endereco'];
$email = $_POST['email'];
$senha_crip = md5(sha1($senha));
$tipo = $_POST['tipo'];
$sql = gerarSQL($tipo);

$consulta = $conexao->prepare($sql[0]);
$consulta->bindValue(':email', $email);
$consulta->execute();
$usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);
var_dump($usuarios);
if (count($usuarios) == 0) {
    $consulta = $conexao->prepare($sql[1]);
    $consulta->bindValue(':email', $email);
    $consulta->bindValue(':nome', $nome);
    $consulta->bindValue(':endereco', $endereco);
    $consulta->bindValue(':senha', $senha_crip);
    $consulta->execute();
    header('location: ../View/login_' . $tipo . '.php?msg=sucesso');
} else {
    header('location: ../View/cadastro_' . $tipo . '.php?msg=emailIndisponivel');
}

























function gerarSQL($tipo)
{
    if ($tipo == 'contratador') {
        $sql_select = 'SELECT * FROM contratador WHERE email = :email';
        $sql_insert = 'INSERT INTO contratador (nome, senha, email, endereco) VALUES (:nome, :senha, :email, :endereco)';
    } else {
        $sql_select = 'SELECT * FROM artista WHERE email = :email';
        $sql_insert = 'INSERT INTO artista (nome, senha, email, endereco) VALUES (:nome, :senha, :email, :endereco)';
    }
    return array($sql_select, $sql_insert);
}
