<?php
function formatarParaReal($valorEmCentavos) {
    return 'R$ ' . number_format($valorEmCentavos / 100, 2, ',', '.');
}
function formatarData($dataCompleta) {
    $data = DateTime::createFromFormat('Y-m-d', $dataCompleta);
    return $data ? $data->format('d/m/y') : '';
}

?>
