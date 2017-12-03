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
$current_term_slug = get_query_var('product_cat');

get_header(); ?>

<?php the_title('<h1 class="sr-only">', '</h1>'); ?>

<?php get_sidebar(); ?>

<section class="section__bg section__<?php echo $current_term_slug; ?>"></section>

<?php get_footer(); ?>