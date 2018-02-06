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

$post_id = get_the_ID();
?>

<table class="table table-sm">
    <tr>
        <th scope="col"><?php _e('Height', THEME_OPT); ?></th>
        <th scope="col"><?php _e('Width', THEME_OPT); ?></th>
        <th scope="col"><?php _e('Depth', THEME_OPT); ?></th>
        <th scope="col"><?php _e('Weight', THEME_OPT); ?></th>
        <?php if (is_mirror_cat($post_id)) : ?>
            <th scope="col"><?php _e('Price ', THEME_OPT); ?></th>
        <?php endif; ?>
    </tr>
    <tr>
        <td><?php the_field('height'); ?></td>
        <td><?php the_field('width'); ?></td>
        <td><?php the_field('depth'); ?></td>
        <td><?php the_field('weight'); ?></td>
        <?php if (is_mirror_cat($post_id)) : ?>
            <td><b><?php the_field('single_price'); ?></b></td>
        <?php endif;     ?>
    </tr>
</table>
<?php $single_price = get_field_object('single_price'); ?>

<?php if ($single_price['type'] === 'repeater') : ?>
    <h4 class="table-title"><?php _e('Price table', THEME_OPT); ?></h4>
    <table class="table table-sm">
        <tr class="table-heading">
            <?php foreach($single_price['sub_fields'][0]['choices'] as $title) : ?>
                <th scope="col"><?php echo $title; ?></th>
            <?php endforeach; ?>
        </tr>
        <tr>
            <?php foreach($single_price['value'] as $item) : ?>
                <td><?php echo $item['amount']; ?></td>
            <?php endforeach; ?>
        </tr>
    </table>
<?php endif; ?>
