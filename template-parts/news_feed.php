<?php $pageElements = get_field('page_element_headings', 'options'); ?>
<section class="container section-news-feed"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?> <?php if ( is_singular( 'post' ) ) { echo 'col-10';
    //your code here...
}?>">
        <h2 class="heading-2 heading-2--green">Our Stories</h2>
    </div>
    <div class="news-feed-wrapper row <?php the_sub_field('column_size'); ?> <?php if ( is_singular( 'post' ) ) { echo 'col-10';
    //your code here...
}?>">
        <div class="news-filters">
            <?php
    $all_categories = get_categories(array(
        'hide_empty' => true
    ));
    ?>

            <!-- Iterate through each category -->
            <ul class="category" data-filter-group>
                <li class="filter-head">Filter</li>
                <?php foreach($all_categories as $category): ?>
                <!-- Output control button markup, setting the data-filter attribute as the category "slug" -->

                <li class="news-filters" data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php
// Get the list of years for uploaded documents
$years = array();
$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => -1
);
$attachments = get_posts($args);
foreach ($attachments as $attachment) {
  $year = date('Y', strtotime($attachment->post_date));
  $years[] = $year;
}
$years = array_unique($years);
rsort($years); ?>

            <ul class="archive" data-filter-group>
                <li class="filter-head">Archive</li>
                <?php foreach ($years as $year) { ?>
                <li class="year-filters" data-filter=".year<?php echo $year; ?>">
                    <?php echo $year; ?>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="news-content">
            <?php
            $args = array(
                'posts_per_page' => 3, /* how many post you need to display */
                'post_type' => 'post', /* your post type name */
                'post_status' => 'publish',
                'post__not_in' => array(get_the_ID()),
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                $categories = get_the_category();
        $slugs = wp_list_pluck($categories, 'slug');
        $class_names = join(' ', $slugs);
            ?>
            <div
                class="news mix<?php if ($class_names) { echo ' ' . $class_names;} ?> year<?php $class_date = get_the_date( 'Y' ); echo $class_date; ?>">
                <div class="news-image animate-tile ">
                    <a href="<?php the_permalink(); ?>" aria-label="Find out more about <?php the_title(); ?>"><img
                            src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                            alt="<?php the_title_attribute(); ?>" /></a>
                </div>
                <div class="text animate-tile ">
                    <div class="news-date"><?php $post_date = get_the_date( 'd.m.Y' ); echo $post_date; ?></div>

                    <div class="heading">
                        <a href="<?php the_permalink(); ?>" aria-label="Find out more about <?php the_title(); ?>">
                            <h2 class="heading-4 heading-4--green"><?php the_title(); ?></h2>
                        </a>
                    </div>
                    <div class="description">
                        <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                    </div>
                    <!-- <div class="itin-button"> <a class="button" href="<?php the_permalink(); ?>" class="button textonly"
                        aria-label="Find out more about <?php the_title(); ?>"><?php echo $pageElements['news_button_text']; ?><i
                            class="fa-sharp fa-light fa-arrow-right"></i></a>
                </div> -->
                </div>
            </div>
            <?php
                endwhile;
            endif;
            // Restore original post data.
            wp_reset_postdata(); ?>
            <div class="mixitup-page-list"></div>
        </div>
    </div>
</section>
<section class="animate-right">
    <!-- Your section content goes here -->
</section>