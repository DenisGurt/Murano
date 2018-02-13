<?php

/**
 * Template Name: About Us
 */

get_header(); ?>

    <div class="main">
        <?php get_sidebar(); ?>

        <?php
            $bg_img = get_field('banner_bg');

            if (!empty($bg_img)) {
                $bg_url = $bg_img['sizes']['large'];
            }
            else {
                $bg_url = get_stylesheet_directory_uri() . '/assets/images/slide1.jpg';
            }
        ?>

        <div id="content">
            <section class="banner parallax-bg" data-parallax="scroll" data-image-src="<?php echo $bg_url; ?>" data-speed="0.5">
                <div class="banner__wrap">
                    <h1 class="banner__title">
                        <?php the_title(); ?>
                    </h1>
                    <?php while(have_posts()): the_post(); ?>
                        <div class="banner__description">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>

            <?php get_template_part('templates/parts/common/footer'); ?>
        </div>
    </div>

<?php get_footer();
