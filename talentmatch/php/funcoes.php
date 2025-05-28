<?php

function formatarParaReal($valorEmCentavos)
{
    return 'R$ ' . number_format($valorEmCentavos / 100, 2, ',', '.');
}
function formatarData($dataCompleta)
{
    $data = DateTime::createFromFormat('Y-m-d', $dataCompleta);
    return $data ? $data->format('d/m/y') : '';
}
function procurarDistancia($usuario, $raio, $tabela)
{
    if ($tabela != "projeto" && $raio > 0) {
        $sql = "
        SELECT 
            *,
            (
                6371 * ACOS(
                    COS(RADIANS(:lat_ref)) * COS(RADIANS(latitude)) *
                    COS(RADIANS(longitude) - RADIANS(:lon_ref)) +
                    SIN(RADIANS(:lat_ref)) * SIN(RADIANS(latitude))
                )
            ) AS distancia_km
        FROM $tabela
        HAVING distancia_km <= :raio_km
        ORDER BY distancia_km ASC
    ";

        try {
            $conexao = Conexao::getConexao();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':lat_ref', $usuario->getLatitude());
            $stmt->bindValue(':lon_ref', $usuario->getLongitude());
            $stmt->bindValue(':raio_km', $raio);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erro ao buscar por distância: " . $e->getMessage());
            return [];
        }
    }
    else{
        $sql = "SELECT * FROM $tabela";
          try {
            $conexao = Conexao::getConexao();
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erro ao buscar por distância: " . $e->getMessage());
            return [];
        }
    }
}
function filtrarResultados($resultados, $filtros, $tipo)
{
    $filtros = array_map('trim', $filtros);

    return array_filter($resultados, function ($item) use ($filtros, $tipo) {
        switch ($tipo) {
            case 'post':
                if (!empty($filtros['titulo'])) {
                    $tituloFiltro = mb_strtolower($filtros['titulo']);
                    $tituloItem = mb_strtolower($item['titulo'] ?? '');
                    if (stripos($tituloItem, $tituloFiltro) === false) return false;
                }

                if (!empty($filtros['talento'])) {
                    $filtroTalento = $filtros['talento'];
                    $itemTalento = $item['habilidade'] ?? '';
                    if ($itemTalento !== $filtroTalento) return false;
                }

                if (!empty($filtros['pagamento'])) {
                    $pagamentoStr = str_replace(['R$', ' ', '.', ' '], '', $filtros['pagamento']);
                    $pagamentoStr = str_replace(',', '.', $pagamentoStr);
                    $pagamentoMin = floatval($pagamentoStr);
                    $pagamentoItem = floatval($item['pagamento'] ?? 0);
                    if ($pagamentoItem < ($pagamentoMin * 100)) return false;
                }

                break;

            case 'usuario':
                if (!empty($filtros['nome'])) {
                    $nomeFiltro = mb_strtolower($filtros['nome']);
                    $nomeItem = mb_strtolower($item['nome'] ?? '');
                    if (stripos($nomeItem, $nomeFiltro) === false) return false;
                }
                break;

            case 'projeto':
                if (!empty($filtros['titulo'])) {
                    $tituloFiltro = mb_strtolower($filtros['titulo']);
                    $tituloItem = mb_strtolower($item['titulo'] ?? '');
                    if (stripos($tituloItem, $tituloFiltro) === false) return false;
                }
                break;
        }
        return true;
    });
}
