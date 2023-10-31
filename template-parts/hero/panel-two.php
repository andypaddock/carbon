<!-- <div class="row hero--panel-two">
    <?php $panelTwo = get_sub_field('panel_two'); ?>
    <div class="panel-two--text">
        <h3 class="heading-2 heading-2--map"><?php echo $panelTwo['intro_text']; ?></h3>
        <div class="map-elements">
            <?php if( have_rows('panel_two') ):?>
            <?php while ( have_rows('panel_two') ) : the_row(); 

    if( have_rows('map_element') ): while ( have_rows('map_element') ) : the_row();?>
            <div class="map-elements--block block-<?php echo get_row_index(); ?>">
                <h3 class="heading-2 heading-2--map"><?php the_sub_field('title');?></h3>
                <?php the_sub_field('description');?>
            </div>
            <?php endwhile; endif;

endwhile;?> <?php endif;?>
        </div>
    </div>
    <div class="panel-two--map">
        <div class="sticky-map">
            <?php get_template_part('inc/img/main-map'); ?></div>
    </div>
</div> -->


<div class="row hero--panel-two sticky-cols">
    <?php $panelTwoAlt = get_sub_field('panel_two_alt'); ?>
    <div class="panel-two--text">
        <div class="map-elements alternate">
            <p><?php echo $panelTwoAlt['starter_text']; ?>

                <?php if( have_rows('panel_two_alt') ):?>
                <?php while ( have_rows('panel_two_alt') ) : the_row(); 

    if( have_rows('map_element_alt') ): while ( have_rows('map_element_alt') ) : the_row();?>

                <span id="block-<?php echo get_row_index(); ?>"><?php the_sub_field('title');?></span>
                <?php the_sub_field('description');?>

                <?php endwhile; endif;

endwhile;?> <?php endif;?>
            </p>
        </div>
    </div>
    <div class="panel-two--filler">


        <?php if( have_rows('panel_two_alt') ):?>
        <?php while ( have_rows('panel_two_alt') ) : the_row(); 

    if( have_rows('map_element_alt') ): while ( have_rows('map_element_alt') ) : the_row();?>

        <div class="marker trigger-<?php echo get_row_index(); ?>"><span class=""></span></div>

        <?php endwhile; endif;

endwhile;?> <?php endif;?>

    </div>
    <div class="panel-two--map">
        <div class="sticky-map">
            <?php get_template_part('inc/img/main-map'); ?></div>
    </div>
</div>