<?php
/**
 * The left sidebar container
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Withlove
 * @since 1.0
 * @version 1.0
 */

$args = array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
);
$terms = get_terms( $args );

$current_term = get_query_var('product_cat');
?>

<nav class="nav__inner">
    <?php if ($terms) : ?>
        <ul class="nav__menu">
            <?php foreach ($terms as $key => $term) : ?>
                <li class="nav__link nav__link--slider <?php echo ($current_term === $term->slug) ? 'nav__link--active' : ''?>" data-item="<?php echo $key; ?>">
                    <a href="<?php echo get_category_link($term->term_id); ?>">
                        <?php // $term_img_ids = get_term_meta($term->term_id, 'showcase-taxonomy-image-id'); ?>
                        <?php // echo wp_get_attachment_image($term_img_ids[0]); ?>
                        <span><?php echo $term->name; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</nav>