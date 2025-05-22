<?php

include('../../php/funcoes.php');
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
    <input type="text" name="nome" class="input-field" value="<?= $usuario->getNome(); ?>" disabled><br>

    <label for="email">Email:</label><br>
    <input type="email" name="email" class="input-field" value="<?= $usuario->getEmail(); ?>" disabled><br>

    <label for="nomeUsuario">Nome de usuario:</label><br>
    <input type="text" name="nomeUsuario" class="input-field" value="<?= $usuario->getNomeUsuario(); ?>" disabled><br>

    <button type="button" class="btn-editar" onclick="editarFormulario()">Editar</button>
    <input type="submit" id="salvar" value="salvar" disabled>

    <input type="hidden" value="atualizar" name="tipo" disabled>
  </form>





  <script src="../../bootstrap/bootstrap.js"></script>


  <button class="open-modal-btn" data-tb="criar" data-modal="projeto" onclick="openModal(this)">criar projeto</button>
  <button class="open-modal-btn" data-tb="criar" data-modal="post" onclick="openModal(this)">criar post</button>



  <div class="modal" id="myModal">

    <div class="modal-content" id="projeto">
      <span class="close-btn" onclick="closeModal()">&times;</span>

      <!-- Abas -->
      <div class="tabs">
        <button class="tab criar" data-target="criar-projeto" data-mdl="criar" onclick="switchTab(this)">Criar</button>
        <button class="tab visualizar" data-target="visualizar-projeto" data-mdl="visualizar" onclick="switchTab(this)">Visualizar</button>
        <button class="tab editar" data-target="editar-projeto" data-mdl="editar" onclick="switchTab(this)">Editar</button>
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



    <div class="modal-content" id="post">
      <span class="close-btn" onclick="closeModal()">&times;</span>

      <!-- Abas -->
      <div class="tabs">
        <button class="tab criar" data-target="criar-post" data-mdl="criar" onclick="switchTab(this)">Criar</button>
        <button class="tab visualizar" data-target="visualizar-post" data-mdl="visualizar" onclick="switchTab(this)">Visualizar</button>
        <button class="tab editar" data-target="editar-post" data-mdl="editar" onclick="switchTab(this)">Editar</button>
      </div>


      <!-- Conteúdo das abas -->
      <div class="tab-content" id="criar-post">

        <form action="../Controller/PostController.php" method="POST" enctype="multipart/form-data">
          <input type="text" name="titulo" class="titulo" />
          <textarea name="descricao" rows="4" class="descricao"></textarea>

          <input type="date" name="date">
          <input type="text" id="pagamento" name="pagamento" placeholder="R$ 0,00">

          <input type="hidden" name="acao" value="inserir">
          <select name="habilidade" id="habilidades">
            <option value="violao">Violão</option>
            <option value="piano">Piano</option>
            <option value="baixo">Baixo</option>
          </select>

          <input type="hidden" name="idUsuario" value="<?= $_SESSION['usuario']->getId() ?>">

          <input type="hidden" class="id" name="id">


          <button type="submit" name="editar">Salvar</button>
        </form>


      </div>

      <div class="tab-content" id="visualizar-post">

        <div class="post-container">
          <h2 class="titulo"></h2>
          <p class="descricao"></p>

          <p class="data"></p>
          <p class="habilidade"></p>
          <p class="pagamento"></p>

        </div>
      </div>


      <div class="tab-content" id="editar-post">


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
      <button class="grid-item open-btn" data-tb="visualizar" data-modal="projeto" onclick="openModal(this)" data-id='<?= $projeto['id'] ?>' data-titulo='<?= $projeto['titulo'] ?>' data-descricao='<?= $projeto['descricao'] ?>' data-arquivo='<?= $projeto['arquivoCaminho'] ?>'>

        <?= $projeto['titulo'] ?>
      </button>
    <?php } ?>
  </div>

  <h1>Posts</h1>

  <div class="grid-container">
    <?php
    $posts = $postDAO->listarPorUsuario($usuario);
    foreach ($posts as $post) {
    ?>
      <button class="grid-item open-btn" data-tb="visualizar" data-matchs="<?= htmlspecialchars(json_encode($postDAO->listarMatch($post['id']))) ?> " data-modal="post" onclick="openModal(this)" data-id='<?= $post['id'] ?>' data-titulo='<?= $post['titulo'] ?>' data-descricao='<?= $post['descricao'] ?>' data-data_='<?= $post['data_'] ?>' data-habilidade='<?= $post['habilidade'] ?>' data-pagamento='<?= $post['pagamento'] ?>'>

        <?= $post['titulo'] ?>
      </button>
    <?php } ?>
  </div>

</footer>

<?php include("perfilJs.php"); ?>

</html>