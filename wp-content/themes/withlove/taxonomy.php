<?php
/**
 * The category template file
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
$term_id = get_queried_object()->term_id;
$term_slug = get_query_var('product_cat');
$image = get_field('cat_bg', 'term_'.$term_id);
$bg_src = get_stylesheet_directory_uri() . '/assets/images/slide1.jpg';

if( $image ) {
    $bg_src = $image['sizes']['wl-large'];
}

get_header(); ?>

<?php the_title('<h1 class="sr-only">', '</h1>'); ?>

<?php get_sidebar(); ?>

<section class="section section__bg" style="background-image: url(<?php echo $bg_src; ?>);"></section>

<?php get_footer(); ?>