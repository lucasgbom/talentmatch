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
  <link rel="stylesheet" href="../../bootstrap/bootstrap.cs">
  <?php include("perfilCss.php"); ?>
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
    <input type="submit" id="salvar" value="salvar" disabled>

    <input type="hidden" value="atualizar" name="tipo" disabled>
  </form>





  <script src="../../bootstrap/bootstrap.js"></script>


  <button class="open-modal-btn" data-mdl="criar" onclick="openModal(this)">criar projeto</button>


  <div class="modal" id="myModal">
    <div class="modal-content">
      <span class="close-btn" onclick="closeModal()">&times;</span>

      <!-- Abas -->
      <div class="tabs">
        <button class="tab active" data-target="criar-projeto" data-mdl="criar" onclick="switchTab(this)">Criar</button>
        <button class="tab" data-target="visualizar-projeto" data-mdl="visualizar" onclick="switchTab(this)">Visualizar</button>
        <button class="tab" data-target="editar-projeto" data-mdl="editar" onclick="switchTab(this)">Editar</button>
      </div>


      <!-- Conteúdo das abas -->
      <div class="tab-content" id="criar-projeto">
        
        <form action="../Controller/ProjetoController.php" method="POST" enctype="multipart/form-data">
          <input type="text" name="titulo" class="titulo" />
          <textarea name="descricao" rows="4" class="descricao"></textarea>

          <div class="special-input">
            <video src="" class="projeto"></video>
            <input type="file" name="video" class="arquivo" />
          </div>

          <input type="hidden" name="tipo" value="inserir">
          <input type="hidden" class="id" name="id">


          <button type="submit" name="editar">Salvar</button>
        </form>


      </div>

      <div class="tab-content" id="visualizar-projeto">

        <div class="post-container">
          <h2 class="titulo"></h2>
          <p class="descricao"></p>

          <div class="post-video">
            <video src="" class="projeto" controls></video>
          </div>

        </div>
      </div>


      <div class="tab-content" id="editar-projeto">
        <form action="../Controller/ProjetoController.php" method="POST" enctype="multipart/form-data">
          <input type="text" name="titulo" class="titulo" />
          <textarea name="descricao" rows="4" class="descricao"></textarea>

          <div class="special-input">
            <video src="" class="projeto"></video>
            <input type="file" name="video" class="arquivo" />
          </div>

          <input type="hidden" name="tipo" value="editar">
          <input type="hidden" class="id" name="id">


          <button type="submit" name="editar">Salvar</button>
        </form>
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
      <button class="grid-item open-btn" data-mdl="visualizar editar" onclick="openModal(this)" data-id='<?= $projeto['id'] ?>' data-titulo='<?= $projeto['titulo'] ?>' data-descricao='<?= $projeto['descricao'] ?>' data-arquivo='<?= $projeto['arquivoCaminho'] ?>'>

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
            <b><?php echo $usuario->getNome() ?></b>
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
            </select> <button class="btn btn-primary float-end" type="submit" name="editar">Compartilhar</button>
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
      <main class="d-flex justify-content-center" data-matchs="<?= htmlspecialchars(json_encode($postDAO->listarMatch($post['id'])))?>" onclick="match(this)">
        <div class="container posts" style="background-color: #E2E2E2; padding: 2em; border-radius: 2em; border-style: solid; width: 60em">
          <div class="header_post row align-items-center" style="padding-left: 1em;">
            <div class="col-auto d-flex flex-wrap align-items-center" style="width: 30px; height: 30px; padding: 0;">
              <img src="../../data/<?php include('../../php/fotoPerfil.php'); ?>" alt="foto_perfil" class="d-inline-block align-text-top" style="width: 100%; height: 100%; object-fit: fill;">
            </div>
            <div class="col justify-content-start align-items-center">
              <b><?php echo $usuario->getNome() ?></b>
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

  </div>

</footer>

<?php include("perfilJs.php"); ?>

</html>