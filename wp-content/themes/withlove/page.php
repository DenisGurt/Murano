<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Withlove
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <h1 class="text-center"><?php the_title(); ?></h1>

                <?php the_content(); ?>

            </div>
        </div>
    </div>

<?php get_footer(); ?>