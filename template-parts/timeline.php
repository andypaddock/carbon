<section class="container section-timeline" id="<?php the_sub_field('section_id'); ?>">
    <div class="timeline-block row overflow">

        <div class="title-block">
            <h2 class="heading-3"><?php the_sub_field('main_title'); ?></h2>
        </div>



        <div class="timeline-wrapper">
            <?php if( have_rows('time') ): ?>
            <div class="timeline">
                <?php while( have_rows('time') ): the_row();?>
                <div class="date">
                    <div class="date--year">
                        <h3 class="heading-2 heading-2--map"><?php the_sub_field('date_year'); ?></h3>
                    </div>
                    <div class="date--line">
                        <div class="left"></div>
                        <div class="right"></div>
                    </div>
                    <div class="date--description">
                        <?php the_sub_field('date_description'); ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>