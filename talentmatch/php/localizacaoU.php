   <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
   <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
   <h2>Mapa de Localização</h2>
   <div id="map" style="height: 400px;"></div>
   <button onclick="getLocation()">Usar localização atual</button>

   <form action="../talentmatch/app/Controller/LocalizacaoController.php" method="POST">
       <input type="submit" value="Atualizar">
       <input type="hidden" name="lat" id='lat' value="">
       <input type="hidden" name="lon" id='lon' value="">
       <input type="hidden" name="acao" id='acao' value="atualizar">
   </form>

   <a href="lista.php"><button type="button">Listar</button></a>
   <script>
       var map;
       var currentMarker = null;

       // Coordenadas vindas do PHP
       var temLocalizacao = <?php echo $temLocalizacao ? 'true' : 'false'; ?>;
       var latitude = <?php echo $temLocalizacao ? $latitude : 'null'; ?>;
       var longitude = <?php echo $temLocalizacao ? $longitude : 'null'; ?>;

       // Inicializa o mapa
       if (temLocalizacao && latitude !== null && longitude !== null) {
           map = L.map('map').setView([latitude, longitude], 13);
           currentMarker = L.marker([latitude, longitude]).addTo(map)
               .bindPopup("<b>Localização salva!</b>").openPopup();

           document.getElementById('lat').value = latitude;
           document.getElementById('lon').value = longitude;
       } else {
           map = L.map('map').setView([0, 0], 2); // padrão até obter localização
           getLocation(); // tenta pegar automaticamente se não tem
       }

       L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
           attribution: '&copy; OpenStreetMap contributors'
       }).addTo(map);

       function getLocation() {
           if (navigator.geolocation) {
               navigator.geolocation.getCurrentPosition(function(position) {
                   var lat = position.coords.latitude;
                   var lon = position.coords.longitude;

                   map.setView([lat, lon], 13);

                   if (currentMarker) {
                       map.removeLayer(currentMarker);
                   }

                   currentMarker = L.marker([lat, lon]).addTo(map)
                       .bindPopup("<b>Você está aqui!</b>").openPopup();

                   document.getElementById('lat').value = lat;
                   document.getElementById('lon').value = lon;

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

       // Clica no mapa para mover marcador
       map.on('click', function(e) {
           var lat = e.latlng.lat;
           var lon = e.latlng.lng;

           if (currentMarker) {
               map.removeLayer(currentMarker);
           }

           currentMarker = L.marker([lat, lon]).addTo(map)
               .bindPopup("<b>Localização atualizada!</b>").openPopup();

           document.getElementById('lat').value = lat;
           document.getElementById('lon').value = lon;
       });
   </script>