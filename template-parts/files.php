<?php $pageElements = get_field('page_element_headings', 'options'); ?>
<section class="container section-files"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <h2 class="heading-2 heading-2--green"><?php the_sub_field('main_title'); ?></h2>
    </div>
    <div class="files-controls row <?php the_sub_field('column_size'); ?>">
        <ul class="years">
            <li data-filter=".year2023"><?php get_template_part('inc/img/folder'); ?><span>2023</span></li>
            <li data-filter=".year2022"><?php get_template_part('inc/img/folder'); ?><span>2022</span></li>
            <li data-filter=".year2021"><?php get_template_part('inc/img/folder'); ?><span>2021</span></li>
            <li data-filter=".year2020"><?php get_template_part('inc/img/folder'); ?><span>2020</span></li>
        </ul>
    </div>
    <div class="files-wrapper row <?php the_sub_field('column_size'); ?> <?php if ( is_singular( 'post' ) ) { echo 'col-10';
    //your code here...
}?>">
        <?php
            $args = array(
                'posts_per_page' => 3, /* how many post you need to display */
                'post_type' => 'attachment', /* your post type name */
                'post_status' => 'inherit',
                'meta_query' => array(
                    array(
                        'key' => 'reports',
                        'value' => '1',
                        'compare' => '=',
                    )
                )
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>

        <div class="files mix year<?php $post_year = get_the_date( 'Y' ); echo $post_year; ?>">

            <div class="text">
                <div class="file-heading">
                    <h2 class="heading-4 heading-4--news"><?php the_title(); ?></h2>
                </div>
                <div class="file-date"><?php $post_date = get_the_date( 'd/m/Y' ); echo $post_date; ?></div>
            </div>
            <div class="link">
                <a href="<?php the_permalink(); ?>" class="textonly"
                    aria-label="Find out more about <?php the_title(); ?>"><?php echo $pageElements['file_button_text']; ?><i
                        class="fa-sharp  fa-arrow-down-right"></i></a>
            </div>
        </div>
        <?php
                endwhile;
            endif;
            // Restore original post data.
            wp_reset_postdata(); ?>
    </div>
    <div class="mixitup-page-list"></div>

</section>
<section class="animate-right">
    <!-- Your section content goes here -->
</section>