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
            <div class="post-container">
                <h2 class="titulo"></h2>
                <p class="descricao"></p>

                <p class="data"></p>
                <p class="habilidade"></p>
                <p class="pagamento"></p>
            </div>
        </div>
    </div>
    
</div>
