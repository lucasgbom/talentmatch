<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Localização Exata com Leaflet</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>

<body>
  <div id="map" style="height: 400px;"></div>
  <script>
    // Inicializa o mapa com uma visão inicial
    var map = L.map('map').setView([0, 0], 13);

    // Camada de tile (OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Função para pegar a localização exata
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var lat = position.coords.latitude;
          var lon = position.coords.longitude;

          document.getElementById('lat').value = lat;
          document.getElementById('lon').value = lon;

          // Atualiza a vista do mapa para a localização exata do usuário
          map.setView([lat, lon], 13);

          // Adiciona um marcador na localização exata
          var marker = L.marker([lat, lon]).addTo(map);
          marker.bindPopup("<b>Você está aqui!</b>").openPopup();
        }, function() {
          alert("Não foi possível obter sua localização.");
        }, {
          enableHighAccuracy: true, // Habilita precisão alta
          timeout: 10000, // Tempo de espera
          maximumAge: 0 // Não usa uma localização armazenada
        });
      } else {
        alert("Geolocalização não é suportada pelo seu navegador.");
      }
    }

    // Chama a função para pegar a localização
    getLocation();

    // Adiciona um ouvinte de evento para clicar no mapa e adicionar um marcador
    map.on('click', function(e) {
      var lat = e.latlng.lat;
      var lon = e.latlng.lng;

      var marker = L.marker([lat, lon]).addTo(map);
      marker.bindPopup("<b>Marcador escolhido!</b>").openPopup();
    });
  </script>
  <form action="localizacao.php" method="POST">
    <input type="submit" value="enviar">
    <input type="hidden" name="lat" id='lat' value="">
    <input type="hidden" name="lon" id='lon' value="">
  </form>
</body>

</html>