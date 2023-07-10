<section class="container section-numbers" id="<?php the_sub_field('section_id'); ?>">
    <div class="numbers-block row <?php the_sub_field('column_size'); ?>">

        <?php if( have_rows('fact') ): ?>
        <div class="numbers-block--items">
            <?php while( have_rows('fact') ): the_row(); ?>
            <div class="numbers-block--item">
                <div class="counter" data-start="<?php the_sub_field('start_number');?>"
                    data-end="<?php the_sub_field('end_number');?>" data-increment="<?php the_sub_field('increment');?>"
                    data-interval-duration="<?php the_sub_field('speed');?>"
                    data-prefix="<?php the_sub_field('prepend');?>" data-suffix="<?php the_sub_field('append');?>">
                    <span><?php the_sub_field('prepend');?><?php the_sub_field('start_number');?><?php the_sub_field('append');?></span><?php the_sub_field('explanation_text');?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>