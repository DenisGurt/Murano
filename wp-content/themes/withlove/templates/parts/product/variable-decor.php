<?php
/**
 * Template part for displaying part for single product
 * Interior decor in single.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Withlove
 * @since 1.0
 * @version 1.0
 */

?>

<table class="table table-sm table-striped">
    <thead>
    <tr class="table-heading">
        <th scope="col"><?php _e('Size', THEME_OPT); ?></th>
        <th scope="col"><?php _e('Height', THEME_OPT); ?></th>
        <th scope="col"><?php _e('Width', THEME_OPT); ?></th>
        <th scope="col"><?php _e('Depth', THEME_OPT); ?></th>
        <th scope="col"><?php _e('Weight', THEME_OPT); ?></th>
        <th scope="col"><?php _e('Price', THEME_OPT); ?></th>
    </tr>
    </thead>
    <?php
    if (have_rows('var_param')) :
        $prices = array();
        $var = 1;
        ?>
        <tbody>
        <?php while (have_rows('var_param')) : the_row(); ?>
            <tr>
                <td><?php the_sub_field('size') || the_sub_field('var'); ?></td>
                <td><?php the_sub_field('height'); ?></td>
                <td><?php the_sub_field('width'); ?></td>
                <td><?php the_sub_field('depth'); ?></td>
                <td><?php the_sub_field('weight'); ?></td>
                <td><b><?php the_sub_field('price'); ?></b></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    <?php endif; ?>
</table>