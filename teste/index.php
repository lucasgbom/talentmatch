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
    var map = L.map('map').setView([0, 0], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Variável para armazenar o marcador atual
    var currentMarker = null;

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var lat = position.coords.latitude;
          var lon = position.coords.longitude;

          document.getElementById('lat').value = lat;
          document.getElementById('lon').value = lon;

          map.setView([lat, lon], 13);

          // Remove marcador anterior se existir
          if (currentMarker) {
            map.removeLayer(currentMarker);
          }

          // Cria novo marcador
          currentMarker = L.marker([lat, lon]).addTo(map);
          currentMarker.bindPopup("<b>Você está aqui!</b>").openPopup();
        }, function() {
          alert("Não foi possível obter sua localização.");
        }, {
          enableHighAccuracy: true,
          timeout: 10000,
          maximumAge: 0
        });
      } else {
        alert("Geolocalização não é suportada pelo seu navegador.");
      }
    }

    getLocation();

    // Evento de clique para atualizar marcador
    map.on('click', function(e) {
      var lat = e.latlng.lat;
      var lon = e.latlng.lng;

      // Atualiza os inputs escondidos
      document.getElementById('lat').value = lat;
      document.getElementById('lon').value = lon;

      // Remove marcador anterior se existir
      if (currentMarker) {
        map.removeLayer(currentMarker);
      }

      // Cria novo marcador
      currentMarker = L.marker([lat, lon]).addTo(map);
      currentMarker.bindPopup("<b>Localização atualizada!</b>").openPopup();
    });
  </script>

  <form action="../talentmatch/app/Controller/LocalizacaoController.php" method="POST">
    <input type="submit" value="enviar">
    <input type="hidden" name="lat" id='lat' value="">
    <input type="hidden" name="lon" id='lon' value="">
    <input type="hidden" name="acao" id='acao' value="inserir">
  </form>
  <a href="lista.php"><button>Listar</button></a>
</body>

</html>