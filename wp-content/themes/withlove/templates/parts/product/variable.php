<?php
/**
 * Template part for displaying part for single product in single.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Withlove
 * @since 1.0
 * @version 1.0
 */

$code_type = get_field('code_type'); ?>

<table class="table table-sm table-striped">
    <thead>
    <tr class="table-heading">
        <th scope="col"><?php _e('Var', THEME_OPT); ?></th>
        <th scope="col"><?php _e('Lamps', THEME_OPT); ?></th>
        <th scope="col"><?php _e('Height', THEME_OPT); ?></th>
        <th scope="col"><?php _e('Width', THEME_OPT); ?></th>
        <th scope="col"><?php _e('Depth', THEME_OPT); ?></th>
        <th scope="col"><?php _e('Weight', THEME_OPT); ?></th>
        <?php if ($code_type === 'magn') : ?>
            <th scope="col"><?php _e('Price ', THEME_OPT); ?></th>
        <?php endif; ?>
    </tr>
    </thead>
    <?php
    if (have_rows($code_type . '_param')) :
        $prices = array();
        $var = 1;
        ?>
        <tbody>
        <?php while (have_rows($code_type . '_param')) : the_row(); ?>
            <tr>
                <?php if ($code_type === 'magn') : ?>
                    <td><?php the_sub_field('var'); ?></td>
                <?php else : ?>
                    <td><?php echo $var++; ?></td>
                <?php endif; ?>
                <td><?php the_sub_field('lamps'); ?></td>
                <td><?php the_sub_field('height'); ?></td>
                <td><?php the_sub_field('width'); ?></td>
                <td><?php the_sub_field('depth'); ?></td>
                <td><?php the_sub_field('weight'); ?></td>
                <?php if ($code_type === 'magn') : ?>
                    <td><b><?php the_sub_field('price'); ?></b></td>
                <?php else : ?>
                    <?php
                        $price_obj = get_sub_field_object('price');
                        $prices[] = get_sub_field('price');
                    ?>
                <?php endif; ?>
            </tr>
        <?php endwhile; ?>
        </tbody>
    <?php endif; ?>
</table>
<?php if ($code_type === 'magb') :
    $i = 1;
    ?>
    <h4 class="table-title"><?php _e('Price table', THEME_OPT); ?></h4>
    <table class="table table-sm">
        <tr class="table-heading">
            <th scope="col"><?php _e('Var', THEME_OPT); ?></th>
            <?php foreach($price_obj['sub_fields'][0]['choices'] as $title) : ?>
                <th scope="col"><?php echo $title; ?></th>
            <?php endforeach; ?>
        </tr>
        <?php foreach($prices as $price) : ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <?php foreach ($price as $item) :?>
                    <td><?php echo $item['amount']; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>