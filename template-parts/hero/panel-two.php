<div class="row hero--panel-two">
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
</div>