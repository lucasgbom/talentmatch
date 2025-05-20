<?php

include_once('../conexao/conexao.php');
require_once('../Model/Usuario.php');
include_once('../DAO/UsuarioDAO.php');
include_once('../Model/Post.php');
include_once('../DAO/PostDAO.php');
include_once('../Model/Projeto.php');
include_once('../DAO/ProjetoDAO.php');
include_once('../../php/conversao.php');
session_start();
$postDAO = new PostDAO();
$usuarioDAO = new UsuarioDAO();
$usuario2 = $_SESSION["usuario"];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../bootstrap/bootstrap.cs">
    <script src="../../bootstrap/bootstrap.js"></script>
    <style>
        p {
            word-wrap: break-word;
            white-space: normal;
        }
    </style>
</head>

<?php include_once('../../php/navbar.php');
$posts = $postDAO->listarHome($_SESSION['usuario']);
foreach ($posts as $post) {
    $usuario = $usuarioDAO->buscar('id', $post['idUsuario']);
?>

    <main class="d-flex justify-content-center">
        <div class="container posts" style="background-color: #E2E2E2; padding: 2em; border-radius: 2em; border-style: solid; width: 60em">
            <div class="header_post row align-items-center" style="padding-left: 1em;">
                <div class="col-auto d-flex flex-wrap align-items-center" style="width: 30px; height: 30px; padding: 0;">
                    <img src="../../data/<?php
                                            if (isset($usuario['fotoPerfil'])) {
                                                echo ($usuario['fotoPerfil']);
                                            } else {
                                                echo ('perfil_padrao.png');
                                            }
                                            ?>" alt="" class="d-inline-block align-text-top" style="width: 100%; height: 100%; object-fit: fill;">
                </div>
                <div class="col justify-content-start align-items-center">
                    <a href="perfil.php?id=<?=$post['idUsuario']?>"><b><?php echo ($usuario['nome']); ?></b></a>
                </div>
                <form style="padding: 0" action="match.php" method="POST"><br>
                    <h3 for="titulo" class="fw-bold"> <?= $post['titulo'] ?></h3>
                    <p> <?= $post['descricao'] ?> </p>
                    <span class="fw-bold"><?= formatarData($post['data_']) ?></span><br>
                    <span class="fw-bold"> Pagamento: <?= formatarParaReal($post['pagamento']) ?></span> <br>
                    <input type="hidden" name="acao" value="inserir">
                    <span>Habilidade necessária: <i><?= $post['habilidade'] ?></i> </span>
                    <input type="hidden" name="idUsuario" value="<?= $usuario2->getId() ?>">
                    <input type="hidden" name="idPost" value="<?= $post['id'] ?>">

                    <button class="btn btn-lg btn-success float-end" type="submit" name="editar" style="margin-right: 1em;">Aceitar</button>
                </form>
            </div>
        </div>
    </main>
<?php } ?>
</body>

</html>