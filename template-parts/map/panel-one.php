<div class="row extended map-wrapper">
    <div id="map"></div>


    <?php
// WP_Query arguments
$args = array(
    'post_type'      => 'project',
    'posts_per_page' => -1, // Display all posts
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
    echo '<div id="button-container">';
    echo '<div class="buttons">';

    while ( $query->have_posts() ) {
        $query->the_post();

        // Get the post title and slug
        $post_title = get_the_title();
        $post_slug  = $post->post_name;

        // Output the button using post name and slug
        echo '<a href="#" id="' . $post_slug . '-link" class="map-link ' . $post_slug . '-link">Show ' . $post_title . ' Layer</a>';
    }

    echo '</div>';
    echo '</div>';

    // Restore original post data
    wp_reset_postdata();
} else {
    // No posts found
    echo 'No projects found.';
}
?>

    <div class="area-link-wrapper">
        <ul>
            <?php
        // The Loop for area links
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();

                // Get the post title and slug
                $post_title = get_the_title();
                $post_slug  = $post->post_name;
        ?>
            <li class="area-link <?php echo $post_slug; ?>-link"><a href="#<?php echo $post_slug; ?>">Read more about
                    our projects in <span><?php echo $post_title; ?></span><i class="fa-sharp fa-arrow-right"></i></a>
            </li>
            <?php
            }
        } else {
            // No posts found
            echo '<li>No projects found.</li>';
        }
        ?>
        </ul>
    </div>

    <!-- <div id="map-settings">
        <p id="map-pitch"></p>
        <p id="map-zoom"></p>
        <p id="map-bearing"></p>
        <p id="map-center"></p>

    </div> -->
    <?php
// WP_Query arguments
$args = array(
    'post_type'      => 'project',
    'posts_per_page' => -1, // Display all posts
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();

        // Get the post title and slug
        $post_title = get_the_title();
        $post_slug = sanitize_title( $post_title );

        // Output the offcanvas element using post name and slug
        echo '<div id="' . $post_slug . '" class="offcanvas">';
        echo '<button class="close-button">&times;</button>';
        echo $post_title;
        echo '</div>';
    }

    // Restore original post data
    wp_reset_postdata();
} else {
    // No posts found
    echo 'No projects found.';
}
?>

</div>

<script>
mapboxgl.accessToken =
    'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/silverless/cley1vv5t002u01pfi8jdh49o', // style URL
    center: [37.927829, -2.755729], // starting position [lng, lat]
    pitch: 80,
    bearing: -32,
    zoom: 15, // starting zoom
    // interactive: false,
});


// map.on('move', function() {
//     var pitchElement = document.getElementById('map-pitch');
//     var zoomElement = document.getElementById('map-zoom');
//     var bearingElement = document.getElementById('map-bearing');
//     var centerElement = document.getElementById('map-center');

//     pitchElement.innerText = 'Pitch: ' + map.getPitch().toFixed(2);
//     zoomElement.innerText = 'Zoom: ' + map.getZoom().toFixed(2);
//     bearingElement.innerText = 'Bearing: ' + map.getBearing().toFixed(2);
//     centerElement.innerText = 'Center: ' + map.getCenter();
// });




map.on('load', () => {
    // Add a data source containing GeoJSON data.

    <?php
// WP_Query arguments
$args = array(
    'post_type'      => 'project',
    'posts_per_page' => -1, // Display all posts
);

            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                 // Get the post title and slug
                $post_title = get_the_title();
                $post_slug  = $post->post_name;
            ?>
    map.addSource('<?php echo $post_slug; ?>', {
        'type': 'geojson',
        'data': {
            'type': 'Feature',
            'geometry': {
                'type': 'Polygon',
                // These coordinates outline Maine.
                'coordinates': [
                    [
                        <?php the_field('json');?>
                    ]
                ]
            }
        }
    });
    map.addLayer({
        'id': '<?php echo $post_slug; ?>',
        'type': 'fill',
        'source': '<?php echo $post_slug; ?>',
        'layout': {
            visibility: 'none'
        },
        'paint': {
            'fill-color': '#9bd866',
            'fill-opacity': 0.3
        },
    });



    <?php
                endwhile;
            endif;
            // Restore original post data.
            wp_reset_postdata(); ?>


















});





const kanziLayerId = 'kanzi';
const chyuluLayerId = 'chyulu-hills';
const kukuaLayerId = 'kukua';

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
        hideLayer(kukuaLayerId);
    }
});

// Handle click event for Chyulu link
document.getElementById('chyulu-hills-link').addEventListener('click', function(e) {
    e.preventDefault();
    if (map.getLayoutProperty(chyuluLayerId, 'visibility') === 'none') {
        showLayer(chyuluLayerId, [37.9236406,
            -2.4418396
        ], 12, 40, 90);
        hideLayer(kanziLayerId);
        hideLayer(kukuaLayerId);
    }
});

// Handle click event for Kuku a link
document.getElementById('kukua-link').addEventListener('click', function(e) {
    e.preventDefault();
    if (map.getLayoutProperty(kukuaLayerId, 'visibility') === 'none') {
        showLayer(kukuaLayerId, [37.347092, -2.319405], 12, 40, 90);
        hideLayer(kanziLayerId);
        hideLayer(chyuluLayerId);
    }
});
</script>