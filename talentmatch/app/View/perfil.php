<?php
include('../conexao/conexao.php');
include('../../php/funcoes.php');
include('../Model/Post.php');
include('../DAO/PostDAO.php');
include('../Model/Projeto.php');
include('../DAO/ProjetoDAO.php');
include('../Model/Usuario.php');
include('../DAO/usuarioDAO.php');
session_start();
$guest = true;
$usuario = $_SESSION['usuario'] ?? new Usuario();
if (isset($_SESSION['usuario'])) {
    $guest = false;
}
$usuarioDAO = new UsuarioDAO();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$usuarioP = $usuarioDAO->buscar('id', $id);

$postDAO = new PostDAO();
$projetoDAO = new ProjetoDAO();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Freelancer</title>
    <?php include('perfilCss.php') ?>
</head>

<body>

    <?php include('modal.php') ?>

    <div class="sidebar">
        <div class="logo">
            <img src="../../assets/talentmatch.png" alt="Não foi possível carregar imagem.">
        </div>
        <div class="section login">
            <?php if ($guest) { ?>
                <p style="font-size: 12px; color: #aaa;">Faça login para achar artistas e oportunidades.</p>
                <a class="login-btn" href="pagina_inicial.php">Fazer login</a>
            <?php } else { ?>
                <a class="login-btn" href="sair.php">Sair</a>
            <?php } ?>
        </div>


        <form class="nav-form" action="home.php" method="get">
            <button name="tipo" value="usuario" type="submit" class="nav-input">
                <div class="menu-item" id="btn_usuarios"><img class="icon" src="../../assets/meuperfil.png"> <span>Usuarios</span></div>
            </button>
            <button name="tipo" value="post" type="submit" class="nav-input">
                <div class="menu-item" id="btn_posts"><img class="icon" src="../../assets/post.png"> <span>Posts</span></div>
            </button>
            <button name="tipo" value="projeto" type="submit" class="nav-input">
                <div class="menu-item" id="btn_projetos"><img class="icon" src="../../assets/music-note.png"> <span>Projetos</span></div>
            </button>
        </form>
        <div class="section">
            <form class="nav-form" action="meuPerfil.php" method="get">
                <button name="tipo" value="perfil" type="submit" class="nav-input">
                    <div class="menu-item"><img class="icon" src="../../assets/meuperfil.png"><span>Você</span></div>
                </button>
                <button name="tipo" value="meus-posts" type="submit" class="nav-input">
                    <div class="menu-item"><img class="icon" src="../../assets/post.png"><span>Meus posts</span></div>
                </button>
                <button name="tipo" value="meus-projetos" type="submit" class="nav-input">
                    <div class="menu-item"><img class="icon" src="../../assets/music-note.png"> <span>Meus projetos</span></div>
                </button>
            </form>
        </div>
    </div>

    <div class="main-content">

        <div class="informacoes">
            <img src="../../data/<?= $usuarioP['fotoPerfil'] ?? "perfil_padrao.png" ?>" alt="Foto de Perfil" class="foto_perfil">
            <div class="complementoPessoal">
                <h1><?= $usuarioP['nome'] ?></h1>
            </div>
        </div>

        <div class="tab-menu">
            <button class="tablink active" data-target="informacoes" onclick="opentab(this)">Informações</button>
            <button class="tablink" data-target="posts" onclick="opentab(this)">Posts</button>
            <button class="tablink" data-target="projetos" onclick="opentab(this)">Projetos</button>
        </div>

        <!-- Conteúdos -->
        <div id="informacoes" class="tab-page active">
            <h2>Início</h2>
            <p>Bem-vindo ao perfil! Aqui fica o resumo principal.</p>
            <p>Email: <?= $usuarioP['email']?></p>
            <p>Telefone: <?= $usuarioP['telefone']?></p>
        </div>

        <div id="posts" class="tab-page">
            <h2>Posts</h2>
            <p>Veja aqui os últimos posts e atualizações.</p>
            <?php
            $posts = $postDAO->buscar('idUsuario', $usuarioP['id']);
            foreach ($posts as $post) { ?>
                <div class="grid-posts">
                    <button class="grid-item open-btn" onclick="openModal(this)"
                        data-modal="post"
                        data-usuario='<?= json_encode($usuarioDAO->carregar($post['idUsuario'])) ?>'
                        data-id_usuario='<?= $usuario->getId() ?>'
                        data-id='<?= $post['id'] ?>'
                        data-titulo='<?= $post['titulo'] ?>'
                        data-descricao='<?= $post['descricao'] ?>'
                        data-data_='<?= formatarData($post['data_']) ?>'
                        data-habilidade='<?= $post['habilidade'] ?>'
                        data-pagamento='<?= formatarParaReal($post['pagamento']) ?>'>

                        <?= $post['titulo'] ?>
                    <?php } ?>
                </div>
                <div id="projetos" class="tab-page">
                    <h2>Projetos</h2>
                    <p>Confira os projetos realizados e em andamento.</p>

                    <?php
                    $projetos = $projetoDAO->buscar('idUsuario', $usuarioP['id']);
                    foreach ($projetos as $projeto) {
                    ?>
                        <button class="grid-item open-btn btn-projeto" onclick="openModal(this)"
                            data-modal="projeto"
                            data-titulo="<?= $projeto['titulo'] ?>"
                            data-descricao="<?= $projeto['descricao'] ?>"
                            data-arquivo="<?= $projeto['arquivoCaminho'] ?>"
                            data-usuario='<?= json_encode($usuarioDAO->carregar($projeto['idUsuario'])) ?>'>
                            <div class="poster-card">
                                <div class="poster-title"><?= $projeto['titulo'] ?></div>
                                <video src="../../data/<?= $projeto['arquivoCaminho'] ?>" class="thumbnail"></video>
                            </div>
                        </button>
                    <?php } ?>
                </div>
        </div>
    </div>
    </div>
</body>
<?php include('perfilJs.php');
include('modalJs.php'); ?>

</html>