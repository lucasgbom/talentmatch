<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Perfil - Paulo Victor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .header {
            background-color: #4b1500;
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
        }

        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 20px;
            background: #ccc;
            object-fit: cover;
        }

        .profile-info h1 {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .profile-info p {
            font-size: 14px;
            opacity: 0.8;
        }

        .navbar {
            display: flex;
            background-color: #2a0d00;
        }

        .nav-link {
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            flex: 1;
            text-align: center;
            border-bottom: 3px solid transparent;
            transition: background 0.3s, border-bottom 0.3s;
        }

        .nav-link:hover {
            background-color: #3d1200;
        }

        .nav-link.active {
            border-bottom: 3px solid red;
        }

        .content {
            padding: 20px;
            background-color: #f7f7f7;
        }

        h2 {
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background: #4b1500;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn:hover {
            background: #3d1200;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
        }

        .gallery img {
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .gallery img:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>

    <div class="header">
        <img src="https://via.placeholder.com/100" alt="Perfil" class="profile-pic" id="profile-pic">
        <div class="profile-info">
            <h1 id="profile-name">Paulo Victor</h1>
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
        <p>Nenhum post publicado ainda.</p>
    </div>

    <div class="content" id="projetos" style="display:none;">
        <h2>Projetos</h2>
        <div class="gallery" id="gallery">
            <img src="https://via.placeholder.com/150" onclick="openModal('projeto', this)">
            <img src="https://via.placeholder.com/150/0000FF" onclick="openModal('projeto', this)">
            <img src="https://via.placeholder.com/150/FF0000" onclick="openModal('projeto', this)">
        </div>
    </div>

    <div class="content" id="sobre" style="display:none;">
        <h2>Sobre</h2>
        <p>Informações adicionais sobre o usuário.</p>
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
        let descricaoCompleta = "Paulo Victor é um desenvolvedor apaixonado por tecnologia e inovação, sempre em busca de novos desafios e aprendizados.";

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
