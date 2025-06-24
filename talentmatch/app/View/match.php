<?php 
include_once('../conexao/Conexao.php');

if (!isset($idUsuario)){
    header("location: home.php?msg=precisaLogar");
}
$idUsuario = $_POST['idUsuario'];
$idPost = $_POST['idPost'];
$nomeUsuario = $_POST['nomeUsuario'];



$sql = "INSERT INTO usuario_post (idUsuario, idPost, nomeU) VALUES (:idU, :idP, :nomeU)";
$consulta = Conexao::getConexao()->prepare($sql);
$consulta->bindValue(':idU',$idUsuario);
$consulta->bindValue(':idP',$idPost);
$consulta->bindValue(':nomeU',$nomeUsuario);

$consulta->execute();

echo($idPost . $idUsuario);
header("location: home.php?msg=sucesso");
?>