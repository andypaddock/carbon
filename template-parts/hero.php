<div class="cloud-one">
    <img src="/wp-content/uploads/2023/08/cloud001-scaled.webp">
</div>
<!-- <div class="cloud-two">
    <img src="/wp-content/uploads/2023/08/cloud003-scaled.webp">
</div> -->

<!-- <div class="cloud-three">
    <img src="/wp-content/uploads/2023/08/cloud003-scaled.webp">
</div> -->
<!-- <div class="cloud-four">
    <img src="/wp-content/uploads/2023/08/cloud001-scaled.webp">
</div> -->
<!-- <div class="cloud-five">
    <img src="/wp-content/uploads/2023/08/cloud002-scaled.webp">
</div> -->

<?php $heroImage = get_sub_field('hero_image');?><section class="hero">

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