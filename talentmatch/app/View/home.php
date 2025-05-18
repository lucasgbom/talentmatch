<?php

include_once('../conexao/conexao.php');
include_once('../Model/Usuario.php');
include_once('../DAO/UsuarioDAO.php');
include_once('../Model/Post.php');
include_once('../DAO/PostDAO.php');
include_once('../Model/Projeto.php');
include_once('../DAO/ProjetoDAO.php');
include_once('../../php/conversao.php');
session_start();
$postDAO = new PostDAO();
$usuarioDAO = new UsuarioDAO();
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

<?php include_once('../../php/navbar.php');
$posts = $postDAO->listarHome($_SESSION['usuario']);
foreach ($posts as $post) {
   
    $usuario = $usuarioDAO->buscar('id', $post['idUsuario']);
    var_dump($usuario);
?> 

    <main class="d-flex justify-content-center">
        <div class="container posts" style="background-color: #E2E2E2; padding: 2em; border-radius: 2em; border-style: solid; width: 60em">
            <div class="header_post row align-items-center" style="padding-left: 1em;"> 
                <div class="col-auto d-flex flex-wrap align-items-center" style="width: 30px; height: 30px; padding: 0;">
                    <img src="../../data/" alt="" class="d-inline-block align-text-top" style="width: 100%; height: 100%; object-fit: fill;">
                </div>
                <div class="col justify-content-start align-items-center"> 
                    <b><?php  echo($usuario['nome']);?></b>
                </div>
                <form style="padding: 0"><br>
                    <h3 for="titulo" class="fw-bold"> <?= $post['titulo'] ?></h3>
                    <p> <?= $post['descricao'] ?> </p>
                    <span class="fw-bold"><?= formatarData($post['data_']) ?></span><br>
                    <span class="fw-bold"> Pagamento: <?= formatarParaReal($post['pagamento']) ?></span> <br>
                    <input type="hidden" name="acao" value="inserir">
                    Habilidade necessária: <i><?= $post['habilidade'] ?></i>
                </form>
            </div>
        </div>
    </main>
<?php } ?>
</body>

</html>