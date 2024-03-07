<?php $heroImage = get_sub_field('hero_image');?><section class="hero">
    <div class="cloud-one">
        <img src="/wp-content/uploads/2023/10/cloud0011.webp">
    </div>
    <div class="header--scroll container">
        <div class="center-wrapper">
            <a href="#topcontent">
                <div class="center bounce">
                    <i class="fa-sharp fa-light fa-chevron-down"></i>
                </div>
            </a>
        </div>
    </div>
    <div class="container map-clouds">

        <?php get_template_part('template-parts/hero/panel-one'); ?>

        <?php get_template_part('template-parts/hero/panel-two'); ?>
        <div class="post-video"><?php 
$image = get_sub_field('hero_image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}?></div>

    </div>
    <?php get_template_part('template-parts/hero/panel-three'); ?>

</section>