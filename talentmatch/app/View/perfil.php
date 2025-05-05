<?php
require_once("../Model/Artista.php");
require_once("../Model/Projeto.php");
session_start();
$artista = $_SESSION["usuario"];
$projetos = $_SESSION["projetos"];

var_dump($projetos);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Círculo com metade fora</title>
  <?php include("perfilCss.php"); ?>
</head>
<body>

<form id="formulario" action="../Controller/ArtistaController.php" method="post" enctype="multipart/form-data">

<label for="foto">
  <img id="perf" src="../../data/<?php echo $artista->getFotoPerfil(); ?>" alt="">
</label>

<input type="file" name="foto" class="hide input-field" id="foto" disabled>


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

   
    <button class="btn-abrir" onclick="abrirModal(0)"> </button>
    <button class="btn-abrir" onclick="abrirModal(1)"> </button>
    <button class="btn-abrir" onclick="abrirModal(2)"> </button>




<!-- Estrutura do modal -->
<div id="meuModal" class="modal">
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
</div>

<?php include("perfilJs.php"); ?>
</body>
</html>
