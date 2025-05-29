<script>
  let map, currentMarker;
  const temLocalizacao = <?= json_encode($temLocalizacao) ?>;
  const latitude = <?= $temLocalizacao ? $latitude : 'null' ?>;
  const longitude = <?= $temLocalizacao ? $longitude : 'null' ?>;

  function setMarker(lat, lon, popupText) {
    if (currentMarker) map.removeLayer(currentMarker);
    currentMarker = L.marker([lat, lon]).addTo(map).bindPopup(popupText).openPopup();
    document.getElementById('lat').value = lat;
    document.getElementById('lon').value = lon;
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
</script>