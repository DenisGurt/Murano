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
$term_obj = get_queried_object();
$term_id = $term_obj->term_id;
$term_slug = get_query_var('product_cat');
$image = get_field('cat_bg', 'term_'.$term_id);
$bg_src = get_stylesheet_directory_uri() . '/assets/images/slide1.jpg';

if ($image) {
    $bg_src = $image['sizes']['wl-large'];
}

get_header(); ?>

<?php the_title('<h1 class="sr-only">', '</h1>'); ?>

<div id="category">
    <div id="sidebar">
        <?php get_sidebar(); ?>
    </div>

    <div id="content">
        <section class="banner" style="background-image: url(<?php echo $bg_src; ?>);">
            <div class="banner__wrap">
                <h1 class="banner__title">
                    <?php echo $term_obj->name; ?>
                </h1>
                <div class="banner__description">
                    <?php echo $term_obj->description;?>
                </div>
            </div>
        </section>

        <?php get_template_part('/templates/parts/category/filtering/filter', $term_slug); ?>

        <?php get_template_part('/templates/parts/category/list/' . $term_slug); ?>
    </div>
</div>

<?php get_footer(); ?>