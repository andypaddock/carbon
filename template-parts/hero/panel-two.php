<div class="row hero--panel-two sticky-cols" id="topcontent">
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