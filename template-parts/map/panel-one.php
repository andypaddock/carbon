<div class="row extended">
    <div id="map"></div>
    <div id="info-panel">
        <h3>Point 1</h3>
        <p>Basic information about Point 1.</p>
    </div>
    <div id="map-settings">
        <p id="map-pitch"></p>
        <p id="map-zoom"></p>
        <p id="map-bearing"></p>
    </div>
</div>

<script>
mapboxgl.accessToken =
    'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/silverless/cley1vv5t002u01pfi8jdh49o', // style URL
    center: [37.8891, -2.77589], // starting position [lng, lat]
    pitch: 61,
    bearing: 24,
    zoom: 11.63, // starting zoom
    // interactive: false,
});


map.on('move', function() {
    var pitchElement = document.getElementById('map-pitch');
    var zoomElement = document.getElementById('map-zoom');
    var bearingElement = document.getElementById('map-bearing');

    pitchElement.innerText = 'Pitch: ' + map.getPitch().toFixed(2);
    zoomElement.innerText = 'Zoom: ' + map.getZoom().toFixed(2);
    bearingElement.innerText = 'Bearing: ' + map.getBearing().toFixed(2);
});
</script>