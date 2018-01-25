<?php
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
    while ($query->have_posts()) : $query->the_post(); ?>
        <section class="product">
            <div class="thumbnail">
                <?php the_post_thumbnail('large'); ?>
            </div>
            <div class="content">
                <?php the_title('<h3 class="product__title"><span>', '</span></h3>') ?>
                <div class="product__desc"><?php the_content(); ?></div>
                <div class="gallery">
                    <a href="#" class="gallery__class"><?php _e('Gallery', THEME_OPT); ?></a>
                </div>
                <div class="price">
                    <div class="price__wrap">
                        <span class="price__title"><?php _e('Price', THEME_OPT); ?></span>
                        <span class="price__value"><?php _e('From'); ?> <?php the_field('price'); ?> &euro;</span>
                    </div>
                </div>
            </div>
        </section>
    <?php
    endwhile;
endif;

?>