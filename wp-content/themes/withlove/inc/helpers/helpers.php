<?php

/**
 * Check is mirror
 *
 * @param $post_id
 * @return bool
 */

function is_mirror_cat($post_id) {

    $cat = get_field('category', $post_id);
    if (in_array($cat, array('mirror', 'table'))) {
        return true;
    }
    return false;
}

/**
 * Check is Interior
 *
 * @param $post_id
 * @return bool
 */
function is_decor_cat($post_id) {

    $cat = get_field('category', $post_id);
    if (in_array($cat, array('vase', 'sculpture', 'glass'))) {
        return true;
    }
    return false;
}

/**
 * Get template part in variable
 *
 * @param $template_name
 * @param null $part_name
 * @return string
 */
function load_template_part($template_name, $part_name=null) {
    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}