<?php
require_once("../Model/Artista.php");
session_start();
$artista = $_SESSION["usuario"];
var_dump($artista);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Círculo com metade fora</title>
  <style>
        .input-field {
            background-color: #f0f0f0;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            opacity: 0.7; /* Opacidade inicial */
        }

        .input-field[disabled] {
            opacity: 0.3; /* Opacidade quando desabilitado */
        }

        .hide{display: none;}

        .btn-editar {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-editar:hover {
            background-color: #45a049;
        }

        #perf{width: 100px;
        height: 100px;
    border-radius: 50%;
    object-fit: cover;}
    </style>
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

    <script>
        function editarFormulario() {
            // Seleciona todos os campos de entrada
            const campos = document.querySelectorAll('.input-field');
            
            // Alterna entre habilitar/desabilitar os campos
            campos.forEach(campo => {
                campo.disabled = !campo.disabled;
                campo.style.opacity = campo.disabled ? '0.7' : '1'; // Ajusta a opacidade
            });
        }

        const form = document.getElementById('formulario');
  let formularioAlterado = false;

  // Marca como alterado se algum campo mudar
  form.addEventListener('input', () => {
    document.getElementById("salvar").type = "submit"
  });

  const fileInput = document.querySelector('#foto');
    const profilePic = document.querySelector('#perf');

    fileInput.addEventListener('change', function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          profilePic.src = e.target.result;  // muda a imagem no frontend
        }
        reader.readAsDataURL(file);
      }
    });
    </script>
</body>
</html>
