<?php
    session_start();
    unset($_SESSION['nome']);
    session_unset();
    session_destroy();
    header('location: ../View/pagina_inicial.php');
?>