<?php

include_once('../conexao/conexao.php');
require_once('../Model/Usuario.php');
include_once('../DAO/UsuarioDAO.php');
include_once('../Model/Post.php');
include_once('../DAO/PostDAO.php');
include_once('../Model/Projeto.php');
include_once('../DAO/ProjetoDAO.php');
include_once('../../php/funcoes.php');
session_start();
$postDAO = new PostDAO();
$usuarioDAO = new UsuarioDAO();
$usuario = $_SESSION["usuario"] ?? "";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema com Sidebar, Pesquisa e postes</title>
  <?php include("homeCss.php"); ?>
  <style>

  </style>
</head>

<body>

  <div class="sidebar">
    <div class="logo">
      <img src="logo.png" alt="Não foi possível carregar imagem.">
      <strong>TalentMacht</strong>
    </div>
    <div class="section">
      <p style="font-size: 12px; color: #aaa;">Faça login para achar artistas e oportunidades.</p>
      <a class="login-btn" href="pagina_inicial.php">Fazer login</a>
    </div> <br>

    <div class="menu-item" id="btn_posts" data-target="posts" onclick="switchContent(this)">💼 <span>Posts</span></div>
    <div class="menu-item" id="btn_projetos" data-target="projetos" onclick="switchContent(this)">🎵 <span>Projetos</span></div>
    <div class="menu-item" id="btn_usuarios" data-target="usuarios" onclick="switchContent(this)">👤 <span>Usuarios</span></div>
    <div class="section">
      <a href="meuPerfil.php">
        <div class="menu-item">👤 <span>Você</span></div>
      </a>



      <div class="section">
        <h4>Explorar</h4>
        <div class="menu-item">🔥 <span>Em alta</span></div>
        <div class="menu-item">🛍️ <span>Shopping</span></div>
        <div class="menu-item">🎵 <span>Música</span></div>
        <div class="menu-item">🎞️ <span>Filmes</span></div>
        <div class="menu-item">📡 <span>Ao vivo</span></div>
        <div class="menu-item">🎮 <span>Jogos</span></div>
        <div class="menu-item">📰 <span>Notícias</span></div>
        <div class="menu-item">🏆 <span>Esportes</span></div>
        <div class="menu-item">🎓 <span>Cursos</span></div>
        <div class="menu-item">🎙️ <span>Podcasts</span></div>
      </div>
    </div>
  </div>





  <div class="main-content">
    <div class="content posts shown">
      <div class="search-bar">
        <input type="text" placeholder="Pesquisar...">
        <div class="seletor"><div class="seletor-content"><form action="" class="seletor-form"><input type="text"><br><input type="text"></form></div></div>
      </div>
      <h1>Galeria de posts</h1>
      <div class="grid-posts">
        <?php
        if (!isset($_GET['enviarPosts'])) {
          $posts = $postDAO->listarHome($usuario);
        }
        foreach ($posts as $post) {
        ?>
          <div class="poster-card">
            <div class="poster-content">
              <div class="poster-title"><?= $post['titulo'] ?></div>
              <div class="poster-desc"><?= $post['descricao'] ?></div>
              <div class="poster-desc"><?= formatarParaReal($post['pagamento']) ?></div>
              <?php if (isset($post['distancia'])) echo('')?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <div class="content usuarios">

      <div class="search-bar">
        <input type="text" placeholder="Pesquisar...">
      </div>

      <h1>usuarioooooooooos</h1>
      <div class="grid-usuarios">
        tynytyjyjyujuykuk
      </div>

    </div>

    <div class="content projetos">

      <div class="search-bar">
        <input type="text" placeholder="Pesquisar...">
      </div>

      <h1>projetoooooooooo</h1>
      <div class="grid-projetos">
        erregrrvrvrttr
      </div>
    </div>

  </div>

</body>

<?php include("homeJs.php") ?>

</html>