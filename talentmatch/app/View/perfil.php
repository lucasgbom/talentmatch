<?php
include('../conexao/conexao.php');
include('../../php/funcoes.php');
include('../Model/Post.php');
include('../DAO/PostDAO.php');
include('../Model/Projeto.php');
include('../DAO/ProjetoDAO.php');
include('../Model/Usuario.php');
include('../DAO/usuarioDAO.php');
$usuarioDAO = new UsuarioDAO();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$usuario = $usuarioDAO->buscar('id', $id);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Freelancer</title>

    <style>
         @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .informacoes {
            max-width: 100%;
            background-color:#4D1900;
         
            display: flex;
            align-items: center;
            padding: 30px;
            color: whitesmoke;
        }

        .foto_perfil {
            height: 150px;
            border-radius: 50%;
            margin-right: 100px;
        }

        .complementoPessoal {
            max-width: 500px;
        }

        .descricao {
            margin-top: 10px;
        }

        .ver-mais {
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
        }

        .close {
            color: red;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .tab-menu {
            display: flex;
            background-color: #361200;
        }

        .tab-menu button {
            background-color: inherit;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 20px;
            transition: 0.3s;
            color: white;
            font-size: 16px;
            border-bottom: 3px solid transparent;
        }

        .tab-menu button:hover {
            background-color:rgba(77, 24, 0, 0.69);
        }

        .tab-menu button.active {
            border-bottom: 3px solid red;
            background-color: #222;
        }


        .tab-content {
            display: none;
            padding: 20px;
            background-color: #f1f1f1;
        }

        .tab-content.active {
            display: block;
        }
    </style>
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

        <form class="nav-form"  action="home.php" method="get">
            <button name="tipo" value="post" type="submit" class="nav-input">
                <div class="menu-item" id="btn_posts">💼 <span>Posts</span></div>
            </button>
            <button name="tipo" value="projeto" type="submit" class="nav-input">
                <div class="menu-item" id="btn_projetos">🎵 <span>Projetos</span></div>
            </button>
            <button name="tipo" value="usuario" type="submit" class="nav-input">
                <div class="menu-item" id="btn_usuarios">👤 <span>Usuarios</span></div>
            </button>
        </form>
        <div class="section">
            <form class="nav-form" action="meuPerfil.php" method="get">
                <button name="tipo" value="perfil" type="submit" class="nav-input">
                    <div class="menu-item" >👤<span>Você</span></div>
                </button>
                <button name="tipo" value="meus-posts" type="submit" class="nav-input">
                    <div class="menu-item" >👤<span>Seus posts</span></div>
                </button>
                <button name="tipo" value="meus-projetos" type="submit" class="nav-input">
                    <div class="menu-item" >👤<span>Seus projetos</span></div>
                </button>
            </form>
        </div>
</div>

<div class="main-content">
     <div class="informacoes">
        <img src="perfil_padrao.png" alt="Foto de Perfil" class="foto_perfil">
        <div class="complementoPessoal">
            <h1><?=$usuario['nome']?></h1>
        </div>
    </div>

    <div class="tab-menu">
        <button class="tablink" onclick="openTab(event, 'informacoes')">Informações</button>
        <button class="tablink  active" onclick="openTab(event, 'posts')">Posts</button>
        <button class="tablink" onclick="openTab(event, 'projetos')">Projetos</button>
    </div>

    <!-- Conteúdos -->
    <div id="informacoes" class="tab-content active">
        <h2>Início</h2>
        <p>Bem-vindo ao perfil! Aqui fica o resumo principal.</p>
    </div>

    <div id="posts" class="tab-content">
        <h2>Posts</h2>
        <p>Veja aqui os últimos posts e atualizações.</p>
    </div>

    <div id="projetos" class="tab-content">
        <h2>Projetos</h2>
        <p>Confira os projetos realizados e em andamento.</p>
    </div>
    <?php
    $postDAO = new PostDAO();
    $posts = $postDAO->buscar('idUsuario', $usuario['id']);
    foreach ($posts as $post) {
    ?>

        <h1>Titulo: <?= $post['titulo'] ?></h1>
        <p>Descrição: <?= $post['descricao'] ?></p>
        <p>Data: <?= formatarData($post['data_']) ?></p>
        <p>Pagamento: <?= formatarParaReal($post['pagamento']) ?></p>
    <?php } ?>

    <?php
    $projetoDAO = new ProjetoDAO();
    $projetos = $projetoDAO->buscar('idUsuario', $usuario['id']);
    foreach ($projetos as $projeto) {
    ?>
        <h1>Titulo: <?= $projeto['titulo'] ?></h1>
        <p>Descrição: <?= $projeto['descricao'] ?></p>
        Vídeo: <video controls src="../../data/<?= $projeto['arquivoCaminho'] ?>" class="projeto"></video>
    <?php } ?>
</div>
   
</body>

 <script>
        
</script>

<?php include('perfilCss.php'); include('perfilJs.php'); ?>
</html>