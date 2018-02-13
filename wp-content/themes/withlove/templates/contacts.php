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
                            <?php _e('Brentani str. 11, 6900 Lugano, Switzerland', THEME_OPT); ?>
                        </li>
                        <li class="phone">
                            <i class="fa fa-phone"></i>
                            +48 012 432 4323
                        </li>
                        <li class="schedule">
                            <i class="fa fa-clock-o"></i>
                            Mn - Fr 8:00 - 17:00
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <?php get_template_part('templates/parts/common/footer'); ?>
    </div>

</div>

<?php get_footer();