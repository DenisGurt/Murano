<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Withlove
 * @since 1.0
 * @version 1.0
 */

$post_id = get_the_ID();

get_header();
the_title('<h1 class="sr-only">', '</h1>'); ?>

<div id="product">
    <div id="sidebar">
        <?php get_sidebar(); ?>
    </div>

    <div id="content">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="product-cart">
                    <div class="product-cart__desc">

                        <?php the_title('<h1 class="product__title"><span>', '</span></h1>') ?>
                        <div class="code">
                            <h6 class="card-subtitle mb-2 text-muted"><?php _e('Code', THEME_OPT); ?>: <?php the_field('code'); ?></h6>
                        </div>
                        <div class="product__desc"><?php the_content(); ?></div>
                        <?php if ($gallery = get_field('gallery')) : ?>
                            <?php $first = true; ?>
                            <div class="gallery">
                                <?php foreach ($gallery as $item) : ?>
                                    <?php if ($first) : ?>
                                        <a class="gallery__link" href="<?php echo $item['url'] ?>" data-exthumbimage="<?php echo $item['sizes']['thumbnail'] ?>">
                                            <svg class="gallery__icon" viewBox="0 0 89 88" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M.3 87.9h87.8V0H.3v87.9zM9.9 9.6h68.6V57L64.8 43.2l-7
                                                     7L38 30.5l-28 28V9.6h-.1zm0 62.3l.1.1 28-27.9 19.8 19.8 7-7
                                                     13.8 13.8v7.6H9.9v-6.4zm53-39.5c-3.81 0-6.9-3.09-6.9-6.9 0-3.81
                                                     3.09-6.9 6.9-6.9 3.81 0 6.9 3.09 6.9 6.9 0 3.81-3.09 6.9-6.9 6.9z">
                                                </path>
                                            </svg>
                                            <?php _e('Gallery', THEME_OPT); ?>
                                        </a>
                                        <?php $first = false; ?>
                                    <?php else : ?>
                                        <div class="item"
                                             style="display: none"
                                             data-src="<?php echo $item['url'] ?>"
                                             data-exthumbimage="<?php echo $item['sizes']['thumbnail'] ?>"></div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <div class="parameters">
                            <table class="table table-sm table-striped param">
                                <tr>
                                    <th scope="col"><?php _e('Height', THEME_OPT); ?></th>
                                    <th scope="col"><?php _e('Width', THEME_OPT); ?></th>
                                    <th scope="col"><?php _e('Depth', THEME_OPT); ?></th>
                                    <th scope="col"><?php _e('Weight', THEME_OPT); ?></th>
                                    <th scope="col"><?php _e('Price', THEME_OPT); ?></th>
                                </tr>
                                <tr>
                                    <td><?php _e('cm', THEME_OPT); ?></td>
                                    <td><?php _e('cm', THEME_OPT); ?></td>
                                    <td><?php _e('cm', THEME_OPT); ?></td>
                                    <td><?php _e('kg', THEME_OPT); ?></td>
                                    <td><?php _e('CHF', THEME_OPT); ?></td>
                            </table>
                            <?php
                            if (get_field('type') === 'single') {
                                get_template_part('templates/parts/product/single');
                            } elseif (get_field('type')) {
                                if (is_mirror_cat($post_id)) {
                                    get_template_part('templates/parts/product/variable', 'mirror');
                                } elseif (is_decor_cat($post_id)) {
                                    get_template_part('templates/parts/product/variable', 'decor');
                                } else {
                                    get_template_part('templates/parts/product/variable');
                                }
                            } else {
                                get_template_part('templates/parts/product/set', 'jewellery');
                            }

                            if (get_field('set')) : ?>
                                <h4 class="table-title"><?php _e('Set table', THEME_OPT); ?></h4>
                                <table class="table table-sm table-striped set">
                                    <tr>
                                        <th scope="col"><?php _e('Title', THEME_OPT); ?></th>
                                        <th scope="col"><?php _e('Price', THEME_OPT); ?></th>
                                    </tr>
                                    <?php if (have_rows('set_options')) : ?>
                                        <?php while (have_rows('set_options')) : the_row(); ?>
                                            <tr>
                                                <td><?php the_sub_field('title'); ?></td>
                                                <td><b><?php the_sub_field('price'); ?></b></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </table>
                            <?php endif; ?>
                        </div>
                        <button type="button" class="btn order-btn" data-toggle="modal" data-target="#contactModal">
                            <?php _e('Contact with us', THEME_OPT); ?>
                        </button>
                    </div>
                    <div class="product-cart__thumb">
                        <?php
                        $image = get_field('thumb');

                        if (!empty($image)): ?>

                            <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />

                        <?php endif; ?>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
