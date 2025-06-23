<?php 
include_once('../conexao/Conexao.php');

if (!isset($idUsuario)){
    header("location: home.php?msg=precisaLogar");
}
$idUsuario = $_POST['idUsuario'];
$idPost = $_POST['idPost'];


$sql = "INSERT INTO usuario_post (idUsuario, idPost) VALUES (:idU, :idP)";
$consulta = Conexao::getConexao()->prepare($sql);
$consulta->bindValue(':idU',$idUsuario);
$consulta->bindValue(':idP',$idPost);
$consulta->execute();

echo($idPost . $idUsuario);
header("location: home.php?msg=sucesso");
?>