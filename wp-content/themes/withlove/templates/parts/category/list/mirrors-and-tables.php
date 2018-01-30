<?php
/**
 * Template part for displaying part for Mirrors & Tables category in taxonomy.php
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
    while ($query->have_posts()) : $query->the_post(); ?>
        <section class="product">
            <div class="thumbnail">
                <?php
                $image = get_field('thumb');

                if (!empty($image)): ?>

                    <img src="<?php echo $image['sizes']['large']; ?>" />

                <?php endif; ?>
            </div>
            <div class="content">
                <?php the_title('<h3 class="product__title"><span>', '</span></h3>') ?>
                <div class="product__desc"><?php the_content(); ?></div>
                <div class="parameters">
                    <?php if (get_field('type') === 'single') : ?>
                        <table>
                            <?php if (get_field('height')) : ?>
                                <tr>
                                    <th><?php _e('Height', THEME_OPT); ?></th>
                                    <td><?php the_field('height'); ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if (get_field('width')) : ?>
                                <tr>
                                    <th><?php _e('Width', THEME_OPT); ?></th>
                                    <td><?php the_field('width'); ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if (get_field('depth')) : ?>
                                <tr>
                                    <th><?php _e('Depth', THEME_OPT); ?></th>
                                    <td><?php the_field('depth'); ?></td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    <?php endif; ?>
                </div>
                <div class="gallery">
                    <a href="#" class="gallery__class"><?php _e('Gallery', THEME_OPT); ?></a>
                </div>
                <div class="price">
                    <div class="price__wrap">
                        <span class="price__title"><?php _e('Price', THEME_OPT); ?></span>
                        <span class="price__value"><?php the_field('price'); ?> CHF</span>
                    </div>
                </div>
            </div>
        </section>
    <?php
    endwhile;
endif;

?>