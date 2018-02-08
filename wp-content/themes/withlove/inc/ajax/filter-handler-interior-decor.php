<?php
function wl_decor_filter() {
    $category = ($_POST['filter-cat']) ? sanitize_text_field($_POST['filter-cat']) : 'all';
    $term_slug = ($_POST['term_slug']) ? sanitize_text_field($_POST['term_slug']) : '';
    $meta_query = array();

    if ($category && $category !== 'all') {
        $meta_query = array(
            array(
                'key'     => 'category',
                'value'   => array( $category ),
            ),
        );
    }
    $args = array(
        'posts_per_page' => -1,
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $term_slug,
            )
        ),
        'meta_query'     => $meta_query
    );

    $the_query = new WP_Query($args);
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ) : $the_query->the_post();
            // Display 10 posts max
//            if ($the_query->current_post > 9)
//                break;

            echo load_template_part('templates/parts/category/content/content', $term_slug);
        endwhile;
        wp_reset_postdata();
    endif;
    die();
}

add_action('wp_ajax_wl_decor_filter', 'wl_decor_filter');
add_action('wp_ajax_nopriv_wl_decor_filter', 'wl_decor_filter');