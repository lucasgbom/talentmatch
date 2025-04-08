<?php
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'NomeOuSenhaIncorretos') {
        echo ('<script>alert("Nome ou senha incorretos.")</script>');
    }
} ?>