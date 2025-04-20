<?php 
session_start();
include("../conexao/Conexao.php");

$foto = $_FILES['foto'];
$user = $_POST['username'];

$info = pathinfo($foto['name']);

$filename = $info['filename'];
$extension = $info['extension'];

$cript = md5($filename);

$encrypt = $cript.'.'.$extension;

echo($encrypt);

$fileTmpPath = $foto['tmp_name'];
$targetpath = "../../data/".$encrypt;

if (move_uploaded_file($fileTmpPath, $targetpath)) {
   echo "Arquivo enviado com sucesso para a pasta específica. Nome criptografado: " . $encrypt;
} else {
   echo "Erro ao mover o arquivo para o diretório de uploads.";
}

$consulta = Conexao::getConexao()->prepare("INSERT INTO artista (usuario, foto) VALUES (:user, :foto)");
    $consulta->bindValue(':user', $user, PDO::PARAM_STR); // Corrigir a ordem dos parâmetros
    $consulta->bindValue(':foto', $encrypt, PDO::PARAM_STR); // Corrigir a ordem dos parâmetros
    $consulta->execute();

var_dump($foto);

?>