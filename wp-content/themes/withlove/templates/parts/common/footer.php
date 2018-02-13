<?php
/**
 * The template for displaying footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Withlove
 * @since 1.0
 * @version 1.0
 */

?>
<footer class="footer">
    <div class="block">
        <div class="footer__top">
            <div class="row">
                <div class="col-sm-4">
                    <div class="follow-us">
                        <div class="footer__title"><?php _e('Follow Us', THEME_OPT); ?></div>
                        <ul class="social-list">
                            <li class="social-list__item">
                                <a href="#" target="_blank" class="social-list__link">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="social-list__item">
                                <a href="#" target="_blank" class="social-list__link">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-us">
                        <div class="footer__title"><?php _e('Contact Us', THEME_OPT); ?></div>
                        <div class="footer__phone"><?php echo get_theme_mod('header_phone'); ?></div>
                        <div class="footer__phone"><?php echo get_theme_mod('header_phone_mob'); ?></div>
                        <div class="footer__email">
                            <a href="mailto:murano.art.gallery@gmail.com">murano.art.gallery@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="location">
                        <div class="footer__title"><?php _e('Location', THEME_OPT); ?></div>
                        <?php
                        if ( function_exists('dynamic_sidebar') )
                            dynamic_sidebar('footer-sidebar');
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="copyright">
                &copy; <?php echo date('Y'); ?>
                <?php _e('Murano Art Gallery. All rights reserved') ?>
            </div>
        </div>
    </div>
</footer>