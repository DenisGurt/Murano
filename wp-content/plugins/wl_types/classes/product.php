<?php

class ProductType{

    function __construct(){
        add_action('init', array($this, 'register_type'));
        add_action('init', array($this, 'register_taxonomy'));
    }

    public function register_type() {
        $labels = array(
            'name'               => _x( 'Products', 'post type general name', 'withlove' ),
            'singular_name'      => _x( 'Product', 'post type singular name', 'withlove' ),
            'menu_name'          => _x( 'Products', 'admin menu', 'withlove' ),
            'name_admin_bar'     => _x( 'Products', 'add new on admin bar', 'withlove' ),
            'add_new'            => _x( 'Add Product', 'brand', 'withlove' ),
            'add_new_item'       => __( 'Add new Product', 'withlove' ),
            'new_item'           => __( 'New Product', 'withlove' ),
            'edit_item'          => __( 'Edit Product', 'withlove' ),
            'view_item'          => __( 'View Product', 'withlove' ),
            'all_items'          => __( 'All Products', 'withlove' ),
            'search_items'       => __( 'Search Product', 'withlove' ),
            'parent_item_colon'  => __( 'Product Parent:', 'withlove' ),
            'not_found'          => __( 'Not found Product', 'withlove' ),
            'not_found_in_trash' => __( 'No found Product in trash', 'withlove' )
        );
        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description', 'withlove' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'product', 'with_front' => true ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 60,
            'menu_icon'          => 'dashicons-products',
            'supports'           => array( 'title', 'editor' )
        );
        register_post_type('product', $args);
    }

     public function register_taxonomy()
     {
         $labels = array(
             'name' => _x('Product Category', 'taxonomy general name', 'withlove'),
             'singular_name' => _x('Category', 'taxonomy singular name', 'withlove'),
             'search_items' => __('Search Category', 'withlove'),
             'all_items' => __('All Categories', 'withlove'),
             'parent_item' => __('Parent Category', 'withlove'),
             'parent_item_colon' => __('Parent Category:', 'withlove'),
             'edit_item' => __('Edit Category', 'withlove'),
             'update_item' => __('Update Category', 'withlove'),
             'add_new_item' => __('Add New Category', 'withlove'),
             'new_item_name' => __('New Category Name', 'withlove'),
             'menu_name' => __('Category', 'withlove'),
         );

         $args = array(
             'hierarchical' => true,
             'labels' => $labels,
             'show_ui' => true,
             'show_admin_column' => true,
             'query_var' => true,
         );

         register_taxonomy('product_cat', array('product'), $args);
     }

}