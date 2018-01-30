<?php
/**
 * Template part for displaying filtering for Mirrors & Tables category in taxonomy.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Withlove
 * @since 1.0
 * @version 1.0
 */

?>
<section class="filtering">
    <h2 class="filtering__title">Filtering</h2>
    <div class="filter">
        <div class="filter__cat">
            <?php if (get_field('category')) : ?>
                <span><?php _e('Category', THEME_OPT); ?></span>
                <select name="filter-cat" id="filter-cat">
                    <option><?php _e('All', THEME_OPT); ?></option>
                    <?php
                    $category = get_field_object('category');
                    if (isset($category['choices'])) :
                        foreach ($category['choices'] as $key => $title) : ?>
                            <option value="<?php echo $key; ?>"><?php echo trans_acf_option($title); ?></option>
                        <?php
                        endforeach;
                    endif; ?>
                </select>
            <?php endif; ?>
        </div>
        <div class="filter__family">
            <?php if (get_field('family')) : ?>
                <span><?php _e('Family', THEME_OPT); ?></span>
                <select name="filter-family" id="filter-family">
                    <option><?php _e('All', THEME_OPT); ?></option>
                    <?php
                    $family = get_field_object('family');
                    if (isset($family['choices'])) :
                        foreach ($family['choices'] as $key => $title) : ?>
                            <option value="<?php echo $key; ?>"><?php echo trans_acf_option($title); ?></option>
                        <?php
                        endforeach;
                    endif; ?>
                </select>
            <?php endif; ?>
        </div>
        <div class="filter__price">
            <span><?php _e('Price') ?></span>
            <select name="filter-price" id="filter-price">
                <option><?php _e('All', THEME_OPT); ?></option>
                <option value="low"><?php _e('Low', THEME_OPT); ?></option>
                <option value="high"><?php _e('High', THEME_OPT); ?></option>
            </select>
        </div>
    </div>
</section>