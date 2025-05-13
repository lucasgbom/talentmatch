<?php
    session_start();
    unset($_SESSION);
    session_destroy();
    header('location: pagina_inicial.php');