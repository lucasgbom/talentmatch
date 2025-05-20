<?php
include('../talentmatch/app/conexao/Conexao.php');
include('../talentmatch/app/Model/Usuario.php');
include('../talentmatch/app/DAO/UsuarioDAO.php');
$usuarioDAO = new UsuarioDAO();
$usuarios = $usuarioDAO->listarTodos();
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

  var usuarios = <?php echo json_encode($usuarios); ?>;
  usuarios.forEach(function(usuario) {
    
    if (usuario.latitude && usuario.longitude) {
      var marker = L.marker([parseFloat(usuario.latitude), parseFloat(usuario.longitude)]).addTo(map);
      // Tooltip permanente com o ID do usuário
      marker.bindTooltip("Usuário: " + usuario.nome, {
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
