<section class="container section-goals" id="<?php the_sub_field('section_id'); ?>">
    <div class="goals-block row <?php the_sub_field('column_size'); ?>">

        <div class="title-block">
            <h2 class="heading-3"><?php the_sub_field('main_title'); ?></h2>
            <?php the_sub_field('description'); ?>
        </div>



        <div class="goals-wrapper">
            <?php if( have_rows('goals') ): ?>
            <div class="goals tile">
                <?php while( have_rows('goals') ): the_row(); 
        $image = get_sub_field('goal_image');
        ?>
                <div class="goal tile">
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
<!-- <section class="slide-wrapper">
    <div class="firstContainer">
        <h1>Could show project with horizontal scrolling w/ three sections</h1>
        <h2>First Container</h2>
    </div>
    <div class="slidecontainer">
        <div class="description panel blue">
            SCROLL DOWN
        </div>

        <section class="panel red">
            ONE f;lvkfkv;lf fvkfvkflv vf[kv[fgrkv[fgv fv[p,v[,fv vvkopmvpl;gfmvf vvfovkpfv ]]]]] jijoijih hguigyg
            uygfuygf [p[po[pih oh yguyguygug [pk[pk[pk ouhuiohiuhgguyfytdfyfcyfc jnijhihgufugvfugv igguyfufu]]]]]]
        </section>
        <section class="panel orange">
            TWO
        </section>
        <section class="panel purple">
            THREE
        </section>
    </div>
    <div class="lastContainer">
        Last Container
    </div>
</section> -->