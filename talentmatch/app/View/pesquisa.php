<?php
require_once('../Model/Usuario.php');
include_once('../DAO/UsuarioDAO.php');
include_once('../conexao/Conexao.php');
include('../../php/funcoes.php');
session_start();

$usuarioDAO = new UsuarioDAO();
$usuario = $_SESSION['usuario'] ?? null;
if (is_string($usuario)) {
    $usuario = unserialize($usuario);
}

$tipo = $_GET['tipo'] ?? 'post';
$tabelaMap = [
    'post' => 'post',
    'usuario' => 'usuario',
    'projeto' => 'projeto'
];

$tabela = $tabelaMap[$tipo] ?? 'post';
$postFiltrados = [];

if ($usuario && isset($_GET['enviar'])) {
    $distancia = isset($_GET['distancia']) ? intval($_GET['distancia']) : 0;
    $resultados = procurarDistancia($usuario, $distancia, $tabela);
   $postFiltrados = filtrarResultados($resultados, $_GET, $tipo);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pesquisa</title>
</head>
<body>
    <form action="pesquisa.php" method="GET">
        <label>Tipo de busca:
            <select name="tipo" onchange="this.form.submit()">
                <option value="post" <?= $tipo === 'post' ? 'selected' : '' ?>>Post</option>
                <option value="usuario" <?= $tipo === 'usuario' ? 'selected' : '' ?>>Usuário</option>
                <option value="projeto" <?= $tipo === 'projeto' ? 'selected' : '' ?>>Projeto</option>
            </select>
        </label><br><br>

        <?php if ($tipo === 'post'): ?>
            <label>Título: <input type="text" name="titulo" value="<?= htmlspecialchars($_GET['titulo'] ?? '') ?>"></label><br>
            <label>Habilidade:
                <select name="talento">
                    <option value="">--Selecione--</option>
                    <option value="Violão">Violão</option>
                    <option value="Baixo">Baixo</option>
                    <option value="Piano">Piano</option>
                </select>
            </label><br>
            <label>Pagamento mínimo:
                <input type="text" id="pagamento" name="pagamento" value="<?= htmlspecialchars($_GET['pagamento'] ?? '') ?>" placeholder="R$ 0,00">
            </label><br>
        <?php elseif ($tipo === 'usuario'): ?>
            <label>Nome do usuário: <input type="text" name="nome" value="<?= htmlspecialchars($_GET['nome'] ?? '') ?>"></label><br>
        <?php elseif ($tipo === 'projeto'): ?>
            <label>Título do projeto: <input type="text" name="titulo" value="<?= htmlspecialchars($_GET['titulo'] ?? '') ?>"></label><br>
        <?php endif; ?>

        <label>Distância:
            <input type="range" min="0" max="1000" id="inputD" name="distancia" value="<?= htmlspecialchars($_GET['distancia'] ?? 500) ?>">
            <span id="distancia"><?= htmlspecialchars($_GET['distancia'] ?? 500) ?></span> km
        </label><br>

        <input type="submit" value="Enviar" name="enviar">
    </form>

    <h2>Resultados</h2>
    <ul>
        <?php if (!empty($postFiltrados)): ?>
            <?php foreach ($postFiltrados as $item): ?>
                <li>
                    <?php if ($tipo === 'post'): ?>
                        <strong><?= htmlspecialchars($item['titulo'] ?? 'Sem título') ?></strong> |
                        Habilidade: <?= htmlspecialchars($item['habilidade'] ?? '---') ?> |
                        Pagamento: <?= formatarParaReal($item['pagamento'] ?? 0) ?> |
                        Distância: <?= round($item['distancia_km'] ?? 0, 1) ?> km
                    <?php elseif ($tipo === 'usuario'): ?>
                        <strong><?= htmlspecialchars($item['nome'] ?? 'Sem nome') ?></strong> |
                        Distância: <?= round($item['distancia_km'] ?? 0, 1) ?> km
                    <?php elseif ($tipo === 'projeto'): ?>
                        <strong><?= htmlspecialchars($item['titulo'] ?? 'Sem título') ?></strong> |
                        Distância: <?= round($item['distancia_km'] ?? 0, 1) ?> km
                    <?php endif; ?>
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
        if (pagamentoInput) {
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
        }
    </script>
</body>
</html>
