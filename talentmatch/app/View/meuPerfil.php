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
} else {
    header("location: pagina_inicial.php");
}
$projetoDAO = new ProjetoDAO();
$postDAO = new PostDAO();
$temLocalizacao = false;
$temLocalizacaoU = false;
$latitudeU = 0;
$longitudeU = 0;
if ($usuario->getLongitude() !== null && $usuario->getLatitude() !== null) {
    $temLocalizacaoU = true;
    $latitudeU = $usuario->getLatitude();
    $longitudeU = $usuario->getLongitude();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Perfil - <?= $usuario->getNome() ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <?php include("meuPerfilCss.php"); ?>
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
    <div class="menu-item" id="btn_posts">💼 <span>Posts</span></div>
    <div class="menu-item" id="btn_projetos">🎵 <span>Projetos</span></div>
    <div class="menu-item" id="btn_usuarios">👤 <span>Usuarios</span></div>
    <div class="section">
      <a href="meuPerfil.php">
        <div class="menu-item">👤<span>Você</span></div>
      </a>
    </div>
  </div>

<div class="main-content">
    <div class="header">
        <img src="../../data/<?php echo ($usuario->getFotoPerfil() ?? "perfil_padrao.png"); ?>" alt="Perfil" class="profile-pic" id="profile-pic">
        <div class="profile-info">
            <h1 id="profile-name"><?= $usuario->getNome() ?></h1>
            <p id="descricao"></p>
        </div>
    </div>

    <nav class="navbar">
        <a href="#" class="nav-link active" onclick="showTab('informacoes')">Informações</a>
        <a href="#" class="nav-link" onclick="showTab('posts')">Posts</a>
        <a href="#" class="nav-link" onclick="showTab('projetos')">Projetos</a>
    </nav>

    <div class="content" id="informacoes">
        <h2>Início</h2>
        <p>Bem-vindo ao perfil! Aqui fica o resumo principal.</p> <br>

        <form id="formulario" action="../Controller/UsuarioController.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="tipo" value="atualizar">
            <input type="hidden" name="id">
            <div id="informacoes-tab">
                <!-- Coluna 1: Inputs -->
                <div style="flex: 1;">
                    <div class="special-input">
                        <img class="place input-field" id="perf" src="../../data/<?php if ($usuario->getFotoPerfil()) {
                                                                            echo $usuario->getFotoPerfil();
                                                                        } else {
                                                                            echo 'perfil_padrao.png';
                                                                        } ?>" alt="" disabled>
                        <input type="file" name="foto" class="hide" id="foto" disabled>
                    </div>

                    <label for="nome">Nome:</label><br>
                    <input type="text" name="nome" class="input-field" value="<?= $usuario->getNome(); ?>" disabled><br>

                    <label for="email">Email:</label><br>
                    <input type="email" name="email" class="input-field" value="<?= $usuario->getEmail(); ?>" disabled><br>

                    <label for="nomeUsuario">Nome de usuario:</label><br>
                    <input type="text" name="nomeUsuario" class="input-field" value="<?= $usuario->getNomeUsuario(); ?>" disabled><br>

                    <button type="button" class="btn-editar" onclick="editarFormulario()">Editar</button>
                    <input type="submit" id="salvar" value="salvar">
                </div>
                <!-- Coluna 2: Mapa -->
                <div id="map-content" style="flex: 2;">
                    <h2>Mapa de Localização</h2>
                    <div id="mapU" style="width: 100%; height: 300px; background-color: #ccc;"></div>
                    <button onclick="getLocationU()" type="button">Usar localização atual</button>
                    <input type="hidden" name="lat" id='latU' value="">
                    <input type="hidden" name="lon" id='lonU' value="">
                    <input type="hidden" name="acao" id='acao' value="atualizar">
                </div>

            </div>

            <input type="hidden" value="atualizar" name="tipo" disabled>
        </form>

    </div>

    <div class="content" id="posts">
        <h2>Posts</h2>
        <br><br>
        <div class="grid-container">
            <button class="open-modal-btn create-btn" data-tb="criar" data-modal="post" onclick="openModal(this)">criar post</button>
            <?php
            $posts = $postDAO->listarPorUsuario($usuario);
            foreach ($posts as $post) {
            ?>
                <button class="grid-item open-btn" data-tb="visualizar" data-matchs="<?= htmlspecialchars(json_encode($postDAO->listarMatch($post['id']))) ?> " data-modal="post" onclick="openModal(this)" data-id='<?= $post['id'] ?>' data-titulo='<?= $post['titulo'] ?>' data-descricao='<?= $post['descricao'] ?>' data-data_='<?= $post['data_'] ?>' data-habilidade='<?= $post['habilidade'] ?>' data-pagamento='<?= $post['pagamento'] ?>'>

                    <?= $post['titulo'] ?>
                </button>
            <?php } ?>
        </div>
    </div>

    <div class="content" id="projetos" style="display:none;">
        <h2>Projetos</h2>
        <div class="grid-container">

            <button class="open-modal-btn create-btn" data-tb="criar" data-modal="projeto" onclick="openModal(this)">criar projeto</button>
            <?php
            $projetos = $projetoDAO->listar($usuario);
            foreach ($projetos as $projeto) {
            ?>
                <button class="grid-item open-btn" data-tb="visualizar" data-modal="projeto" onclick="openModal(this)" data-id='<?= $projeto['id'] ?>' data-titulo='<?= $projeto['titulo'] ?>' data-descricao='<?= $projeto['descricao'] ?>' data-arquivo='<?= $projeto['arquivoCaminho'] ?>'>

                    <?= $projeto['titulo'] ?>
                </button>
            <?php } ?>
        </div>
    </div>



    <div class="modal" id="myModal">
        <div class="modal-content" id="projeto">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <!-- Abas -->
            <div class="tabs_usuario">
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
                    <div>
                        <input type="text" name="titulo" class="titulo" />
                        <textarea name="descricao" rows="4" class="descricao"></textarea>

                        <div class="special-input">
                            <video src="" class="projeto"></video>
                            <input type="file" name="video" class="arquivo" />
                        </div>

                        <input type="hidden" name="tipo" value="editar">
                        <input type="hidden" class="id" name="id">


                        <button type="submit" name="editar">Salvar</button>
                    </div>
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

                    <input type="date" name="date" id="dataI" max = "2100-12-30">
                    <input type="text" id="pagamento" name="pagamento" placeholder="R$ 0,00">

                    <input type="hidden" name="acao" value="inserir">
                    <select name="habilidade" id="habilidades">
                        <option value="vocalista">Vocalista</option>
                        <option value="violao">Violão</option>
                        <option value="piano">Piano</option>
                        <option value="baixo">Baixo</option>
                    </select>
                    <?php include("../../../teste/criar.php"); ?>
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
</div>


    <?php include("meuPerfilJs.php"); ?>
    <?php include("../../../teste/criarjs.php"); ?>
</body>

</html>