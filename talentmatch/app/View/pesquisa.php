<?php
require_once('../Model/Usuario.php');
include_once('../DAO/UsuarioDAO.php');
include_once('../conexao/Conexao.php');
include('../../php/funcoes.php');
session_start();
$usuarioDAO = new UsuarioDAO();
$nome = isset($_GET['nome']) ? $_GET['nome'] : '';
$usuarios = $usuarioDAO->buscar('nome', $nome);
$_GET['distancia'] = isset($_GET['distancia'])? $_GET['distancia'] : 0;
$usuario = $_SESSION['usuario'];

if(isset($_SESSION['retorno'])){
    $retorno = $_SESSION['retorno'];
}

$pesquisas = [];

foreach ($_GET as $chave => $valor) {
    if (!empty($valor)) {
        $pesquisas[$chave] = $valor;
    }
}
$usuariosDistancia = procurarDistancia($usuario , intval($_GET['distancia']), $_GET['tabela']);
var_dump($usuariosDistancia);
if(!empty($usuariosDistancia)){
postPesquisa($usuariosDistancia, $pesquisas);
}
//$resultadoPesquisa = postPesquisa($resultadoDistancia, $pesquisas);

var_dump($usuariosDistancia);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
</head>

<body>
    <form action="pesquisa.php" method="GET">
        <input type="text" name="titulo">
        Habilidade desejada: <select name="talento">
            
            <option value="Violão">Violão</option>
            <option value="Baixo">Baixo</option>
            <option value="Piano">Piano</option>
        </select> <br>
        Distancia: <input type="range" min="0" max="1000" id="inputD" name="distancia"> <span id="distancia">500</span> km <br>
        Pagamento minimo: <input type="text" id="pagamento" name="pagamento" placeholder="R$ 0,00"> <br>
        <input type="hidden" name="tabela" value="post">
        <input type="submit" value="Enviar" name="enviar">
    </form>
    <?php
    foreach ($usuarios as $usuario) {
    ?>
        <a href="perfil.php?id=<?= $usuario['id'] ?>">
            <h2><?= $usuario['nome'] ?></h2>
        </a> <br>
    <?php } ?>
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