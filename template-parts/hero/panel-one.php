<div class="row hero--panel-one">
    <?php $panelOne = get_sub_field('panel_one'); ?>
    <div class="hero-top-header">
        <div class="header--logo"><?php get_template_part('inc/img/chyulu'); ?></div>
        <div class="header--text">
            <h1 class="heading-1 heading-1--hero">
                <?php echo $panelOne['main']; ?><span><?php echo $panelOne['main_inter']; ?></span></h1>
            <h1 class="heading-1 heading-1--hero">
                <?php echo $panelOne['sub']; ?><span><?php echo $panelOne['sub_inter']; ?></span></h1>
        </div>

    </div>
</div>
<div class="hero--panel-one--image">
    <?php 
$image = get_sub_field('panel_one_image');
$size = 'hero-image'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}?>
</div>