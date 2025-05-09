<?php


require_once("../Model/Usuario.php");
include_once("../DAO/UsuarioDAO.php");
include_once("../Model/Projeto.php");
include_once("../DAO/ProjetoDAO.php");
include_once("../conexao/Conexao.php");
session_start();
if (isset($_SESSION["usuario"])) {
  $usuario = $_SESSION["usuario"];
}

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

  <form id="formulario" action="../Controller/UsuarioController.php" method="post" enctype="multipart/form-data">

    <div class="specialInput">
      <img class="place" id="perf" src="../../data/<?php echo $usuario->getFotoPerfil(); ?>" alt="">
      <input type="file" name="foto" class="hide input-field" id="foto">
    </div>
    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" class="input-field" value="<?php echo $usuario->getNome(); ?>" disabled><br>

    <label for="email">Email:</label><br>
    <input type="email" name="email" class="input-field" value="<?php echo $usuario->getEmail(); ?>" disabled><br>

    <label for="nomeUsuario">Nome de usuario:</label><br>
    <input type="text" name="nomeUsuario" class="input-field" value="<?php echo $usuario->getNomeUsuario(); ?>" disabled><br>

    <button type="button" class="btn-editar" onclick="editarFormulario()">Editar</button>
    <input type="submit" id="salvar" value="salvar">

    <input type="hidden" value="atualizar_usuario" name="tipo">
  </form>








  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#criarProjeto">
    Criar Projeto
  </button>
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
              <div class="specialInput">
                <video src="" class="place"></video>
                <input type="file" name="video" class="hide" id="progFile" />
              </div>
              <input type="hidden" name="tipo" value="inserir">
            </div>
            <div class="row">
              <div class="col-md-12 text-right">
                <br>
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
              <video src="" id="detalhesFile" controls> </video>
              <input type="file" name="video" id="video">
              <input type="hidden" name="tipo" value="editar">
              <input type="hidden" id="detalhesId" name="id" value="200">
            </div>
            <div class="row">
              <div class="col-md-12 text-right">
                <br>
                <button class="btn btn-primary float-end" type="submit" name="editar">Salvar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>






  <div class="modal fade" id="viewProjeto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <video src="" id="detalhesFile" controls> </video>
              <input type="file" name="video" id="video">
              <input type="hidden" name="tipo" value="editar">
              <input type="hidden" id="aAAAAAAAAAAAAAAAAAA" name="id" value="200">
            </div>
            <div class="row">
              <div class="col-md-12 text-right">
                <br>
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
    $projetos = $projetoDAO->listar($usuario);
    foreach ($projetos as $projeto) {
    ?>
      <button class="grid-item" data-bs-toggle="modal" data-bs-target="#detalhesProjeto" onclick="detalhesModal(<?= $projeto['id'] ?>,'<?= $projeto['titulo'] ?>','<?= $projeto['descricao'] ?>', '<?= $projeto['arquivoCaminho'] ?>') ">

        <?= $projeto['titulo'] ?>
      </button>
    <?php } ?>
  </div>
</footer>
</html>