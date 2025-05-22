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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

    <div class="informacoes">
        <img src="perfil_padrao.png" alt="Foto de Perfil" class="foto_perfil">
        <div class="complementoPessoal">
            <h1>Paulo Victor</h1>
            <p class="descricao" id="descricao">
                <!-- Texto vai ser controlado via JS -->
            </p>
        </div>
    </div>



    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" id="fecharModal">&times;</span>
            <p id="descricaoCompleta"></p>
        </div>
    </div>

    <div class="tab-menu">
        <button class="tablink" onclick="openTab(event, 'inicio')">Início</button>
        <button class="tablink  active" onclick="openTab(event, 'posts')">Posts</button>
        <button class="tablink" onclick="openTab(event, 'projetos')">Projetos</button>
        <button class="tablink" onclick="openTab(event, 'sobre')">Sobre</button>
    </div>

    <!-- Conteúdos -->
    <div id="inicio" class="tab-content active">
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

    <div id="sobre" class="tab-content">
        <h2>Sobre</h2>
        <p>Informações adicionais sobre o freelancer.</p>
    </div>


    <script>
        const descricaoCompleta = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique repellendus necessitatibus libero explicabo eveniet, minima perspiciatis repudiandae quidem reprehenderit labore dicta ipsa obcaecati modi voluptatem nam. Ad saepe fuga nulla!";
        const limiteCaracteres = 50;

        const descricao = document.getElementById('descricao');
        const modal = document.getElementById('modal');
        const descricaoModal = document.getElementById('descricaoCompleta');
        const fecharModal = document.getElementById('fecharModal');

        if (descricaoCompleta.length > limiteCaracteres) {
            const textoCortado = descricaoCompleta.substring(0, limiteCaracteres);
            descricao.innerHTML = `${textoCortado}... <span class="ver-mais" id="abrirModal">mais</span>`;
        } else {
            descricao.textContent = descricaoCompleta;
        }

        // Abrir Modal
        document.addEventListener('click', function(e) {
            if (e.target && e.target.id === 'abrirModal') {
                modal.style.display = 'block';
                descricaoModal.textContent = descricaoCompleta;
            }
        });

        // Fechar Modal
        fecharModal.onclick = function() {
            modal.style.display = 'none';
        }

        // Fechar clicando fora do modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }

        function openTab(evt, tabName) {
            // Esconde todos os conteúdos
            const tabcontent = document.getElementsByClassName("tab-content");
            for (let i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
                tabcontent[i].classList.remove('active');
            }

            // Remove classe active de todos os botões
            const tablinks = document.getElementsByClassName("tablink");
            for (let i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }

            // Mostra a tab atual e adiciona classe active no botão
            document.getElementById(tabName).style.display = "block";
            document.getElementById(tabName).classList.add('active');
            evt.currentTarget.classList.add("active");
        }
    </script>

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
</body>

</html>