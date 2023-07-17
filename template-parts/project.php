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
<section class="slide-wrapper">
    <div class="firstContainer">
        <h1>Could show project with horizontal scrolling w/ three sections</h1>
        <h2>First Container</h2>
    </div>
    <div class="slidecontainer">
        <div class="description panel blue">
            SCROLL DOWN
        </div>

        <section class="panel red">
            ONE
        </section>
        <section class="panel orange">
            TWO
        </section>
        <section class="panel purple">
            THREE
        </section>
    </div>
    <div class="lastContainer">
        Last Container
    </div>
</section>