<?php

include('../../php/conversao.php');
require_once("../Model/Usuario.php");
include_once("../DAO/UsuarioDAO.php");
include_once("../Model/Projeto.php");
include_once("../DAO/ProjetoDAO.php");
include_once("../DAO/PostDAO.php");
include_once("../conexao/Conexao.php");
session_start();
if (isset($_SESSION["usuario"])) {
  $usuario = $_SESSION["usuario"];
}

$projetoDAO = new ProjetoDAO();
$postDAO = new PostDAO();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TalentMatch</title>
  <?php include("perfilCss.php"); ?>
  <link rel="stylesheet" href="../../bootstrap/bootstrap.cs">
</head>

<body>
  <?php include_once('../../php/navbar.php') ?>
  <form id="formulario" action="../Controller/UsuarioController.php" method="post" enctype="multipart/form-data">

    <div class="specialInput">
      <img class="place" id="perf" src="../../data/<?php if ($usuario->getFotoPerfil()) {
                                                      echo $usuario->getFotoPerfil();
                                                    } else {
                                                      echo 'perfil_padrao.png';
                                                    } ?>" alt="">
      <input type="file" name="foto" class="hide input-field" id="foto" disabled>
    </div>
    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" class="input-field" value="<?php echo $usuario->getNome(); ?>" disabled><br>

    <label for="email">Email:</label><br>
    <input type="email" name="email" class="input-field" value="<?php echo $usuario->getEmail(); ?>" disabled><br>

    <label for="nomeUsuario">Nome de usuario:</label><br>
    <input type="text" name="nomeUsuario" class="input-field" value="<?php echo $usuario->getNomeUsuario(); ?>" disabled><br>

    <button type="button" class="btn-editar" onclick="editarFormulario()">Editar</button>
    <input type="submit" id="salvar" value="salvar">

    <input type="hidden" value="atualizar" name="tipo">
  </form>



  <button class="open-btn">Abrir Modal</button>



  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#criarProjeto">
    Criar Projeto
  </button>


  <script src="../../bootstrap/bootstrap.js"></script>




  <div class="modal fade" id="criarProjeto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Criar projeto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../Controller/ProjetoController.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              Título: <input type="text" name="titulo" class="form-control" id="progTitle" />
              Descrição: <input type="text" name="descricao" class="form-control" id="progDesc" />
              <input type="hidden" id="detalhesId" name="id" value="200">
              <div class="specialInput">
                <video src="" class="place"></video>
                <input type="file" name="video" class="hide" id="progFile" />
              </div>
              <input type="hidden" name="tipo" value="inserir">
            </div>
            <div class="row">
              <div class="col-md-12 text-right">
                <br>
                <button class="btn btn-primary float-end" type="submit" name="editar">Salvar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>





  <div class="modal fade" id="editarProjeto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar projeto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../Controller/ProjetoController.php" method="POST" enctype="multipart/form-data">
            <div class="row">

              <input type="text" name="titulo" class="titulo" />
              <input type="text" name="descricao" class="descricao" />

              <div class="specialInput">
                <video src="" class="arquivo"></video>
                <input type="file" name="video" class="file" />
              </div>

              <input type="hidden" name="tipo" value="editar">
              <input type="hidden" class="id" name="id">
            </div>
            <div class="row">
              <div class="col-md-12 text-right">
                <br>
                <button class="btn btn-primary float-end" type="submit" name="editar">Salvar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <div class="modal fade" id="visualizarProjeto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-id="" data-titulo="" data-descricao="" data-arquivo="">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">projeto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <h1 class="titulo"></h1>
          <h6 class="descricao"></h6>

          <video class="arquivo" src="" controls></video>

        </div>

        <button class="grid-item" data-bs-toggle="modal" data-bs-target="#editarProjeto" onclick="editarModal()">

      </div>
    </div>
  </div>
  </div>



</body>
<footer>
  <h1>Projetos</h1>
  <div class="grid-container">
    <?php
    $projetos = $projetoDAO->listar($usuario);
    foreach ($projetos as $projeto) {
    ?>
      <button class="grid-item projeto" data-bs-toggle="modal" data-bs-target="#visualizarProjeto" onclick="visualizarModal('<?= $projeto['id'] ?>','<?= $projeto['titulo'] ?>','<?= $projeto['descricao'] ?>', '<?= $projeto['arquivoCaminho'] ?>') ">

        <?= $projeto['titulo'] ?>
      </button>
    <?php } ?>
  </div>
  <div>
    <h1>Post Criar</h1>
    <main class="d-flex justify-content-center">
      <div class="container posts" style="background-color: #E2E2E2; padding: 2em; border-radius: 2em; border-style: solid; width: 60em">
        <div class="header_post row align-items-center" style="padding-left: 1em;">
          <div class="col-auto d-flex flex-wrap align-items-center" style="width: 30px; height: 30px; padding: 0;">
            <img src="../../data/<?php include('../../php/fotoPerfil.php'); ?>" alt="foto_perfil"
              class="d-inline-block align-text-top"
              style="width: 100%; height: 100%; object-fit: fill;">
          </div>
          <div class="col justify-content-start align-items-center">
             <b><?php echo $usuario->getNome()?></b>
            </div> 
          <form action="../Controller/PostController.php" style="padding: 0" method="POST"> <br>
            <label for="titulo" class="fw-bold"> Título:</label> <br><input type="text" name="titulo" class="form-control"> <br>
            <label for="descricao" class="fw-bold">Descrição: </label><br><textarea class="form-control" aria-label="With textarea" name="descricao"></textarea> <br>
            <label for="data" class="fw-bold">Data:</label><br><input type="date" name="date"> <br>
            <label for="pagamento" class="fw-bold"> Pagamento:</label> <br><input type="text" id="pagamento" name="pagamento" placeholder="R$ 0,00"> <br>
            <label for="habilidades" class="fw-bold">Habilidade:</label><br>
            <input type="hidden" name="acao" value="inserir">
            <select name="habilidade" id="habilidades">
              <option value="violao">Violão</option>
              <option value="piano">Piano</option>
              <option value="baixo">Baixo</option>
            </select> <button class="btn btn-primary float-end" type="submit" name="editar">Salvar</button>
            <input type="hidden" name="idUsuario" value="<?= $_SESSION['usuario']->getId() ?>">
          </form>
        </div>
      </div>
    </main>
    <h1>Posts</h1>
    <?php
    $posts = $postDAO->listarPorUsuario($usuario);
    foreach ($posts as $post) {
    ?>
      <main class="d-flex justify-content-center">
        <div class="container posts" style="background-color: #E2E2E2; padding: 2em; border-radius: 2em; border-style: solid; width: 60em">
          <div class="header_post row align-items-center" style="padding-left: 1em;">
            <div class="col-auto d-flex flex-wrap align-items-center" style="width: 30px; height: 30px; padding: 0;">
              <img src="../../data/<?php include('../../php/fotoPerfil.php'); ?>" alt="foto_perfil" class="d-inline-block align-text-top" style="width: 100%; height: 100%; object-fit: fill;">
            </div>
            <div class="col justify-content-start align-items-center">
             <b><?php echo $usuario->getNome()?></b>
            </div> 
            <form  style="padding: 0"><br>
              <h3 for="titulo" class="fw-bold"> <?= $post['titulo'] ?></h3>
              <p> <?= $post['descricao'] ?> </p>
              <span class="fw-bold"><?= formatarData($post['data_'])?></span><br>
              <span class="fw-bold"> Pagamento: <?= formatarParaReal($post['pagamento'])?></span> <br>
              <input type="hidden" name="acao" value="inserir"> 
              Habilidade necessária: <i><?= $post['habilidade']?></i>
            </form>
          </div>
        </div>
      </main>
    <?php } ?>

  </div>

</footer>

<?php include("perfilJs.php"); ?>

</html>/