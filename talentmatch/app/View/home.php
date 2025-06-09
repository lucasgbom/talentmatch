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
$projetoDAO = new ProjetoDAO();
$usuario = $_SESSION['usuario'] ?? null;

$tipo = $_GET['tipo'] ?? 'post';
$tabela = $tipo;
$resFiltrados = [];
if ($usuario && isset($_GET['enviar'])) {
  $distancia = isset($_GET['distancia']) ? intval($_GET['distancia']) : 0;
  $resultados = procurarDistancia($usuario, $distancia, $tabela);
  $resFiltrados = filtrarResultados($resultados, $_GET, $tipo);
}
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
      <?php if (!$usuario) { ?>
        <p style="font-size: 12px; color: #aaa;">Faça login para achar artistas e oportunidades.</p>
        <a class="login-btn" href="pagina_inicial.php">Fazer login</a>
      <?php } else { ?>
        <a class="login-btn" href="sair.php">Sair</a>
      <?php } ?>
    </div>
    <br>
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
      <form action="" method="get" class="search-bar">
        <input type="hidden" name="tipo" value="post">
        <input type="text" placeholder="Pesquisar..." class="type" name="titulo">
        <input type="button" value="seletor" class="seletor">
        <input type="submit" value="Enviar" name="enviar" class="search">
        <div class="over">
          <label>Habilidade:
            <select name="talento">
              <option value="">--Selecione--</option>
              <option value="violao">Violão</option>
              <option value="baixo">Baixo</option>
              <option value="piano">Piano</option>
            </select>
          </label>
          <label>Distância:
            <input type="range" min="0" max="1000" id="inputD" name="distancia" value="<?= htmlspecialchars($_GET['distancia'] ?? 500) ?>">
            <span id="distancia"><?= htmlspecialchars($_GET['distancia'] ?? 500) ?></span> km
          </label>
        </div>
      </form>


      <h1>Galeria de posts</h1>
      <div class="grid-posts">
        <?php
        if (!$usuario) {
          $posts = $postDAO->listarTodos();
        } else if ($tipo != 'post' || !isset($_GET['enviar'])) {
          $posts = $postDAO->listarHome($usuario);
        } else if (isset($_GET['enviar']) && $tipo == "post") {
          $posts = $resFiltrados;
        }
        foreach ($posts as $post) {
        ?>
          <div class="poster-card">
            <div class="poster-content">
              <div class="poster-title"><?= $post['titulo'] ?></div>
              <div class="poster-desc"><?= $post['descricao'] ?></div>
              <div class="poster-desc"><?= formatarParaReal($post['pagamento']) ?></div>
              <div class="poster-desc">Distância: <?= round($post['distancia_km'] ?? 0, 1) ?> km </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <div class="content usuarios">

      <form action="" method="get" class="search-bar">
        <input type="hidden" name="tipo" value="usuario">
        <input type="text" placeholder="Pesquisar..." class="type" name="nome">
        <input type="button" value="seletor" class="seletor">
        <input type="submit" value="Enviar" name="enviar" class="search">
        <div class="over">
          <label>Distância:
            <input type="range" min="0" max="1000" id="inputD" name="distancia" value="<?= htmlspecialchars($_GET['distancia'] ?? 500) ?>">
            <span id="distancia"><?= htmlspecialchars($_GET['distancia'] ?? 500) ?></span> km
          </label>
        </div>
      </form>

      <h1>Usuarios</h1>
      <div class="grid-usuarios">
        <?php if ($tipo == 'usuario') {
          var_dump($resFiltrados);
          $usuarios = $resFiltrados;
        } else {
          $usuarios = $usuarioDAO->listarTodos();
        }
        foreach ($usuarios as $usuario) {
        ?>
          <div class="poster-card">
            <div class="poster-content">
              <div class="poster-title"><?= $usuario['id'] ?></div>
              <div class="poster-desc">Distância: <?= round($usuario['distancia_km'] ?? 0, 1) ?> km </div>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>

    <div class="content projetos">

      <div class="search-bar">
        <input type="text" placeholder="Pesquisar...">
      </div>

      <h1>Projetos</h1>
      <div class="grid-projetos">
        <?php if ($tipo == 'projeto') {
          var_dump($resFiltrados);
          $projetos = $resFiltrados;
        } else {
          $projetos = $projetoDAO->listarTodos();
        }
        foreach ($projetos as $projeto) {
        ?>
          <div class="poster-card">
            <div class="poster-content">
              <div class="poster-title"><?= $projeto['titulo'] ?></div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

  </div>

</body>

<?php include("homeJs.php") ?>

</html>