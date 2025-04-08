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
            <form class="d-flex" role="search" style="margin-right: 1em">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>