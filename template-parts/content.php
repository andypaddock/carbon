<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Carbon_Project
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="container">
        <div class="row extended"><?php carbon_post_thumbnail(); ?></div>
        <div class="row col-8">
            <h1 class="entry-title heading-1"><?php the_title();?></h1>
            <span class="entry-date"><?php echo get_the_date(); ?></span> Posted in: <?php
$categories = get_the_category(); // Get the categories for the current post

if (!empty($categories)) {
    $category_names = array_map(function ($category) {
        return '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . $category->name . '</a>';
    }, $categories);

    echo implode(', ', $category_names);
}
?>
        </div>
    </section>
    <section class="container">
        <div class="back-nav">
            <div class="back-nav--link"><a href="<?php echo site_url(); ?>"
                    title="<?php the_field('header_title', 'options'); ?>"><i class="fa-thin fa-arrow-left"></i>Return
                    to the Carbon Story</a></div>
        </div>
        <div class="entry-content">

            <?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'carbon' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'carbon' ),
				'after'  => '</div>',
			)
		);
		?>
        </div><!-- .entry-content -->
    </section>
</article><!-- #post-<?php the_ID(); ?> -->