<?php

include_once "../conexao/Conexao.php";

require_once("../Model/Artista.php");
include_once "../DAO/ArtistaDAO.php";

require_once "../Model/Projeto.php";
include_once "../DAO/ProjetoDAO.php";


$artista = new Artista();
$artistaDAO = new ArtistaDAO();

session_start();
if(isset($_SESSION["usuario"])){
    $artista = $_SESSION["usuario"];
}
    

$tipo = $_POST["tipo"];

if (isset($tipo)) {
    switch ($tipo) {
        case 'cadastro_artista':
                $artistaDAO->inserir($artista);
            break;
        case 'login_artista':
                $artistaDAO->logar($artista);
                header('location: ../View/perfil.php');
            
            break;
        case 'atualizar_artista':
            $artistaDAO->atualizar($artista);
            break;
    }
}

