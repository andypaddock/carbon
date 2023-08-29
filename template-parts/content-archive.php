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
        <div class="row "><?php carbon_post_thumbnail(); ?></div>
        <div class="row">
            <h1 class="entry-title heading-1"><a href="<?php the_permalink()?>"><?php the_title();?></a></h1>
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
        <div class="row entry-content">
            <p><?php
echo wp_trim_words( get_the_content(), 40, '...' );
?></p>
        </div><!-- .entry-content -->
    </section>
</article><!-- #post-<?php the_ID(); ?> -->