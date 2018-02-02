<?php

wpcf7_add_form_tag('object', 'wpcf7_product_title_shortcode_handler', true);

function wpcf7_product_title_shortcode_handler($tag) {
    global $post;
    if (!is_object($tag)) return '';

    $name = $tag->name;
    if (empty($name)) return '';

    $post_title = get_the_title($post->ID);
    $html = '<input type="text" name="' . $name . '" value="' . $post_title . '" disabled />';
    return $html;
}