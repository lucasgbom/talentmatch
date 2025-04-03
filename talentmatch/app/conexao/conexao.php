<?php
$username = "root";
$password = "";

try {
    $conexao = new PDO ('mysql:host=localhost;dbname=talentmatch', $username, $password);
    $conexao->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo ("ERROR:" . $e->getMessage());
}
?>