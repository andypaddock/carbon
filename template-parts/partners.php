<section class="container section-partners" id="<?php the_sub_field('section_id'); ?>">
    <div class="partners-block row <?php the_sub_field('column_size'); ?>">

        <div class="title-block--heading align-<?php the_sub_field('heading_align'); ?>">
            <h2 class="heading-3"><?php the_sub_field('main_title'); ?></h2>
            <?php the_sub_field('description'); ?>
        </div>


        <?php if( have_rows('partner_groups') ): ?>
        <div class="partner-group">
            <?php while( have_rows('partner_groups') ): the_row(); ?>
            <div class="group-title"><?php the_sub_field('group_title'); ?></div>

            <?php if( have_rows('group_members') ): ?>
            <ul class="slides">
                <?php while( have_rows('group_members') ): the_row(); 
        $image = get_sub_field('member_imagelogo');
        ?>
                <li>
                    <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                    <p><?php the_sub_field('member_name'); ?></p>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>


            <?php endwhile; ?>
        </div>
        <?php endif; ?>


    </div>
</section>