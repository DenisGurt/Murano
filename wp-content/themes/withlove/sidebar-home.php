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

$about_pg = WLPages::get_about_pg();
$about_pg_id = pll_get_post($about_pg->ID);
$contact_pg = WLPages::get_contacts_pg();
$contact_pg_id = pll_get_post($contact_pg->ID);
?>

<nav class="nav-home">
    <?php if ($terms) : ?>
        <ul class="nav-home__menu">
            <?php foreach ($terms as $key => $term) : ?>
                <li class="nav-home__link nav__link--slider <?php echo ($key === 0) ? 'nav-home__link--active' : ''?>" data-item="<?php echo $key; ?>">
                    <a href="#">
                        <?php // $term_img_ids = get_term_meta($term->term_id, 'showcase-taxonomy-image-id'); ?>
                        <?php // echo wp_get_attachment_image($term_img_ids[0]); ?>
                        <span><?php echo $term->name; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
            <div class="delimiter fi flaticon-floral-design-of-delicate-shapes"></div>
            <li class="nav-home__link">
                <a href="<?php the_permalink($about_pg_id); ?>">
                    <span><?php echo get_the_title($about_pg_id); ?></span>
                </a>
            </li>
            <li class="nav-home__link">
                <a href="<?php the_permalink($contact_pg_id); ?>">
                    <span><?php echo get_the_title($contact_pg_id); ?></span>
                </a>
            </li>
        </ul>
    <?php endif; ?>
</nav>