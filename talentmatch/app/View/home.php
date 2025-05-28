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
$usuario2 = $_SESSION["usuario"];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema com Sidebar, Pesquisa e Pôsteres</title>
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #181818;
      color: #fff;
      display: flex;
    }
    /* SIDEBAR */
    .sidebar {
      width: 240px;
      background-color: #0f0f0f;
      padding: 20px 10px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      overflow-y: auto;
    }
    .logo {
      display: flex;
      align-items: center;
      margin-bottom: 30px;
    }
    .logo img {
      width: 30px;
      margin-right: 10px;
    }
    .menu-item {
      display: flex;
      align-items: center;
      padding: 10px;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s;
    }
    .menu-item:hover, .menu-item.active {
      background-color: #272727;
    }
    .menu-item span {
      margin-left: 15px;
      font-size: 14px;
    }
    .section {
      margin-top: 20px;
      border-top: 1px solid #333;
      padding-top: 15px;
    }
    .login-btn {
      margin-top: 10px;
      padding: 8px 12px;
      border: 1px solid #3ea6ff;
      color: #3ea6ff;
      border-radius: 20px;
      font-size: 14px;
      text-align: center;
      cursor: pointer;
      display: inline-block;
      text-decoration: none;
    }
    h4 {
      margin: 10px 0;
      font-size: 12px;
      color: #aaa;
      text-transform: uppercase;
    }

    /* CONTEÚDO PRINCIPAL */
    .main-content {
      margin-left: 260px;
      padding: 20px;
      width: calc(100% - 260px);
    }

    /* INPUT DE PESQUISA */
    .search-bar {
      margin-bottom: 20px;
      display: flex;
    }
    .search-bar input {
      width: 100%;
      padding: 10px 15px;
      border-radius: 30px;
      border: none;
      background-color: #2a2a2a;
      color: #fff;
      font-size: 14px;
      outline: none;
    }

    /* POSTERS */
    .grid-posters {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
    }
    .poster-card {
      background-color: #242424;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
      transition: transform 0.3s;
    }
    .poster-card:hover {
      transform: scale(1.05);
    }
    .poster-img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    .poster-content {
      padding: 10px;
    }
    .poster-title {
      font-size: 14px;
      margin: 10px 0 5px;
      font-weight: bold;
    }
    .poster-desc {
      font-size: 12px;
      color: #ccc;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <div class="logo">
    <img src="https://www.svgrepo.com/show/349402/youtube.svg" alt="Logo">
    <strong>TalentMacht</strong>
  </div>

  <div class="menu-item active">🏠 <span>Início</span></div>
  <div class="menu-item">🎬 <span>Shorts</span></div>
  <div class="menu-item">📺 <span>Inscrições</span></div>

  <div class="section">
    <div class="menu-item">👤 <span>Você</span></div>
    <div class="menu-item">🕘 <span>Histórico</span></div>
  </div>

  <div class="section">
    <p style="font-size: 12px; color: #aaa;">Faça login para curtir vídeos, comentar e se inscrever.</p>
    <a class="login-btn">Fazer login</a>
  </div>

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

<div class="main-content">
  <div class="search-bar">
    <form action="pesquisa.php">
      <input type="text" placeholder="Pesquisar..." name="nome">
    </form>
  </div>

  <h1>Galeria de Pôsteres</h1>
  <div class="grid-posters">
    <div class="poster-card">
      <img class="poster-img" src="https://source.unsplash.com/400x300/?movie" alt="Poster">
      <div class="poster-content">
        <div class="poster-title">Pôster 1</div>
        <div class="poster-desc">Descrição breve do pôster ou filme.</div>
      </div>
    </div>

    <div class="poster-card">
      <img class="poster-img" src="https://source.unsplash.com/400x300/?cinema" alt="Poster">
      <div class="poster-content">
        <div class="poster-title">Pôster 2</div>
        <div class="poster-desc">Descrição breve do pôster ou filme.</div>
      </div>
    </div>

    <div class="poster-card">
      <img class="poster-img" src="https://source.unsplash.com/400x300/?art" alt="Poster">
      <div class="poster-content">
        <div class="poster-title">Pôster 3</div>
        <div class="poster-desc">Descrição breve do pôster ou filme.</div>
      </div>
    </div>

    <div class="poster-card">
      <img class="poster-img" src="https://source.unsplash.com/400x300/?design" alt="Poster">
      <div class="poster-content">
        <div class="poster-title">Pôster 4</div>
        <div class="poster-desc">Descrição breve do pôster ou filme.</div>
      </div>
    </div>

    <div class="poster-card">
      <img class="poster-img" src="https://source.unsplash.com/400x300/?nature" alt="Poster">
      <div class="poster-content">
        <div class="poster-title">Pôster 5</div>
        <div class="poster-desc">Descrição breve do pôster ou filme.</div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
