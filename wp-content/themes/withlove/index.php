<?php
/**
 * The main template file
 *
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