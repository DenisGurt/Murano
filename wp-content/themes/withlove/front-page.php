<?php
/**
 * The front page template file
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

get_header(); ?>

<?php the_title('<h1 class="sr-only">', '</h1>'); ?>

<?php get_sidebar('home'); ?>

<?php
$args = array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
);
$terms = get_terms( $args );
?>
    <?php if ($terms) : ?>
        <section class="home__slider">
            <?php foreach ($terms as $key => $term) : ?>
                <?php
                $image = get_field('cat_bg', 'term_'.$term->term_id);
                $bg_src = get_stylesheet_directory_uri() . '/assets/images/slide1.jpg';

                if( $image ) {
                    $bg_src = $image['sizes']['wl-large'];
                }

                ?>
                <div class="home__slider__item" style="background-image: url(<?php echo $bg_src; ?>)">
                    <div class="home__slider__content term">
                        <h2 class="term__title">
                            <?php echo $term->name; ?>
                        </h2>
                        <p></p>
<!--                        <div class="term__description">--><?php //echo $term->description; ?><!--</div>-->
                        <a href="<?php echo get_category_link($term->term_id); ?>" class="btn term__link">
                            <?php echo __('More about', THEME_OPT) . ' ' . $term->name; ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>

<?php get_footer(); ?>