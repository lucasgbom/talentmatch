<?php
    include('../DAO/artistaDAO.php');
    include('../DAO/contratadorDAO.php');
    include('../conexao/Conexao.php');
    $email = $_POST['email'];
    $senha = sha1(md5($_POST['senha']));
    $artistaDAO = new artistaDAO;
    $contratadorDAO = new contratadorDAO;
    if($artistaDAO->logar($senha, $email) || $contratadorDAO->logar($senha, $email))
    {
        header('location: ../View/home.php');
    }
    else{
        //header('location: ../View/login.php?msg=emailSenhaIncorretos');
    }

    