<div class="modal" id="myModal">
    <div class="modal-content" id="projeto">
        <span class="close-btn" onclick="closeModal()">&times;</span>
    
        <div class="tabs_usuario">
            <button class="tab visualizar" data-target="visualizar-projeto" data-mdl="visualizar" onclick="switchTab(this)">Visualizar</button>
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
    </div>    

    <div class="modal-content" id="post">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <!-- Abas -->
        <div class="tabs">       
            <button class="tab visualizar" data-target="visualizar-post" data-mdl="visualizar" onclick="switchTab(this)">Visualizar</button>
        </div>
        <!-- Conteúdo das abas -->
        <div class="tab-content" id="visualizar-post">
            <h2 class="titulo"></h2>
            <p class="descricao"></p>

            <label for="dataV">Data de evento:</label><p class="data" name="dataV"></p>
            <label for="talentoV">Talento requisitado:</label><p class="habilidade" name="talentoV"></p>
            <label for="pagamentoV">Pagamento:</label><p class="pagamento" name="pagamentoV"></p>
        </div>

        <form action="match.php" method="post">
            <input type="hidden" name="idUsuario" class="userI">
            <input type="hidden" name="idPost" class="postI">
        <button class="match">Match</button>

        </form>
    </div>
</div>
