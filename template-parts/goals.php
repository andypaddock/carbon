<section class="container section-goals" id="<?php the_sub_field('section_id'); ?>">
    <div class="goals-block row <?php the_sub_field('column_size'); ?>">

        <div class="title-block">
            <h2 class="heading-3"><?php the_sub_field('main_title'); ?></h2>
            <?php the_sub_field('description'); ?>
        </div>



        <div class="goals-wrapper">
            <?php if( have_rows('goals') ): ?>
            <div class="goals">
                <?php while( have_rows('goals') ): the_row(); 
        $image = get_sub_field('goal_image');
        ?>
                <div class="goal">
                    <div class="goal--image">
                        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                    </div>
                    <div class="goal--text">
                        <h3 class="heading-4 heading-4--news"><?php the_sub_field('goal_title'); ?></h3>
                        <?php the_sub_field('goal_description'); ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>



        </div>



    </div>
</section>