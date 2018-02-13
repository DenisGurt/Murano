<?php
/**
 * Template part for make query category list in taxonomy.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Withlove
 * @since 1.0
 * @version 1.0
 */

$term_obj = get_queried_object();
$meta_query = array();

if ($term_obj->slug === 'jewellery') {
    $meta_query = array(
        array(
            'key'   => 'category',
            'value' => 'set'
        )
    );
}

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
    ),
    'meta_query'     => $meta_query
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        get_template_part('templates/parts/category/content/content', $term_obj->slug);
    endwhile;
endif;