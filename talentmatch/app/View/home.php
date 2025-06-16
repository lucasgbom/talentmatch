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
$guest = false;
$postDAO = new PostDAO();
$usuarioDAO = new UsuarioDAO();
$projetoDAO = new ProjetoDAO();
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
} else {
  $guest = true;
  $usuario = new Usuario();
  $usuario->setLatitude($_GET['latitude'] ?? "");
  $usuario->setLongitude($_GET['longitude'] ?? "");
}
$tipo = $_GET['tipo'] ?? 'post';


$resFiltrados = [];
if ($usuario && isset($_GET['enviar'])) {
  $distancia = isset($_GET['distancia']) ? intval($_GET['distancia']) : 0;
  $resultados = procurarDistancia($usuario, $distancia, $tipo);
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
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>

<body>

  <div class="sidebar">
    <div class="logo">
      <img src="talentmatch.png" alt="Não foi possível carregar imagem.">
    </div>
    <div class="section">
      <?php if ($guest) { ?>
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
    </div>
  </div>


  <div class="main-content">

    <?php include('modal.php') ?>


    <div class="content posts shown">
      <form action="" method="get" class="search-bar">
        <input type="hidden" name="latitude" class="latitude">
        <input type="hidden" name="longitude" class="longitude">
        <input type="hidden" name="tipo" value="post">
        <input type="text" placeholder="Pesquisar..." class="type input" name="titulo">
        <button type="button" class="seletor input" title="Filtrar pesquisa"><img src="cardapio.png"></button>
        <button type="submit" class="search input" title="Pesquisar" name="enviar" value="asd"><img src="search.png"></button>
        <div class="over">
          <label>Habilidade:
            <select name="talento">
              <option value="">--Selecione--</option>
              <option value="vocalista">Vocalista</option>
              <option value="violao">Violão</option>
              <option value="baixo">Baixo</option>
              <option value="piano">Piano</option>
            </select>
          </label>
          <label>Pagamento mínimo:
            <input type="text" id="pagamento" name="pagamento" value="<?= htmlspecialchars($_GET['pagamento'] ?? '') ?>" placeholder="R$ 0,00">
          </label><br>
          <label>Distância:
            <input type="range" min="0" max="1000" id="inputD" name="distancia" value="<?= htmlspecialchars($_GET['distancia'] ?? 500) ?>">
            <span id="distancia"><?= htmlspecialchars($_GET['distancia'] ?? 500) ?></span> km
          </label>
        </div>
      </form>

      <h1>Galeria de posts</h1>

      <div class="grid-posts">
        <?php
        if (!isset($_GET['enviar'])) {
          $posts = $postDAO->listarTodos();
        } else {
          $posts = $resFiltrados;
        }
        foreach ($posts as $post) {
        ?>
          <button class="grid-item open-btn" data-modal="post" onclick="openModal(this)" data-id='<?= $post['id'] ?>' data-titulo='<?= $post['titulo'] ?>' data-descricao='<?= $post['descricao'] ?>' data-data_='<?= formatarData($post['data_']) ?>' data-habilidade='<?= $post['habilidade'] ?>' data-pagamento='<?= formatarParaReal($post['pagamento']) ?>'>

            <?= $post['titulo'] ?>
          <?php } ?>
      </div>
    </div>

    <div class="content usuarios">

      <form action="" method="get" class="search-bar">
        <input type="hidden" name="latitude" class="latitude">
        <input type="hidden" name="longitude" class="longitude">
        <input type="hidden" name="tipo" value="usuario">
        <input type="text" placeholder="Pesquisar..." class="type" name="nome">
        <input type="button" value="seletor" class="seletor">
        <input type="submit" name="enviar" class="search">
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
          $usuarios = $resFiltrados;
        } else {
          $usuarios = $usuarioDAO->listarTodos();
        }
        foreach ($usuarios as $usuario) {
        ?>
          <div class="poster-card">
            <div class="poster-content">
              <div class="poster-title"><?= $usuario['nome'] ?></div>
              <div class="poster-desc">Distância: <?= round($usuario['distancia_km'] ?? 0, 1) ?> km </div>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>

    <div class="content projetos">

      <form action="" method="get" class="search-bar">
        <input type="hidden" name="tipo" value="projeto">
        <input type="hidden" name="latitude" class="latitude">
        <input type="hidden" name="longitude" class="longitude">
        <input type="text" placeholder="Pesquisar..." class="type" name="titulo">
        <input type="button" value="seletor" class="seletor">
        <input type="submit" value="Enviar" name="enviar" class="search">
      </form>

      <h1>Projetos</h1>
      <div class="grid-projetos">
        <?php if ($tipo == 'projeto') {
          $projetos = $resFiltrados;
        } else {
          $projetos = $projetoDAO->listarTodos();
        }
        foreach ($projetos as $projeto) {
        ?>
          <div class="poster-card">
            <div class="poster-content">
              <div class="poster-title"><?= $projeto['titulo'] ?></div>
              <video src="../../data/<?= $projeto['arquivoCaminho'] ?>" width=""></video>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

</body>

<?php include("homeJs.php");
include("modalJs.php") ?>

</html>