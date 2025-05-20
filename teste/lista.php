<?php
include('../talentmatch/app/conexao/Conexao.php');
include('../talentmatch/app/Model/Usuario.php');
include('../talentmatch/app/DAO/UsuarioDAO.php');
include('../talentmatch/app/Model/Localizacao.php');
include('../talentmatch/app/DAO/LocalizacaoDAO.php');
$usuarioDAO = new UsuarioDAO();
$localizacaoDAO = new LocalizacaoDAO();
$localizacoes = $localizacaoDAO->listarTodos();
$nomes = array();
foreach($localizacoes as $localizacao){
    $id = $localizacao['idUsuario'];
    $usuario = $usuarioDAO->buscar('id', $id);
    array_push($nomes, $usuario['nome']);
}
$localizacoesJSON = json_encode($localizacoes);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Mapa de Localizações</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <style>
    #map {
      height: 500px;
      width: 100%;
    }
  </style>
</head>
<body>

<h2>Localizações registradas</h2>
<div id="map"></div>

<script>
  var map = L.map('map').setView([0, 0], 2);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
  }).addTo(map);

  var localizacoes = <?php echo $localizacoesJSON; ?>;
  var nomes = <?php echo json_encode($nomes);?>;
  var i = 0;
  localizacoes.forEach(function(loc) {
    
    if (loc.latitude && loc.longitude) {
      var marker = L.marker([parseFloat(loc.latitude), parseFloat(loc.longitude)]).addTo(map);
      
      // Tooltip permanente com o ID do usuário
      marker.bindTooltip("Usuário: " + nomes[i], {
        permanent: true,
        direction: "top",
        offset: [-15, -10], // deslocamento para cima
        className: "custom-tooltip"
      });
      
    }
  });
</script>

</body>
</html>
