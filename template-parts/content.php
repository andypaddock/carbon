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
        <div class="row col-10">
            <h1 class="entry-title heading-1"><?php the_title();?></h1>
        </div>
    </section>
    <section class="container">
        <div class="row col-10 entry-content">
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
    <footer class="entry-footer">
        <?php carbon_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->