
    <div class="header">
        <img src="../../data/<?php echo ($usuario->getFotoPerfil() ?? "perfil_padrao.png"); ?>" alt="Perfil" class="profile-pic" id="profile-pic">
        <div class="profile-info">
            <h1 id="profile-name"><?= $usuario->getNome() ?></h1>
            <p id="descricao"></p>
        </div>
    </div>

    <!-- Modal para descrição completa -->
    <div class="modal" id="modal-descricao" style="display: none;">
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

    <div class="content" id="posts" style="display: none;">
        <h2>Posts</h2>
        <button class="open-modal-btn" data-tb="criar" data-modal="post" onclick="openModalItem(this)">criar post</button> <br><br>
        <div class="grid-container">
            <?php
            $posts = $postDAO->listarPorUsuario($usuario);
            foreach ($posts as $post) {
            ?>
                <button class="grid-item open-btn" data-tb="visualizar" data-matchs="<?= htmlspecialchars(json_encode($postDAO->listarMatch($post['id']))) ?> " data-modal="post" onclick="openModalItem(this)" data-id='<?= $post['id'] ?>' data-titulo='<?= $post['titulo'] ?>' data-descricao='<?= $post['descricao'] ?>' data-data_='<?= $post['data_'] ?>' data-habilidade='<?= $post['habilidade'] ?>' data-pagamento='<?= $post['pagamento'] ?>'>

                    <?= $post['titulo'] ?>
                </button>
            <?php } ?>
        </div>
    </div>

    <div class="content" id="projetos" style="display:none;">
        <h2>Projetos</h2>
        <button class="open-modal-btn" data-tb="criar" data-modal="projeto" onclick="openModalItem(this)">criar projeto</button> <br> <br>
        <div class="grid-container">
            <?php
            $projetos = $projetoDAO->listar($usuario);
            foreach ($projetos as $projeto) {
            ?>
                <button class="grid-item open-btn" data-tb="visualizar" data-modal="projeto" onclick="openModalItem(this)" data-id='<?= $projeto['id'] ?>' data-titulo='<?= $projeto['titulo'] ?>' data-descricao='<?= $projeto['descricao'] ?>' data-arquivo='<?= $projeto['arquivoCaminho'] ?>'>

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
    <!-- Modal Luis (usuario) -->
    <div class="modal" id="modal">
        <div class="modal-content">
            <h3 id="modal-title">Editar</h3>
            <div id="modal-body">

            </div>
            <button class="btn" onclick="saveModal()">Salvar</button>
        </div>
    </div>
