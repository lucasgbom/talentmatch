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
function postPesquisa($resultados, $filtros)
{
    // Normaliza os filtros
    $filtros = array_map('trim', $filtros);

    return array_filter($resultados, function ($item) use ($filtros) {
        // Filtrar por título (ignorar se estiver vazio)
        if (!empty($filtros['titulo'])) {
            $tituloFiltro = mb_strtolower($filtros['titulo']);
            $tituloItem = mb_strtolower($item['titulo'] ?? '');
            if (stripos($tituloItem, $tituloFiltro) === false) {
                return false;
            }
        }

        // Filtrar por talento (habilidade), normalizando acentos
        if (!empty($filtros['talento'])) {
            $filtroTalento = normalizarTexto($filtros['talento']);
            $itemTalento = normalizarTexto($item['habilidade'] ?? '');
            if ($itemTalento !== $filtroTalento) {
                return false;
            }
        }

        // Filtrar por pagamento mínimo
        if (!empty($filtros['pagamento'])) {
            $pagamentoStr = str_replace(['R$', ' ', '.', ' '], '', $filtros['pagamento']);
            $pagamentoStr = str_replace(',', '.', $pagamentoStr);
            $pagamentoMin = floatval($pagamentoStr);
            // Valor do banco já em centavos
            $pagamentoItem = floatval($item['pagamento'] ?? 0);
            // Compara pagamento no banco (centavos) com filtro convertido em centavos
            if ($pagamentoItem < ($pagamentoMin * 100)) {
                return false;
            }
        }


        return true;
    });
}

function normalizarTexto($texto)
{
    $texto = mb_strtolower($texto);
    // Remove acentos
    $semAcentos = preg_replace(
        ['/[áàãâä]/u', '/[éèêë]/u', '/[íìîï]/u', '/[óòõôö]/u', '/[úùûü]/u', '/[ç]/u'],
        ['a', 'e', 'i', 'o', 'u', 'c'],
        $texto
    );
    return $semAcentos;
}
