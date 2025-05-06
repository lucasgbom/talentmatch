<?php
require_once("../Model/Artista.php");
require_once("../Model/Projeto.php");
require_once("../DAO/ProjetoDAO.php");
require_once("../conexao/Conexao.php");
session_start();
$artista = $_SESSION["usuario"];
$projetos = $_SESSION["projetos"];
$projetoDAO = new ProjetoDAO();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Círculo com metade fora</title>
  <?php include("perfilCss.php"); ?>
  <link rel="stylesheet" href="../../bootstrap/bootstrap.cs">
</head>

<body>

  <form id="formulario" action="../Controller/ArtistaController.php" method="post" enctype="multipart/form-data">

    <label for="foto">
      <img id="perf" src="../../data/<?php echo $artista->getFotoPerfil(); ?>" alt="">
    </label>

    <input type="file" name="foto" class="hide input-field" id="foto">


    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" class="input-field" value="<?php echo $artista->getNome(); ?>" disabled><br>


    <label for="email">Email:</label><br>
    <input type="email" name="email" class="input-field" value="<?php echo $artista->getEmail(); ?>" disabled><br>

    <label for="nomeUsuario">Nome de usuario:</label><br>
    <input type="text" name="nomeUsuario" class="input-field" disabled><br>

    <button type="button" class="btn-editar" onclick="editarFormulario()">Editar</button>
    <input type="hidden" id="salvar" value="salvar">
    <input type="hidden" value="atualizar_artista" name="tipo">


  </form>


  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#criarProjeto">
    Criar Projeto
  </button>
  <!-- Estrutura do modal -->
  <!-- <div id="meuModal" class="modal">
        <div class="modal-content" id="unsetted">
          <form action="../Controller/ProjetoController.php" method="post" enctype="multipart/form-data">

            <input type="text" name="titulo">

            <input type="text" name="projDesc">

            <input type="file" name="projeto" />

            <input type="hidden" name="tipo" value="inserir">

            <input type="submit" value="opan">

          </form>

          <button class="close-btn" onclick="fecharModal()">Fechar</button>
        </div>
        <div class="modal-content" id="setted">

          <h2 id="progTitle"></h2>
          <p id="progDesc"></p>

          <img id="progFile" src="" alt="Arquivo do projeto" style="max-width: 200px;">

        </div>
      </div> -->
  <script src="../../bootstrap/bootstrap.js"></script>
  <?php include("perfilJs.php"); ?>
  <div class="modal fade" id="criarProjeto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Criar projeto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../Controller/ProjetoController.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              Título: <input type="text" name="titulo" class="form-control" id="progTitle" />
              Descrição: <input type="text" name="descricao" class="form-control" id="progDesc" />
              Vídeo:<input type="file" name="projeto" class="form-control" id="progFile" />
              <input type="hidden" name="tipo" value="inserir">
            </div>
            <div class="row">
              <div class="col-md-12 text-right">
                <br>
                <input type="hidden" name="id" />
                <button class="btn btn-primary float-end" type="submit" name="editar">Salvar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="detalhesProjeto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar projeto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../Controller/ProjetoController.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              Título: <input type="text" name="titulo" class="form-control" id="detalhesTitle" />
              Descrição: <input type="text" name="descricao" class="form-control" id="detalhesDesc" />
              Vídeo : <video src="" id="detalhesFile" controls width="300"> </video>
              <input type="file" name="projeto" class="form-control" id="detalhesFile" />
              <input type="hidden" name="tipo" value="editar">
            </div>
            <div class="row">
              <div class="col-md-12 text-right">
                <br>
                <input type="hidden" name="id" />
                <button class="btn btn-primary float-end" type="submit" name="editar">Salvar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
<footer>
  <h1>Projetos</h1>

  <div class="grid-container">

    <?php
    $projetos = $projetoDAO->listar($artista);
    foreach ($projetos as $projeto) {
    ?>
      <button class="grid-item" data-bs-toggle="modal" data-bs-target="#detalhesProjeto" onclick="detalhesModal(<?= $projeto['id'] ?>,'<?= $projeto['titulo'] ?>','<?= $projeto['descricao'] ?>', '<?= $projeto['arquivoCaminho'] ?>') ">
        <?= $projeto['titulo'] ?>
      </button>
    <?php } ?>
  </div>

</footer>

</html>