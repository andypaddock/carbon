<?php if (have_rows('page_elements')) : ?>
<?php while (have_rows('page_elements')) : the_row(); ?>
<?php if (get_row_layout() == 'partners') : ?>
<?php get_template_part('template-parts/partners'); ?>
<?php elseif (get_row_layout() == 'buyers') : ?>
<?php get_template_part('template-parts/buyers'); ?>

<?php elseif (get_row_layout() == 'numbers') : ?>
<?php get_template_part('template-parts/numbers'); ?>
<?php elseif (get_row_layout() == 'faq') : ?>
<?php get_template_part('template-parts/faq'); ?>
<?php elseif (get_row_layout() == 'hero') : ?>
<?php get_template_part('template-parts/hero'); ?>
<?php elseif (get_row_layout() == 'project') : ?>
<?php get_template_part('template-parts/project'); ?>
<?php elseif (get_row_layout() == 'news') : ?>
<?php get_template_part('template-parts/news_feed'); ?>
<?php elseif (get_row_layout() == 'map') : ?>
<?php get_template_part('template-parts/map'); ?>










<?php elseif (get_row_layout() == 'text_block') : ?>
<?php get_template_part('template-parts/text_block'); ?>
<?php elseif (get_row_layout() == 'section_tabbed') : ?>
<?php get_template_part('template-parts/section_tabbed'); ?>
<?php elseif (get_row_layout() == 'triple_image') : ?>
<?php get_template_part('template-parts/triple_image_block'); ?>
<?php elseif (get_row_layout() == 'single_image') : ?>
<?php get_template_part('template-parts/single_image_block'); ?>
<?php elseif (get_row_layout() == 'testimonial') : ?>
<?php get_template_part('template-parts/testimonial'); ?>
<?php elseif (get_row_layout() == 'hero_image') : ?>
<?php get_template_part('template-parts/hero'); ?>
<?php elseif (get_row_layout() == 'text_image_block') : ?>
<?php get_template_part('template-parts/text_image_block'); ?>
<?php elseif (get_row_layout() == 'post_block') : ?>
<?php get_template_part('template-parts/filter_post_block'); ?>
<?php elseif (get_row_layout() == 'modal_box') : ?>
<?php get_template_part('template-parts/modal_box'); ?>
<?php elseif (get_row_layout() == 'map_block') : ?>
<?php get_template_part('template-parts/map'); ?>
<?php elseif (get_row_layout() == 'table_block') : ?>
<?php get_template_part('template-parts/table_block'); ?>
<?php elseif (get_row_layout() == 'team_block') : ?>
<?php get_template_part('template-parts/team_block'); ?>
<?php elseif (get_row_layout() == 'contact_block') : ?>
<?php get_template_part('template-parts/contact_block'); ?>
<?php elseif (get_row_layout() == 'reuse_triple') : ?>
<?php get_template_part('template-parts/reuse_triple'); ?>
<?php elseif (get_row_layout() == 'page_title') : ?>
<?php get_template_part('template-parts/page_title'); ?>
<?php elseif (get_row_layout() == 'card') : ?>
<?php get_template_part('template-parts/card'); ?>
<?php elseif (get_row_layout() == 'product_feature') : ?>
<?php get_template_part('template-parts/product-feature'); ?>
<?php elseif (get_row_layout() == 'product_best') : ?>
<?php get_template_part('template-parts/product-best'); ?>
<?php elseif (get_row_layout() == 'recipe_archive') : ?>
<?php get_template_part('template-parts/recipe-archive'); ?>
<?php elseif (get_row_layout() == 'event_archive') : ?>
<?php get_template_part('template-parts/event-archive'); ?>
<?php elseif (get_row_layout() == 'timeline') : ?>
<?php get_template_part('template-parts/timeline'); ?>
<?php elseif (get_row_layout() == 'shop_block') : ?>
<?php get_template_part('template-parts/shop_block'); ?>
<?php elseif (get_row_layout() == 'gallery') : ?>
<?php get_template_part('template-parts/gallery'); ?>
<?php elseif (get_row_layout() == 'text') : ?>
<?php get_template_part('template-parts/text'); ?>
<?php elseif (get_row_layout() == 'testimonials') : ?>
<?php get_template_part('template-parts/testimonials'); ?>
<?php elseif (get_row_layout() == 'events-map') : ?>
<?php get_template_part('template-parts/events-map'); ?>
<?php elseif (get_row_layout() == 'cta_banner') : ?>
<?php get_template_part('template-parts/cta_banner'); ?>
<?php elseif (get_row_layout() == 'image_map') : ?>
<?php get_template_part('template-parts/image_map'); ?>
<?php elseif (get_row_layout() == 'latest-blocks') : ?>
<?php get_template_part('template-parts/latest-blocks'); ?>
<?php elseif (get_row_layout() == 'accord') : ?>
<?php get_template_part('template-parts/accord'); ?>
<?php elseif (get_row_layout() == 'title') : ?>
<?php get_template_part('template-parts/title'); ?>
<?php elseif (get_row_layout() == 'nutrition') : ?>
<?php get_template_part('template-parts/nutrition'); ?>
<?php elseif (get_row_layout() == 'shop_shortcode') : ?>
<?php get_template_part('template-parts/shortcode'); ?>
<?php elseif (get_row_layout() == 'blog_archive') : ?>
<?php get_template_part('template-parts/blog-archive'); ?>
<?php elseif (get_row_layout() == 'spacer') : ?>
<?php get_template_part('template-parts/spacer'); ?>
<?php elseif (get_row_layout() == 'shop-nav') : ?>
<?php get_template_part('template-parts/shop-nav'); ?>
<?php elseif (get_row_layout() == 'news_feed') : ?>
<?php get_template_part('template-parts/news_feed'); ?>
<?php elseif (get_row_layout() == 'awards') : ?>
<?php get_template_part('template-parts/awards'); ?>
<?php elseif (get_row_layout() == 'map') : ?>
<?php get_template_part('template-parts/map'); ?>
<?php elseif (get_row_layout() == 'textimage') : ?>
<?php get_template_part('template-parts/textimage'); ?>
<?php elseif (get_row_layout() == 'bread') : ?>
<?php get_template_part('template-parts/bread'); ?>
<?php elseif (get_row_layout() == 'slidergallery') : ?>
<?php get_template_part('template-parts/slidergallery'); ?>
<?php elseif (get_row_layout() == 'contactdetails') : ?>
<?php get_template_part('template-parts/contactdetails'); ?>
<?php elseif (get_row_layout() == 'formtabs') : ?>
<?php get_template_part('template-parts/formtabs'); ?>
<?php elseif (get_row_layout() == 'mediagallery') : ?>
<?php get_template_part('template-parts/mediagallery'); ?>
<?php elseif (get_row_layout() == 'sublinks') : ?>
<?php get_template_part('template-parts/sublinks'); ?>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>