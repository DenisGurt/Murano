<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Withlove
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php the_title('<h1 class="sr-only">', '</h1>'); ?>

<?php get_sidebar('home'); ?>

    <section class="home__slider">
        <div class="home__slider__item" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/slide1.jpg);" alt="">
            <div class="home__slider__content">
                Slide1
            </div>
        </div>
        <div class="home__slider__item" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/slide2.png);" alt="">
            <div class="home__slider__content">
                Slide2
            </div>
        </div>
    </section>

<?php get_footer(); ?>