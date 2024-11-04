<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>



</head>
<body>
  
    

<div id="map" style="height: 400px; width: 100%;"></div>



<script>
    // Latitude and Longitude coordinates
    var lat = 50.866711;
    var lon = 4.318292;

    // Initialize the map
    var map = L.map('map').setView([lat, lon], 16);

    // Set the map tiles source
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Add a marker for the coordinates
    L.marker([lat, lon]).addTo(map)
        .bindPopup('Location Coordinates:<br> Latitude: ' + lat + '<br> Longitude: ' + lon)
        .openPopup();
</script>

</body>
</html>