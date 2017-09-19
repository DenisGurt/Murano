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

    </section>

<?php get_footer(); ?>