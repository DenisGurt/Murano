<?php

/**
 * Template Name: Contacts
 */

get_header(); ?>

<div class="main">
    <?php get_sidebar(); ?>
    <div id="content">
        <section class="contacts">
            <div id="map" class="contacts__left"></div>
            <div class="contacts__right">
                <div class="contacts__wrap">
                    <h1 class="contacts__title"><?php the_title(); ?></h1>
                    <ul class="contacts__list">
                        <li class="address">
                            <i class="fa fa-map-marker"></i>
                            <?php the_field('location') ?>
                        </li>
                        <li class="phone">
                            <i class="fa fa-phone"></i>
                            <?php echo get_theme_mod('header_phone'); ?>
                        </li>
                        <li class="phone-mob">
                            <i class="fa fa-phone"></i>
                            <?php echo get_theme_mod('header_phone_mob'); ?>
                        </li>
                        <li class="schedule">
                            <i class="fa fa-clock-o"></i>
                            <?php the_field('schedule'); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <?php get_template_part('templates/parts/common/footer'); ?>
    </div>

</div>

<?php get_footer();