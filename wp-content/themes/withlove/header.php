<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Withlove
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <div id="page" class="site">

        <header class="header">
            <!-- Header section -->
            <div class="header__logo">
                <a href="<?php echo home_url(); ?>" class="header__brand">
                    <img src="<?php echo get_theme_mod( 'header_logo' ); ?>" alt="MAG">
                </a>
            </div>
        </header>

