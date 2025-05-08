<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../bootstrap/bootstrap.cs">
    <script src="../../bootstrap/bootstrap.js"></script>
</head>

<body style="background-color: #f5f5f5;">
    <?php include('../../php/navbar_home.php') ?>
    <main class="d-flex justify-content-center" style="margin-top: 4em">
        <div class="container posts" style="background-color: white;">
            <div class="header_post row">
                <div class="col-auto d-flex flex-wrap align-items-center" style="width: auto; padding: 0;"><img src="../../data/perfil_padrao.png" width="30" height="30" alt="foto_perfil" class="d-inline-block align-text-top"></div>
                <div class="col justify-content-start align-items-center">
                    <div class="row"><b style="padding-left: 1em;">Empresa não sei oque</b></div>
                    <div class="row"><span style="padding-left: 1em;">de tal area</span> </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>