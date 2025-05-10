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
    <nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="margin-left: 1em">
            <img src="../../data/perfil_padrao.png" width="30" height="30" alt="foto_perfil" class="d-inline-block align-text-top">
            <?php echo $_SESSION['nome']; ?>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="perfil.php">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Model/sair.php">Sair</a>
                </li>
            </ul>
        </div>
        <form class="d-flex" action = "usuariosLista.php" role="search" style="margin-right: 1em">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="nome">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</nav>
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