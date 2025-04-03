<?php
    session_start();
    session_unset();
    session_destroy();
    header('location: ../View/pagina_inicial.php');
?>