<?php
/**
 * Template part for displaying part for set Jewellery product
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
        <th scope="col"><?php _e('Var', THEME_OPT); ?></th>
        <th scope="col"><?php _e('Description', THEME_OPT); ?></th>
        <th scope="col"><?php _e('Price', THEME_OPT); ?></th>
    </tr>
    </thead>
    <?php
    if (have_rows('set_param')) :
        $prices = array();
        $var = 1;
        ?>
        <tbody>
        <?php while (have_rows('set_param')) : the_row();
            $items = get_sub_field('product');
            if (is_array($items)) :
                foreach ($items as $item_id) :
                    if (get_field('type', $item_id) === 'single') : ?>
                        <tr>
                            <td></td>
                            <td><?php the_field('desc', $item_id); ?></td>
                            <td><b><?php the_field('single_price', $item_id); ?></b></td>
                        </tr>
                    <?php
                    else :
                        $vars = get_field('var_param', $item_id);
                        if ($vars) :
                            foreach ($vars as $item) : ?>
                                <tr>
                                    <?php  ?>
                                    <td><?php echo $item['var']; ?></td>
                                    <td><?php echo $item['desc']; ?></td>
                                    <td><b><?php echo $item['price']; ?></b></td>
                                </tr>
                            <?php
                            endforeach;
                        endif;
                    endif;
                endforeach;
            endif;
        endwhile; ?>
        </tbody>
    <?php endif; ?>
</table>