<section class="panel-project">
    <div class="container">
        <div class="row extended">
            <div class="project-image">
                <?php 
$image = get_sub_field('project_image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}?></div>
        </div>
        <?php get_template_part('template-parts/project/panel-one'); ?>
        <?php get_template_part('template-parts/project/panel-two'); ?>
        <?php get_template_part('template-parts/project/panel-three'); ?>
        <?php get_template_part('template-parts/project/panel-four'); ?>
    </div>
</section>