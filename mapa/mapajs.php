<script>
  // SCRIPT PARA LOCALIZACAO POST
  let map, currentMarker;
  const temLocalizacao = <?= json_encode($temLocalizacao) ?>;
  const latitude = <?= $temLocalizacao ? $latitude : 'null' ?>;
  const longitude = <?= $temLocalizacao ? $longitude : 'null' ?>;

  function setMarker(lat, lon, popupText) {
    if (currentMarker) map.removeLayer(currentMarker);
    currentMarker = L.marker([lat, lon]).addTo(map).bindPopup(popupText).openPopup();
    document.getElementById('latP').value = lat;
    document.getElementById('lonP').value = lon;
  }

  function getLocation() {
    if (!navigator.geolocation) return alert("Geolocalização não suportada.");
    navigator.geolocation.getCurrentPosition(pos => {
      const {
        latitude: lat,
        longitude: lon
      } = pos.coords;
      map.setView([lat, lon], 13);
      setMarker(lat, lon, "<b>Você está aqui!</b>");
    }, () => alert("Não foi possível obter sua localização."), {
      enableHighAccuracy: true,
      timeout: 10000,
      maximumAge: 0
    });
  }
  map = L.map('map').setView(
    temLocalizacao && latitude && longitude ? [latitude, longitude] : [0, 0],
    temLocalizacao ? 13 : 2
  );
  if (temLocalizacao) {
    map.setView([latitude, longitude], 13);
    setTimeout(() => {
      setMarker(latitude, longitude, "<b>Localização salva!</b>");
    }, 300);
  } else getLocation();

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
  }).addTo(map);


  map.on('click', e => setMarker(e.latlng.lat, e.latlng.lng, "<b>Localização atualizada!</b>"));

  //  ---    SCRIPT PARA O MAPA USUARIO (#mapU)   ---

  var mapU;
  var currentMarkerU = null;

  // Coordenadas vindas do PHP
  var temLocalizacaoU = <?php echo $temLocalizacaoU ? 'true' : 'false'; ?>;
  var latitudeU = <?php echo $temLocalizacaoU ? $latitudeU : 'null'; ?>;
  var longitudeU = <?php echo $temLocalizacaoU ? $longitudeU : 'null'; ?>;

  // Inicializa o mapa
  if (temLocalizacaoU && latitudeU !== null && longitudeU !== null) {
    mapU = L.map('mapU').setView([latitudeU, longitudeU], 13);
    currentMarkerU = L.marker([latitudeU, longitudeU]).addTo(mapU)
      .bindPopup("<b>Localização salva!</b>").openPopup();

    document.getElementById('latU').value = latitudeU;
    document.getElementById('lonU').value = longitudeU;
  } else {
    mapU = L.map('mapU').setView([0, 0], 2); // padrão até obter localização
    getLocationU(); // tenta pegar automaticamente se não tem
  }

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
  }).addTo(mapU);

  function getLocationU() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;

        mapU.setView([lat, lon], 13);

        if (currentMarkerU) {
          mapU.removeLayer(currentMarkerU);
        }

        currentMarkerU = L.marker([lat, lon]).addTo(mapU)
          .bindPopup("<b>Você está aqui!</b>").openPopup();

        document.getElementById('latU').value = lat;
        document.getElementById('lonU').value = lon;

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
  mapU.on('click', function(e) {
    var lat = e.latlng.lat;
    var lon = e.latlng.lng;

    if (currentMarkerU) {
      mapU.removeLayer(currentMarkerU);
    }

    currentMarkerU = L.marker([lat, lon]).addTo(mapU)
      .bindPopup("<b>Localização atualizada!</b>").openPopup();

    document.getElementById('latU').value = lat;
    document.getElementById('lonU').value = lon;
  });
</script>