<?php
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'emailSenhaIncorretos') {
        echo ('<script>alert("Email ou senha incorretos.")</script>');
    }
} ?>