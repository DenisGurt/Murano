<?php
/**
 * Template part for displaying part for Chandeliers category in taxonomy.php
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
            <div class="content">
                <?php the_title('<h3 class="product__title"><span>', '</span></h3>') ?>
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
                <div class="price">
                    <?php
                    if (get_field('single_price')) {
                        $prices = get_field('single_price');
                    } else {
                        $i = 0;
                        $prices = array();
                        $code_type = get_field('code_type');
                        if (have_rows($code_type . '_param')) {
                            while (have_rows($code_type . '_param')) {
                                the_row();
                                if ($code_type === 'magn') {
                                    $prices[$i]['amount'] = get_sub_field('price');
                                } else {
                                    $prices = get_sub_field('price');
                                }
                                $i++;
                            }
                        }
                    }

                    if ($prices && is_array($prices)) :
                        usort($prices, 'sort_by_amount');
                    ?>
                        <?php if (count($prices) > 1) : ?>
                            <div class="price__wrap left">
                                <span class="price__title"><?php _e('Price', THEME_OPT); ?></span>
                                <span class="price__value"><?php _e('from'); ?> <?php echo array_shift($prices)['amount']; ?> CHF</span>
                            </div>
                            <div class="price__wrap right">
                                <span class="price__title"><?php _e('Price', THEME_OPT); ?></span>
                                <span class="price__value"><?php _e('to'); ?> <?php echo array_pop($prices)['amount']; ?> CHF</span>
                            </div>
                        <?php else : ?>
                            <div class="price__wrap single">
                                <span class="price__title"><?php _e('Price', THEME_OPT); ?></span>
                                <span class="price__value"><?php echo $prices[0]['amount']; ?> CHF</span>
                            </div>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php var_dump($prices); ?>
                    <?php endif; ?>
                </div>
                <div class="buttons">
                    <a href="<?php the_permalink(); ?>" class="btn primary-btn"><?php _e('Show more', THEME_OPT); ?></a>
                    <a href="#" class="btn order-btn"><?php _e('Contact with us', THEME_OPT); ?></a>
                </div>
            </div>
            <div class="thumbnail">
                <?php
                $image = get_field('thumb');

                if (!empty($image)): ?>

                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />

                <?php endif; ?>
            </div>
        </section>
    <?php
    endwhile;
endif;

?>