<section class="container section-buyers" id="<?php the_sub_field('section_id'); ?>">
    <div class="buyers-block row <?php the_sub_field('column_size'); ?>">

        <div class="title-block">
            <h2 class="heading-3"><?php the_sub_field('main_title'); ?></h2>
            <?php the_sub_field('description'); ?>
        </div>



        <div class="buyers-group">
            <?php if( have_rows('group_members') ): ?>
            <div class="partner-group--buyers">
                <?php while( have_rows('group_members') ): the_row(); 
        $image = get_sub_field('member_imagelogo');
        ?>
                <div class="group-member animate-tile">
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
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>



        </div>



    </div>
</section>