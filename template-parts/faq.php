<section class="container section-faq" id="<?php the_sub_field('section_id'); ?>">
    <div class="faq-block row <?php the_sub_field('column_size'); ?>">
        <h2 class="heading-1 heading-1--extra fmtop"><?php the_sub_field('faq_title');?></h2>

        <?php if( have_rows('q_and_a') ): ?>
        <div class="faq-block--items toggle-block">
            <?php while( have_rows('q_and_a') ): the_row(); ?>
            <div class="item tile">

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
</section>