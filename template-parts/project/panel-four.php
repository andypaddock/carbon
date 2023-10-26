<div class="container">
    <!-- <div class="row panel-four-head-image"><?php 
$image = get_sub_field('how_intro_image');
$size = 'medium'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}?></div> -->
    <div class="row col-10 project--panel-four">
        <div class="panel-four--text">
            <h3 class="heading-3 how-title">
                <?php the_sub_field('how_title') ?></h3>
            <div class="how-description">
                <?php the_sub_field('how_text') ?>
            </div>
            <div class="how-blocks">
                <?php if( have_rows('how_blocks') ): ?>

                <?php while( have_rows('how_blocks') ): the_row(); ?>
                <div class="how-block animate-down">
                    <span class="how-number"><?php echo get_row_index(); ?>.</span>
                    <?php the_sub_field('explanation'); ?>
                </div>
                <?php endwhile; ?>

                <?php endif; ?>
            </div>
        </div>

    </div>
    <div class="row extended panel-four-video">
        <?php 
$image = get_sub_field('how_intro_image');?>
        <div class="video-img--wrapper">
            <div class="img" style="--background: url(<?php echo esc_url($image); ?>)"></div>
        </div>
        <?php $project_video = get_sub_field('project_video');?>
        <video id="projectvideo" tabindex="0" autobuffer="autobuffer" preload="preload"
            src="<?php echo $project_video['url']; ?>" muted>

        </video>
    </div>
</div>