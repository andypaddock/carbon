<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Carbon_Project
 */

?>

<footer id="colophon" class="site-footer">
    <div class="site-footer--upper container"></div>
    <div class="site-footer--lower container">
        <div class="row col-10">
            <div class="footer__social"><?php if (have_rows('social_media_links', 'options')) : ?>
                <ul class="social-links">
                    <?php while (have_rows('social_media_links', 'options')) : the_row(); ?>

                    <li>
                        <?php
                                                $link = get_sub_field('link', 'options');
                                                if ($link) :
                                                    $link_url = $link['url'];
                                                    $link_title = $link['title'];
                                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                        <a href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"><?php the_sub_field('icon', 'options'); ?></a>
                        <?php endif; ?>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>

            <div class="silverless">
                <a href="https://silverless.co.uk">
                    <?php get_template_part('inc/img/silverless', 'logo'); ?>
                </a>
            </div>
            <div class="contacts">
                <div class="email"><?php
                                $link = get_field('email', 'options');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                    <a href="<?php echo esc_url($link_url); ?>"
                        target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>
                </div>
                <div class="phone"><?php
                                $link = get_field('phone_number', 'options');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                    <a href="<?php echo esc_url($link_url); ?>"
                        target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>

</html>