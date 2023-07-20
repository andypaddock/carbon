<div class="project--panel-one-wrapper container">
    <div class="project-image">
        <?php 
$image = get_sub_field('project_image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}?>
    </div>
    <div class="row project--panel-one">
        <div class="project-intro">
            <h2 class="heading-3"><?php the_sub_field('main_title');?></h2>
            <?php the_sub_field('project_description');?>
        </div>
    </div>
    
            <div class="row extended project-bleed">
            </div>
       
</div>