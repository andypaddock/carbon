<?php 
$image = get_sub_field('project_image');
$size = 'full'; ?>
<div class="project--panel-one-wrapper container"
    style="background-image: url(<?php echo $image['sizes']['hero-image']; ?>)">

    <div class="row project--panel-one">
        <div class="project-intro">
            <h2 class="heading-3"><?php the_sub_field('main_title');?></h2>
            <?php the_sub_field('project_description');?>
        </div>
    </div>

    <!-- <div class="row extended project-bleed">
            </div> -->

</div>