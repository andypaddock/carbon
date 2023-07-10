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
    <div class="site-footer--upper">

        <div class="footer-contact container">
            <div class="row fade-wrapper">
                <div id="fade-container">
                    <?php if( have_rows('quest_title','options') ): ?>
                    <?php while( have_rows('quest_title','options') ): the_row(); ?>
                    <h1 class="heading-1 heading-1--extra fade-item"><?php the_sub_field('question'); ?></h1>
                    <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>
            <div class="row col-8 contact-wrapper">
                <div class="footer-contact--title">

                </div>
                <div class="carbon-form">
                    <div class="carbon-form--text">
                        <h3 class="footer-form-title">
                            <span><?php the_field('form_intro','options'); ?></span><?php the_field('form_title','options'); ?>
                        </h3>
                        <?php the_field('form_desc','options'); ?>
                        <?php
                                                $link = get_field('form_link', 'options');
                                                if ($link) :
                                                    $link_url = $link['url'];
                                                    $link_title = $link['title'];
                                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                        <a class="button" href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?><i
                                class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        <?php endif; ?>
                    </div>
                    <div class="carbon-form-embed"><?php the_field('form_embed','options'); ?></div>
                </div>
            </div>
            <video id="video" width="100%" height="100%" autoplay loop muted poster="">
                <source src="https://noiseless-dinner.mysites.io/wp-content/uploads/2023/07/359-30seconds.mp4"
                    type="video/mp4">
            </video>
        </div>

    </div>
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