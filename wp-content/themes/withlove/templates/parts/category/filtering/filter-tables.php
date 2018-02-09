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

$term_slug = get_query_var('product_cat');
?>
<section class="filtering">
    <h2 class="filtering__title">Filtering</h2>
    <div class="filter">
        <form id="filter" method="post">
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
            <input type="hidden" name="term_slug" value="<?php echo $term_slug; ?>">
            <input type="hidden" name="action" value="wl_cat_filter">
        </form>
    </div>
</section>