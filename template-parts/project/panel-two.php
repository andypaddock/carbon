<div class="container"><div class="row project--panel-two">
    <div class="panel-two--text">
        <h3 class="heading-3 challenge-head"><?php the_sub_field('challenges_title') ?></h3>
        <div class="challenges">
            <?php if( have_rows('challenges') ):?>
            <?php while ( have_rows('challenges') ) : the_row(); ?>


            <div class="challenge">
                <div class="challenge--icon fmleft"><?php 
$image = get_sub_field('icon');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}?></div>
                <div class="challenge--text fmright">
                    <p class="upper"><?php the_sub_field('title');?></p>
                    <?php the_sub_field('description');?>
                </div>
            </div>
            <?php endwhile;  endif;?>
        </div>
    </div>
    <div class="panel-two--video">
        <div class="sticky-video">
            <?php
$video = get_sub_field('challenge_video');?>
            <video id="challenge" tabindex="0" autobuffer="autobuffer" preload="preload"
                src="<?php echo $video['url']; ?>" muted>

            </video>
        </div>
    </div>
</div></div>