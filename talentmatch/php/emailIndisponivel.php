<?php
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'emailIndisponivel') {
        echo ('<script>alert("Email indisponível.")</script>');
    }
}
?>