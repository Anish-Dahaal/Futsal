@extends('layouts.apps')

@section('content')
<div class="maps-container">
    <h1>Futsal Locations on Map</h1>
    <div id="map" style="height: 400px; width: 100%;"></div>
</div>

<!-- Leaflet.js Library -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var map = L.map('map').setView([27.7172, 85.3240], 12);

    // OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var locations = [{
            lat: 27.7172,
            lng: 85.3240,
            title: "Futsal A"
        },
        {
            lat: 27.7000,
            lng: 85.3000,
            title: "Futsal B"
        }
    ];

    locations.forEach(location => {
        L.marker([location.lat, location.lng]).addTo(map)
            .bindPopup(location.title)
            .openPopup();
    });
});
</script>

@endsection