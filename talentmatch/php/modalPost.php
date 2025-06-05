    <div class="modal" id="myModal">

        <div class="modal-content" id="projeto">
            <span class="close-btn" onclick="closeModalItem()">&times;</span>

            <!-- Abas -->
            <div class="tabs">
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
                    <input type="text" name="titulo" class="titulo" />
                    <textarea name="descricao" rows="4" class="descricao"></textarea>

                    <div class="special-input">
                        <video src="" class="projeto"></video>
                        <input type="file" name="video" class="arquivo" />
                    </div>

                    <input type="hidden" name="tipo" value="editar">
                    <input type="hidden" class="id" name="id">


                    <button type="submit" name="editar">Salvar</button>
                </form>
            </div>


        </div>
        <div class="modal-content" id="post">
            <span class="close-btn" onclick="closeModalItem()">&times;</span>
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

                    <input type="date" name="date">
                    <input type="text" id="pagamento" name="pagamento" placeholder="R$ 0,00">

                    <input type="hidden" name="acao" value="inserir">
                    <select name="habilidade" id="habilidades">
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