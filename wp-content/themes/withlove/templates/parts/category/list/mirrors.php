<?php
/**
 * Template part for displaying part for Mirrors category in taxonomy.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Withlove
 * @since 1.0
 * @version 1.0
 */

$term_obj = get_queried_object();

$args = array(
    'posts_per_page' => -1,
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'tax_query'      => array(
        array(
            'taxonomy' => $term_obj->taxonomy,
            'field'    => 'slug',
            'terms'    => $term_obj->slug,
        )
    )
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        get_template_part('templates/parts/category/content/content', $term_obj->slug);
    endwhile;
    wp_reset_postdata();
endif;

?>