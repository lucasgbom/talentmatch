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
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Perfil - <?= $usuario->getNome() ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include("meuPerfilCss.php"); ?>
    <?php include("perfilCss.php");?>
</head>

<body>

    <div class="header">
        <img src="../../data/<?php echo ($usuario->getFotoPerfil() ?? "perfil_padrao.png"); ?>" alt="Perfil" class="profile-pic" id="profile-pic">
        <div class="profile-info">
            <h1 id="profile-name"><?= $usuario->getNome() ?></h1>
            <p id="descricao"></p>
        </div>
    </div>

    <!-- Modal para descrição completa -->
    <div class="modal" id="modal-descricao">
        <div style="background: white; padding: 20px; border-radius: 8px; max-width: 400px; max-height: 80%; overflow-y: auto;">
            <h3>Descrição Completa</h3>
            <p id="descricao-completa-texto"></p>
            <button onclick="fecharDescricao()" class="btn">Fechar</button>
            <button onclick="editarDescricao()" class="btn">Editar</button>
        </div>
    </div>

    <nav class="navbar">
        <a href="#" class="nav-link active" onclick="showTab('inicio')">Início</a>
        <a href="#" class="nav-link" onclick="showTab('posts')">Posts</a>
        <a href="#" class="nav-link" onclick="showTab('projetos')">Projetos</a>
        <a href="#" class="nav-link" onclick="showTab('sobre')">Sobre</a>
    </nav>

    <div class="content" id="inicio">
        <h2>Início</h2>
        <p>Bem-vindo ao perfil! Aqui fica o resumo principal.</p>
        <button class="btn" onclick="openModal('perfil')">Editar Perfil</button>
    </div>

    <div class="content" id="posts" style="display:none;">
        <h2>Posts</h2>
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
    </div>

    <div class="content" id="projetos" style="display:none;">
        <h2>Projetos</h2>
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
    </div>

    <div class="content" id="sobre" style="display:none;">
        <h2>Informações adicionais</h2>
        <p>Telefone: </p>
        <p>Email: <?= $usuario->getEmail() ?></p>
    </div>

    <!-- Modal genérico -->
    <div class="modal" id="modal">
        <div class="modal-content">
            <h3 id="modal-title">Editar</h3>
            <div id="modal-body">
                <!-- Conteúdo via JS -->
            </div>
            <button class="btn" onclick="saveModal()">Salvar</button>
        </div>
    </div>

    <script>
        let descricaoCompleta = "<?= $usuario->getBiografia() ?>";

        function showTab(tab) {
            const tabs = ['inicio', 'posts', 'projetos', 'sobre'];
            tabs.forEach(t => {
                document.getElementById(t).style.display = t === tab ? 'block' : 'none';
                document.querySelector(`.nav-link[onclick*="${t}"]`).classList.toggle('active', t === tab);
            });
        }

        function openModal(tipo, img = null) {
            const modal = document.getElementById('modal');
            const title = document.getElementById('modal-title');
            const body = document.getElementById('modal-body');

            if (tipo === 'perfil') {
                title.textContent = 'Editar Perfil';
                body.innerHTML = `
                    <label>Nome:</label><br>
                    <input type="text" id="input-nome" value="${document.getElementById('profile-name').textContent}" style="width: 100%; margin-bottom: 10px;"><br>
                    <label>Imagem do Perfil (URL):</label><br>
                    <input type="text" id="input-imagem" value="${document.getElementById('profile-pic').src}" style="width: 100%; margin-bottom: 10px;"><br>
                `;
            } else if (tipo === 'descricao') {
                title.textContent = 'Editar Descrição';
                body.innerHTML = `
                    <label>Descrição:</label><br>
                    <textarea id="editarDescricao" style="width: 100%; height: 80px;">${descricaoCompleta}</textarea>
                `;
            } else if (tipo === 'projeto') {
                title.textContent = 'Postar Projeto';
                body.innerHTML = `
                    <img src="${img.src}" style="width: 100%; border-radius: 8px; margin-bottom: 10px;">
                    <label>Descrição:</label><br>
                    <textarea style="width: 100%; height: 60px;" placeholder="Descreva seu projeto..."></textarea>
                `;
            }

            modal.setAttribute('data-tipo', tipo);
            modal.style.display = 'flex';
        }

        function saveModal() {
            const modal = document.getElementById('modal');
            const tipo = modal.getAttribute('data-tipo');

            if (tipo === 'perfil') {
                const novoNome = document.getElementById('input-nome').value;
                const novaImagem = document.getElementById('input-imagem').value;

                document.getElementById('profile-name').textContent = novoNome;
                document.getElementById('profile-pic').src = novaImagem;
            } else if (tipo === 'descricao') {
                const novaDescricao = document.getElementById('editarDescricao').value;
                descricaoCompleta = novaDescricao;
                renderizarDescricao();
            }

            closeModal();
            alert('Alterações salvas com sucesso!');
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function renderizarDescricao() {
            const descricaoCurta = descricaoCompleta.substring(0, 50) + '... ';
            const mais = '<strong style="color: blue; cursor: pointer;" onclick="abrirDescricaoCompleta()">mais</strong>';
            document.getElementById('descricao').innerHTML = descricaoCurta + mais;
        }

        function abrirDescricaoCompleta() {
            document.getElementById('descricao-completa-texto').innerText = descricaoCompleta;
            document.getElementById('modal-descricao').style.display = 'flex';
        }

        function fecharDescricao() {
            document.getElementById('modal-descricao').style.display = 'none';
        }

        function editarDescricao() {
            fecharDescricao();
            openModal('descricao');
        }

        renderizarDescricao();
    </script>

</body>

</html>