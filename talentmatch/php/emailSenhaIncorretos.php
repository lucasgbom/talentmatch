<?php
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'NomeOuSenhaIncorretos') {
        echo ('<script>alert("Email ou senha incorretos.")</script>');
    }
} ?>