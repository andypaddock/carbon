<?php $pageElements = get_field('page_element_headings', 'options'); ?>
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
        $color_var = get_field('project_colour');

        // Output the button using post name and slug
        echo '<a style="--marker-color:' . $color_var . '" href="#" id="' . $post_slug . '-link" class="map-link ' . $post_slug . '-link">' . $post_title . ' </a>';
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
                $color_var = get_field('project_colour');
        ?>
            <li class="area-link <?php echo $post_slug; ?>-link"><a href="#<?php echo $post_slug; ?>"
                    style="--marker-color: <?php echo $color_var; ?>"><?php echo $pageElements['project_read_more']; ?>
                    <span><?php echo $post_title; ?></span><i class="fa-sharp fa-arrow-right"></i></a>
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

    <div id="map-settings">
        <p id="map-pitch"></p>
        <p id="map-zoom"></p>
        <p id="map-bearing"></p>
        <p id="map-center"></p>

    </div>
    <?php
// WP_Query arguments
$args = array(
    'post_type'      => 'project',
    'posts_per_page' => -1, // Display all posts
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ):
    while ( $query->have_posts() ):
        $query->the_post();

        // Get the post title and slug
        $post_title = get_the_title();
        $post_slug = sanitize_title( $post_title );
        $color_var = get_field('project_colour');?>


    <div id="<?php echo ($post_slug);?>" class="offcanvas container map-details"
        style="--marker-color: <?php echo $color_var; ?>">
        <button class="close-button">&times;</button>
        <div class="row cols map-details--wrapper">
            <div class="map-details--description">
                <div class="sticky-wrapper">
                    <h2 class="heading-2"><i class="fa-sharp fa-solid fa-arrow-right"></i><?php echo ($post_title);?>
                    </h2>
                    <div class="read-more-text">
                        <?php the_field('project_description');?>
                        <span id="toggle"><?php echo $pageElements['read_more']; ?></span>
                    </div>
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                        alt="<?php the_title_attribute(); ?>" />
                </div>
            </div>
            <div class="map-details--list"><?php if( have_rows('q_and_a') ): ?>
                <div class="faq-block--items toggle-block">
                    <?php while( have_rows('q_and_a') ): the_row(); ?>
                    <div class="item ">

                        <label>
                            <h2 class="heading-4 font-default"><?php the_sub_field('question'); ?></h2>
                            <i class="fa-sharp fa-light fa-arrow-down-right fa-2x"></i>
                        </label>
                        <div class="content mb2">
                            <?php the_sub_field('answer'); ?>
                        </div>

                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php
                endwhile;
            endif;
            // Restore original post data.
            wp_reset_postdata(); ?>

</div>

<script>
mapboxgl.accessToken =
    'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/silverless/cley1vv5t002u01pfi8jdh49o', // style URL
    center: [37.930386, -2.722874], // starting position [lng, lat]
    pitch: 75.94,
    bearing: 132.85,
    zoom: 17, // starting zoom
    interactive: true,
});


map.on('move', function() {
    var pitchElement = document.getElementById('map-pitch');
    var zoomElement = document.getElementById('map-zoom');
    var bearingElement = document.getElementById('map-bearing');
    var centerElement = document.getElementById('map-center');

    pitchElement.innerText = 'Pitch: ' + map.getPitch().toFixed(2);
    zoomElement.innerText = 'Zoom: ' + map.getZoom().toFixed(2);
    bearingElement.innerText = 'Bearing: ' + map.getBearing().toFixed(2);
    centerElement.innerText = 'Center: ' + map.getCenter();
});

map.on('load', () => {
    // Add a custom vector tileset source. This tileset contains
    // point features representing museums. Each feature contains
    // three properties. For example:
    // {
    //     alt_name: "Museo Arqueologico",
    //     name: "Museo Inka",
    //     tourism: "museum"
    // }
    map.addSource('Shirango', {
        type: 'vector',
        url: 'mapbox://silverless.2psz0554'
    });
    map.addLayer({
        'id': 'Shirango',
        'type': 'fill',
        'source': 'Shirango',
        'layout': {
            // Make the layer visible by default.
            'visibility': 'visible'
        },
        'paint': {
            'fill-color': 'rgba(55,148,179,1)',
            'fill-opacity': 0.3,
        },
        'source-layer': 'Shirango-2ll1v4'
    });

    map.addLayer({
        'id': 'Shirango-line',
        'type': 'line',
        'source': 'Shirango',
        'layout': {
            // Make the layer visible by default.
            'visibility': 'visible'
        },
        'paint': {
            'line-color': '#ffffff',
            'line-dasharray': [4, 4],

        },
        'source-layer': 'Shirango-2ll1v4'
    });

    // Add the Mapbox Terrain v2 vector tileset. Read more about
    // the structure of data in this tileset in the documentation:
    // https://docs.mapbox.com/vector-tiles/reference/mapbox-terrain-v2/
    map.addSource('contours', {
        type: 'vector',
        url: 'mapbox://mapbox.mapbox-terrain-v2'
    });
    map.addLayer({
        'id': 'contours',
        'type': 'line',
        'source': 'contours',
        'source-layer': 'contour',
        'layout': {
            // Make the layer visible by default.
            'visibility': 'visible',
            'line-join': 'round',
            'line-cap': 'round'
        },
        'paint': {
            'line-color': '#877b59',
            'line-width': 1
        }
    });
});
</script>