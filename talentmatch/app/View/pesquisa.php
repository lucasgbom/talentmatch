<?php
include('../../php/funcoes.php');
include_once('../Model/Usuario.php');
include_once('../DAO/UsuarioDAO.php');
include_once('../conexao/Conexao.php');
$usuarioDAO = new UsuarioDAO();
$nome = isset($_GET['nome']) ? $_GET['nome'] : '';
$usuarios = $usuarioDAO->buscar('nome', $nome);
session_start();
$usuario = $_SESSION['usuario'];
$usuarios = procurarDistancia($usuario, intval($_GET['distancia']));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
</head>

<body>
    <form action="usuariosLista.php">
        Titulo: <input type="text" name="titutlo"> <br>
        Habilidade desejada: <select name="habilidade" id="">
            <option value="violao">Violão</option>
            <option value="baixo">Baixo</option>
            <option value="piano">Piano</option>
        </select> <br>
        Distancia: <input type="range" min="0" max="1000" id="inputD" name="distancia"> <span id="distancia">500</span> km <br>
        Pagamento minimo: <input type="text" id="pagamento" name="pagamento" placeholder="R$ 0,00"> <br>
        <input type="submit" value="Enviar" name="enviar">
    </form>
    <h1>Usuarios: </h1>
    <?php
    foreach ($usuarios as $usuario) {
    ?>
        <a href="perfil.php?id=<?= $usuario['id'] ?>">
            <h2><?= $usuario['nome'] ?></h2>
        </a> <br>
    <?php } ?>
    <h1>Posts: </h1>
    <script>
        var $range = document.querySelector('#inputD'),
            $value = document.querySelector('#distancia');

        $range.addEventListener('input', function() {
            $value.textContent = this.value;
        });
        const input = document.getElementById('pagamento');

        input.addEventListener('input', () => {
            let v = input.value.replace(/\D/g, '');
            if (v === '') v = '0';

            v = (parseInt(v, 10) / 100).toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            });

            input.value = v;
        });

        input.addEventListener('focus', () => {
            if (input.value.trim() === '') {
                input.value = 'R$ 0,00';
            }
        });

        input.addEventListener('blur', () => {
            if (input.value === 'R$ 0,00') {
                input.value = '';
            }
        });
    </script>
</body>

</html>