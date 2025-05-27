<?php
require_once('../Model/Usuario.php');
include_once('../DAO/UsuarioDAO.php');
include_once('../conexao/Conexao.php');
include('../../php/funcoes.php');
session_start();

$usuarioDAO = new UsuarioDAO();
// Dados do usuário logado
$usuario = $_SESSION['usuario'] ?? null;

// Verifica se o formulário foi enviado
if ($usuario && isset($_GET['enviar'])) {
    $distancia = isset($_GET['distancia']) ? intval($_GET['distancia']) : 0;
    $tabela = $_GET['tabela'] ?? 'post';

    $postDistancia = procurarDistancia($usuario, $distancia, $tabela);
    $postFiltrados = postPesquisa($postDistancia, $_GET);
} else {
    $postFiltrados = [];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Posts</title>
</head>
<body>
    <form action="pesquisa.php" method="GET">
        <label>Título: <input type="text" name="titulo"></label><br>

        <label>Habilidade desejada:
            <select name="talento">
                <option value="">--Selecione--</option>
                <option value="Violão">Violão</option>
                <option value="Baixo">Baixo</option>
                <option value="Piano">Piano</option>
            </select>
        </label><br>

        <label>Distância:
            <input type="range" min="0" max="1000" id="inputD" name="distancia" value="500">
            <span id="distancia">500</span> km
        </label><br>

        <label>Pagamento mínimo:
            <input type="text" id="pagamento" name="pagamento" placeholder="R$ 0,00">
        </label><br>

        <input type="hidden" name="tabela" value="post">
        <input type="submit" value="Enviar" name="enviar">
    </form>

    <h2>Resultados da pesquisa</h2>
    <ul>
        <?php if (!empty($postFiltrados)): ?>
            <?php foreach ($postFiltrados as $item): ?>
                <li>
                    <strong><?php echo htmlspecialchars($item['titulo'] ?? 'Sem título'); ?></strong> |
                    Habilidade: <?php echo htmlspecialchars($item['habilidade'] ?? 'Não informado'); ?> |
                    Pagamento: R$ <?php echo number_format(floatval($item['pagamento'] ?? 0), 2, ',', '.'); ?> |
                    Distância: <?php echo round($item['distancia_km'] ?? 0, 1); ?> km
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Nenhum resultado encontrado.</li>
        <?php endif; ?>
    </ul>

    <script>
        const inputRange = document.getElementById('inputD');
        const spanDist = document.getElementById('distancia');
        inputRange.addEventListener('input', () => {
            spanDist.textContent = inputRange.value;
        });

        const pagamentoInput = document.getElementById('pagamento');

        pagamentoInput.addEventListener('input', () => {
            let v = pagamentoInput.value.replace(/\D/g, '');
            if (!v) v = '0';
            v = (parseInt(v, 10) / 100).toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            });
            pagamentoInput.value = v;
        });

        pagamentoInput.addEventListener('focus', () => {
            if (pagamentoInput.value.trim() === '') {
                pagamentoInput.value = 'R$ 0,00';
            }
        });

        pagamentoInput.addEventListener('blur', () => {
            if (pagamentoInput.value === 'R$ 0,00') {
                pagamentoInput.value = '';
            }
        });
    </script>
</body>
</html>
