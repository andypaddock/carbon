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
            ?>

        <div class="news tileup">
            <div class="news-image">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                    alt="<?php the_title_attribute(); ?>" />
            </div>
            <div class="text">
                <div class="news-date"><?php $post_date = get_the_date( 'd.m.Y' ); echo $post_date; ?></div>

                <div class="heading">
                    <h2 class="heading-4 heading-4--green"><?php the_title(); ?></h2>
                </div>


                <div class="description">
                    <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                </div>
                <div class="itin-button"> <a class="button" href="<?php the_permalink(); ?>" class="button textonly"
                        aria-label="Find out more about <?php the_title(); ?>"><?php echo $pageElements['news_button_text']; ?><i
                            class="fa-sharp fa-light fa-arrow-right"></i></a>
                </div>



            </div>

        </div>


        <?php
                endwhile;
            endif;
            // Restore original post data.
            wp_reset_postdata(); ?>
    </div>

</section>
<section class="animate-right">
    <!-- Your section content goes here -->
</section>