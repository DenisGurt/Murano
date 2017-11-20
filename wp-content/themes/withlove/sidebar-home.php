<?php
/**
 * The home sidebar container
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
?>

<nav class="nav-home">
    <?php if ($terms) : ?>
        <ul class="nav-home__menu">
            <?php foreach ($terms as $key => $term) : ?>
                <li class="nav-home__link nav__link--slider <?php echo ($key === 0) ? 'nav-home__link--active' : ''?>" data-item="<?php echo $key; ?>">
                    <a href="#">
                        <?php $term_img_ids = get_term_meta($term->term_id, 'showcase-taxonomy-image-id'); ?>
                        <?php echo wp_get_attachment_image($term_img_ids[0]); ?>
                        <span><?php echo $term->name; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</nav>