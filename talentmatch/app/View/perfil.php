<?php
session_start();
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
    </style>
</head>
<body>
<form action="../Model/dadosperfil.php" method="post" enctype="multipart/form-data">
  <input type="text" name="username">
  <input type="file" name="foto">
    <button type="submit">Enviar</button>
</form>

<form id="formulario">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" class="input-field" value="<?php echo $_SESSION['nome']; ?>" disabled><br>


        <label for="email">Email:</label><br>
        <input type="email" id="email" class="input-field" value="<?php echo $_SESSION['email']; ?>" disabled><br>

        <label for="telefone">Nome de usuario:</label><br>
        <input type="text" id="username" class="input-field" disabled><br>

        <button type="button" class="btn-editar" onclick="editarFormulario()">Editar</button>
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
    </script>
</body>
</html>
