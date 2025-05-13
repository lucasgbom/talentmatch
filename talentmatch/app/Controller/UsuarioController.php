        <?php
       
        require_once "../Model/Usuario.php";
        include_once "../DAO/UsuarioDAO.php";

        require_once "../Model/Projeto.php";
        include_once "../DAO/ProjetoDAO.php";

        include_once "../conexao/Conexao.php";
        session_start();
        $arquivo = $_FILES['foto'];
        $usuarioDAO = new UsuarioDAO();
        $usuario = $_SESSION['usuario'];
        $usuario->setNome($_POST['nome']);
        $usuario->setId($_SESSION['usuario']->getId());
        $usuario->setNomeUsuario($_POST['nomeUsuario']);
        $usuario->setEmail($_POST['email']);
        $usuario->setFotoPerfil($arquivo['name']);
        if ($_POST['tipo'] == 'logar') {
            if ($usuarioDAO->logar($_POST['email'], $_POST['senha'])) {
                header('location: ../View/perfil.php');
            } else {
                header('location: ../View/pagina_inicial.php?msg=emailSenhaIncorretos');
            }
        } else if ($_POST['tipo'] == 'cadastrar') {
            $usuarioDAO->inserir($_POST['email'], $_POST['senha'], $_POST['nome']);
            header('location: ../View/pagina_inicial.php');
        } else if ($_POST['tipo'] == 'atualizar') {
            $usuarioDAO->atualizar($usuario);
        }
        ?>