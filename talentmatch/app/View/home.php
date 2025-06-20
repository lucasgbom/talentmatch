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
        <button type="submit" class="search input" title="Pesquisar" name="enviar"><img src="search.png"></button>
        <div class="over">
          <label title="Talento"><img src="musical-note.png" class="icon">
            <select name="talento">
              <option value="">--Selecione--</option>
              <option value="vocalista">Vocalista</option>
              <option value="violao">Violão</option>
              <option value="baixo">Baixo</option>
              <option value="piano">Piano</option>
            </select>
          </label>
          <label title="Pagamento"><img src="profit.png" class="icon">
            <input type="text" id="pagamento" name="pagamento" value="<?= htmlspecialchars($_GET['pagamento'] ?? '') ?>" placeholder="R$ 0,00">
          </label><br>
          <label title="Distância"><img class="icon" src="distance.png">
            <input type="range" min="0" max="1000" id="inputDPost" name="distancia" value="<?= htmlspecialchars($_GET['distancia'] ?? 500) ?>">
            <span id="distanciaPost"><?= htmlspecialchars($_GET['distancia'] ?? 500) ?></span> km
          </label>
        </div>
      </form>
      <main>
        <h1 class="gradiente-texto">Galeria de posts</h1>

        <div class="grid-posts">
          <?php
          if (!isset($_GET['enviar']) || $tipo != "post") {
            $posts = $postDAO->listarTodos();
          } else if ($tipo == "post") {
            $posts = $resFiltrados;
          }
          foreach ($posts as $post) {
          ?>
            <button class="grid-item open-btn" onclick="openModal(this)"
              data-modal="post"
              data-usuario="<?= $usuario->getId(); ?>"
              data-id='<?= $post['id'] ?>'
              data-titulo='<?= $post['titulo'] ?>'
              data-descricao='<?= $post['descricao'] ?>'
              data-data_='<?= formatarData($post['data_']) ?>'
              data-habilidade='<?= $post['habilidade'] ?>'
              data-pagamento='<?= formatarParaReal($post['pagamento']) ?>'>

              <?= $post['titulo'] ?>
            <?php } ?>
        </div>
      </main>

    </div>

    <div class="content usuarios">

      <form action="" method="get" class="search-bar">
        <input type="hidden" name="latitude" class="latitude">
        <input type="hidden" name="longitude" class="longitude">
        <input type="hidden" name="tipo" value="usuario">
        <input type="text" placeholder="Pesquisar..." class="type input" name="nome">
        <button type="button" class="seletor input" title="Filtrar pesquisa"><img src="cardapio.png"></button>
        <button type="submit" class="search input" title="Pesquisar" name="enviar"><img src="search.png"></button>
        <div class="over">

          <label>
            <input type="range" min="0" max="1000" id="inputDUsuario" name="distancia" value="<?= htmlspecialchars($_GET['distancia'] ?? 500) ?>">
            <span id="distanciaUsuario"><?= htmlspecialchars($_GET['distancia'] ?? 500) ?></span> km
          </label>
        </div>
      </form>
      <main>
        <h1 class="gradiente-texto">Usuarios</h1>
        <div class="grid-usuarios">
          <?php if ($tipo == 'usuario' && isset($_GET['enviar'])) {
            $usuarios = $resFiltrados;
          } else {
            $usuarios = $usuarioDAO->listarTodos();
          }
          foreach ($usuarios as $usuario) {
          ?>
            <a href="perfil.php?id=<?= $usuario['id'] ?>" class="link-perfil">
              <div class="poster-card">
                <button class="grid-item open-btn btn-usuario">
                  <div class="poster-content">
                    <img src="../../data/<?= $usuario['fotoPerfil'] ?? 'perfil_padrao.png' ?>" alt="" class="foto-perfil">
                  </div>
                  <div class="poster-title"><?= $usuario['nome'] ?></div>
                </button>
              </div>
            </a>
          <?php } ?>
        </div>
      </main>

    </div>

    <div class="content projetos">

      <form action="" method="get" class="search-bar">
        <input type="hidden" name="latitude" class="latitude">
        <input type="hidden" name="longitude" class="longitude">
        <input type="hidden" name="tipo" value="projeto">
        <input type="text" placeholder="Pesquisar..." class="type input" name="titulo">
        <button type="button" class="seletor input" title="Filtrar pesquisa"><img src="cardapio.png"></button>
        <button type="submit" class="search input" title="Pesquisar" name="enviar"><img src="search.png"></button>
      </form>
      <main>
        <h1 class="gradiente-texto">Projetos</h1>
        <div class="grid-projetos">
          <?php if ($tipo == 'projeto' && isset($_GET['enviar'])) {
            $projetos = $resFiltrados;
          } else {
            $projetos = $projetoDAO->listarTodos();
          }
          foreach ($projetos as $projeto) {
          ?>
            <button class="grid-item open-btn btn-projeto" onclick="openModal(this)" 
            data-modal="projeto" 
            data-titulo="<?= $projeto['titulo'] ?>" 
            data-descricao="<?= $projeto['descricao'] ?>" 
            data-arquivo="<?= $projeto['arquivoCaminho'] ?>"
            data-usuario='<?=json_encode($usuarioDAO->carregar($projeto['idUsuario']))?>'>
              <div class="poster-card">
                <div class="poster-content">
                  <div class="poster-title"><?= $projeto['titulo'] ?></div>
                  <video src="../../data/<?= $projeto['arquivoCaminho'] ?>" class="thumbnail"></video>
                </div>
              </div>
            <?php } ?>
        </div>
      </main>
    </div>

  </div>

</body>

<?php include("homeJs.php");
include("modalJs.php"); ?>

</html>