<section class="container section-faq" id="<?php the_sub_field('section_id'); ?>">
    <div class="faq-block row <?php the_sub_field('column_size'); ?>">
        <h2 class="heading-1 heading-1--extra fmtop"><?php the_sub_field('faq_title');?></h2>


        <div class="faq-block--items toggle-block">
            <?php if (have_rows('q_and_a')) : ?>
            <?php $item_count = 0; // Initialize a counter to keep track of item position ?>
            <?php while (have_rows('q_and_a')) : the_row(); ?>
            <?php
        // Determine if the current item is odd or even
        $item_class = ($item_count % 2 == 0) ? 'animate-tile--right' : 'animate-tile--left';
        ?>

            <div class="item <?php echo $item_class; ?>">

                <label>
                    <h2 class="heading-4 font-default"><?php the_sub_field('question'); ?></h2>
                    <i class="fa-sharp fa-light fa-arrow-down-right fa-2x"></i>
                </label>
                <div class="content mb2">
                    <?php the_sub_field('answer'); ?>
                </div>

            </div>

            <?php
        $item_count++; // Increment the counter for the next item
        ?>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>

    </div>
</section>