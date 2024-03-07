<?php $pageElements = get_field('page_element_headings', 'options'); ?>
<div class="row extended map-wrapper">
    <div id="map"></div>
    <div id="features">
        <section id="blank-filler" class="active">

        </section>
        <?php
        // WP_Query arguments
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => -1, // Display all posts
        );
        // The Query
        $query = new WP_Query($args);
        // The Loop
        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                // Get the post title and slug
                $post_title = get_the_title();
                $post_slug = $post->post_name;
                $color_var = get_field('project_colour'); ?>
        <section id="<?php echo ($post_slug); ?>" class="" style="--marker-color: <?php echo $color_var; ?>">
            <h2 class="heading-2"><i class="fa-sharp fa-solid fa-arrow-right"></i><?php echo ($post_title); ?>
            </h2>
            <?php the_field('short'); ?>
            <div class="area-link <?php echo $post_slug; ?>-link"><a href="#offcanvas-<?php echo $post_slug; ?>"
                    style="--marker-color: <?php echo $color_var; ?>"><?php echo $pageElements['project_read_more']; ?>
                    <span><?php echo $post_title; ?></span><i class="fa-sharp fa-arrow-right"></i></a>
            </div>
        </section>
        <?php
            endwhile;
        endif;
        // Restore original post data.
        wp_reset_postdata(); ?>
    </div>

    <!-- <div id="map-settings" style="position:fixed; top:0;">
        <p id="map-pitch"></p>
        <p id="map-zoom"></p>
        <p id="map-bearing"></p>
        <p id="map-center"></p>

    </div> -->

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
    interactive: false,
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
        'post_type' => 'project',
        'posts_per_page' => -1, // Display all posts
    );

    $query = new WP_Query($args);
    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post();
            // Get the post title and slug
            $post_title = get_the_title();
            $post_slug = $post->post_name;
            $color_var = get_field('project_colour');
            $tilesetID = get_field('tileset_id');
            $sourceLayer = get_field('source_layer');
            ?>
    map.addSource('<?php echo $post_slug; ?>-source', {
        type: 'vector',
        url: 'mapbox://<?php echo $tilesetID; ?>'
    });
    map.addLayer({
        'id': '<?php echo $post_slug; ?>',
        'type': 'fill',
        'source': '<?php echo $post_slug; ?>-source',
        'layout': {
            visibility: 'none'
        },
        'paint': {
            'fill-color': '<?php echo $color_var; ?>',
            'fill-opacity': 0.3
        },
        'source-layer': '<?php echo $sourceLayer; ?>'
    });
    map.addLayer({
        'id': 'line-<?php echo $post_slug; ?>',
        'type': 'line',
        'source': '<?php echo $post_slug; ?>-source',
        'layout': {
            visibility: 'none'
        },
        'paint': {
            'line-color': '<?php echo $color_var; ?>',
            'line-width': 2,
            'line-dasharray': [2, 2],
        },
        'source-layer': '<?php echo $sourceLayer; ?>'
    });
    <?php
        endwhile;
    endif;
    // Restore original post data.
    wp_reset_postdata(); ?>

});

const chapters = {
    <?php
    // WP_Query arguments
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => -1, // Display all posts
    );

    $query = new WP_Query($args);
    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post();
            // Get the post title and slug
            $post_title = get_the_title();
            $post_slug = $post->post_name;
            $location = get_field('center_point');
            ?>


    '<?php echo $post_slug; ?>': {
        center: [<?php echo esc_attr($location['lng']); ?>, <?php echo esc_attr($location['lat']); ?>],
        zoom: <?php the_field('zoom'); ?>,
        pitch: <?php the_field('pitch'); ?>,
        bearing: <?php the_field('bearing'); ?>,
        duration: 2000,
        easing: function(t) {
            return t;
        }
    },



    <?php
        endwhile;
    endif;
    // Restore original post data.
    wp_reset_postdata(); ?> 'blank-filler': {
        center: [37.930386, -2.722874], // starting position [lng, lat]
        pitch: 75.94,
        bearing: 132.85,
        zoom: 17, // starting zoom
    },
};

let activeChapterName = 'blank-filler';

function setActiveChapter(chapterName) {
    if (chapterName === activeChapterName) return;

    // Turn off visibility for the previous active chapter
    if (activeChapterName) {
        if (activeChapterName !== 'blank-filler') {
            map.setLayoutProperty(activeChapterName, 'visibility', 'none');
            map.setLayoutProperty(`line-${activeChapterName}`, 'visibility', 'none');
        }
    }

    // Set visibility for the new active chapter
    map.flyTo(chapters[chapterName]);
    if (chapterName !== 'blank-filler') {
        map.setLayoutProperty(chapterName, 'visibility', 'visible');
        map.setLayoutProperty(`line-${chapterName}`, 'visibility', 'visible');
    }

    // Update the active chapter and class
    document.getElementById(chapterName).classList.add('active');
    if (activeChapterName) {
        document.getElementById(activeChapterName).classList.remove('active');
    }

    activeChapterName = chapterName;
}


function isElementInMiddleOfScreen(id) {
    const element = document.getElementById(id);
    if (!element) return false;

    const bounds = element.getBoundingClientRect();
    const screenMiddle = window.innerHeight / 2;

    return bounds.top < screenMiddle && bounds.bottom > screenMiddle;
}

// On every scroll event, check which element is in the middle of the screen
window.onscroll = () => {
    for (const chapterName in chapters) {
        if (isElementInMiddleOfScreen(chapterName)) {
            setActiveChapter(chapterName);
            break;
        }
    }
};
</script>

<?php
// WP_Query arguments
$args = array(
    'post_type' => 'project',
    'posts_per_page' => -1, // Display all posts
);

// The Query
$query = new WP_Query($args);

// The Loop
if ($query->have_posts()):
    while ($query->have_posts()):
        $query->the_post();

        // Get the post title and slug
        $post_title = get_the_title();
        $post_slug = $post->post_name;
        $color_var = get_field('project_colour'); ?>


<div id="offcanvas-<?php echo ($post_slug); ?>" class="offcanvas container map-details"
    style="--marker-color: <?php echo $color_var; ?>">
    <button class="close-button">&times;</button>
    <div class="row cols map-details--wrapper">
        <div class="map-details--description">
            <div class="sticky-wrapper">
                <h2 class="heading-2"><i class="fa-sharp fa-solid fa-arrow-right"></i><?php echo ($post_title); ?>
                </h2>
                <div class="read-more-text">
                    <?php the_field('project_description'); ?>
                    <span id="toggle" class="toggle-button"><?php echo $pageElements['read_more']; ?></span>
                </div>
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                    alt="<?php the_title_attribute(); ?>" />
            </div>
        </div>
        <div class="map-details--list"><?php if (have_rows('q_and_a')): ?>
            <div class="faq-block--items toggle-block">
                <?php while (have_rows('q_and_a')):
                                the_row(); ?>
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