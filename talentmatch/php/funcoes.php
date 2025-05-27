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
    
    $sqlDistancia = "
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
ORDER BY distancia_km ASC;
";
    try {
        $consulta = Conexao::getConexao()->prepare($sqlDistancia);
        $consulta->bindValue(":lon_ref", $usuario->getLongitude());
        $consulta->bindValue(":lat_ref", $usuario->getLatitude());
        $consulta->bindValue(":raio_km", $raio);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        print "Erro ao carregar usuario <br>" . $e->getMessage() . '<br>';
    }
}
function postPesquisa($array, $pesquisas){
    $resultado = $array;
    foreach ($pesquisas as $chave => $valor) {
        
    }
    return $resultado;
} 
function postTalento($habilidade){
    $sql = "SELECT * FROM post WHERE habilidade = :talento";
    $consulta = Conexao::getConexao()->prepare($sql);
    $consulta->bindValue(':talento',$habilidade);
    $consulta->execute();

    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return $resultado;
} 

