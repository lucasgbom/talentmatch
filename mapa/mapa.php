<?php
$latitude = $usuario->getLatitude();
$longitude = $usuario->getLongitude();
$temLocalizacao = $latitude !== null && $longitude !== null;
?>

<div id="map"></div>
<button type="button" onclick="getLocation()">Usar localização atual</button>
<input type="hidden" name="latitude" id="latP">
<input type="hidden" name="longitude" id="lonP"> 
