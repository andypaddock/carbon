<section class="container section-partners" id="<?php the_sub_field('section_id'); ?>">
    <div class="partners-block row <?php the_sub_field('column_size'); ?>">

        <div class="title-block">
            <h2 class="heading-3"><?php the_sub_field('main_title'); ?></h2>
            <p><?php the_sub_field('description'); ?></p>
        </div>


        <?php if( have_rows('partner_groups') ): ?>
        <div class="partner-group">
            <?php while( have_rows('partner_groups') ): the_row(); ?>
            <div class="group-title"><?php the_sub_field('group_title'); ?></div>

            <?php if( have_rows('group_members') ): ?>
            <div class="partner-group--members">
                <?php while( have_rows('group_members') ): the_row(); 
        $image = get_sub_field('member_imagelogo');
        ?>
                <div class="group-member tile">
                    <div class="group-member--image">
                        <?php if(get_sub_field('member_website')):?>
                        <a href="<?php echo esc_url( urlencode( the_sub_field('member_website') ) ); ?>" target="_blank"
                            title="Visit our partner <?php the_sub_field('member_name'); ?>">
                            <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                        </a>
                        <?php else:?>
                        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                        <?php endif;?>
                    </div>
                    <div class="group-member--details">
                        <?php if(get_sub_field('member_website')):?>
                        <a href="<?php echo esc_url( urlencode( the_sub_field('member_website') ) ); ?>" target="_blank"
                            title="Visit our partner <?php the_sub_field('member_name'); ?>">
                            <h4 class="heading-4 font-default"><?php the_sub_field('member_name'); ?></h4>
                        </a>
                        <?php else:?>
                        <h4 class="heading-4 font-default"><?php the_sub_field('member_name'); ?></h4>
                        <?php endif;?>
                        <?php the_sub_field('member_description'); ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>


            <?php endwhile; ?>
        </div>
        <?php endif; ?>


    </div>
</section>