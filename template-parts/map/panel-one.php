<div class="row extended map-wrapper">
    <div id="map"></div>
    <div id="button-container">

        <!-- <button onclick="toggleLayer('kanzibutton')">Layer 1</button>
        <button onclick="toggleLayer('chyulubutton')">Layer 2</button> -->
        <div>
            <a href="#" id="kanzi-link">Show Kanzi Layer</a>
            <a href="#" id="chyulu-link">Show Chyulu Layer</a>
        </div>
    </div>
    <!-- <div id="info-panel">
        <h3>Point 1</h3>
        <p>Basic information about Point 1.</p>
    </div> -->
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
    zoom: 11, // starting zoom
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

// // Define your layers
// const layers = [{
//         id: 'layer1',
//         visibility: 'visible'
//     },
//     {
//         id: 'layer2',
//         visibility: 'none'
//     },
//     {
//         id: 'layer3',
//         visibility: 'none'
//     }
// ];



map.on('load', () => {
    // Add a data source containing GeoJSON data.
    map.addSource('chyulu', {
        'type': 'geojson',
        'data': {
            'type': 'Feature',
            'geometry': {
                'type': 'Polygon',
                // These coordinates outline Maine.
                'coordinates': [
                    [
                        [
                            37.8807253,
                            -2.4332643
                        ],
                        [
                            37.922954,
                            -2.4027358
                        ],
                        [
                            37.963466,
                            -2.4531589
                        ],
                        [
                            37.9178041,
                            -2.4864303
                        ],
                        [
                            37.8810686,
                            -2.4336073
                        ]
                    ]
                ]
            }
        }
    });
    map.addSource('kanzi', {
        'type': 'geojson',
        'data': {
            'type': 'Feature',
            'geometry': {
                'type': 'Polygon',
                // These coordinates outline Maine.
                'coordinates': [
                    [
                        [
                            37.8329642,
                            -2.7496455
                        ],
                        [
                            37.8896124,
                            -2.7379859
                        ],
                        [
                            37.908581,
                            -2.7641341
                        ],
                        [
                            37.9097826,
                            -2.7716784
                        ],
                        [
                            37.8930457,
                            -2.8094849
                        ],
                        [
                            37.8892691,
                            -2.811628
                        ],
                        [
                            37.8847201,
                            -2.8096563
                        ],
                        [
                            37.8329745,
                            -2.7496492
                        ]
                    ]
                ]
            }
        }
    });

    // Add a new layer to visualize the polygon.
    map.addLayer({
        'id': 'chyulu',
        'type': 'fill',
        'source': 'chyulu', // reference the data source
        'layout': {
            visibility: 'none'
        },
        'paint': {
            'fill-color': '#9bd866', // blue color fill
            'fill-opacity': 0.3
        },
        zoom: 12,
        pitch: 65,
        bearing: 180,
    });
    // // Add a black outline around the polygon.
    // map.addLayer({
    //     'id': 'outline',
    //     'type': 'line',
    //     'source': 'chyulu',
    //     'layout': {

    //     },
    //     'paint': {
    //         'line-color': '#9bd866',
    //         'line-width': 3
    //     }
    // });
    // Add a new layer to visualize the polygon.
    map.addLayer({
        'id': 'kanzi',
        'type': 'fill',
        'source': 'kanzi', // reference the data source
        'layout': {
            visibility: 'none'
        },
        'paint': {
            'fill-color': '#9bd866', // blue color fill
            'fill-opacity': 0.3
        },
        zoom: 11,
        pitch: 35,
        bearing: 120,
    });
    // // Add a black outline around the polygon.
    // map.addLayer({
    //     'id': 'kanzi-outline',
    //     'type': 'line',
    //     'source': 'kanzi',
    //     'layout': {

    //     },
    //     'paint': {
    //         'line-color': '#9bd866',
    //         'line-width': 3
    //     }
    // });

});
// // Function to toggle layer visibility
// function toggleLayer(layerId) {
//     map.getStyle().layers.forEach(layer => {
//         if (layer.id === layerId) {
//             map.setLayoutProperty(layerId, 'visibility', 'visible');
//         } else {
//             map.setLayoutProperty(layer.id, 'visibility', 'none');
//         }
//     });
// }




const kanziLayerId = 'kanzi';
const chyuluLayerId = 'chyulu';

// Function to show a layer on the map
function showLayer(layerId, center, zoom, pitch, bearing) {
    map.setLayoutProperty(layerId, 'visibility', 'visible');
    map.flyTo({
        center: center,
        zoom: zoom,
        pitch: pitch,
        bearing: bearing,
        duration: 2000, // Adjust the duration (in milliseconds) for smoother animation
        easing: function(t) {
            return t;
            // Experiment with different easing functions for smoother animation,
            // such as "t * (2 - t)" or "Math.pow(t, 2)"
        }
    });
}

// Function to hide a layer on the map
function hideLayer(layerId) {
    map.setLayoutProperty(layerId, 'visibility', 'none');
}

// Handle click event for Kanzi link
document.getElementById('kanzi-link').addEventListener('click', function(e) {
    e.preventDefault();
    if (map.getLayoutProperty(kanziLayerId, 'visibility') === 'none') {
        showLayer(kanziLayerId, [37.890864,
            -2.7889171
        ], 10, 60, 30);
        hideLayer(chyuluLayerId);
    } else {
        hideLayer(kanziLayerId);
    }
});

// Handle click event for Chyulu link
document.getElementById('chyulu-link').addEventListener('click', function(e) {
    e.preventDefault();
    if (map.getLayoutProperty(chyuluLayerId, 'visibility') === 'none') {
        showLayer(chyuluLayerId, [37.9236406,
            -2.4418396
        ], 12, 40, 90);
        hideLayer(kanziLayerId);
    } else {
        hideLayer(chyuluLayerId);
    }
});
</script>

<style>
.map-wrapper {
    position: relative;
}

#button-container {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 1;
}

button {
    padding: 10px;
}

#map-settings {
    color: black;
}
</style>