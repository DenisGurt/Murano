<?php
/**
 * WithLove: Customizer
 *
 * @package WordPress
 * @subpackage WithLove
 * @since 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wl_customize_register( $wp_customize ) {

    /**
     * Header
     */
    $wp_customize->add_section(
        'header_section',
        array(
            'title' => __('Header', THEME_OPT),
            'description' => 'This is a settings section.',
            'priority' => 30,
        )
    );

    // Image: Logo

    $wp_customize->add_setting('header_logo', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'upload_header_logo', array(
        'label'    => __('Logo', THEME_OPT),
        'section'  => 'header_section',
        'settings' => 'header_logo',
    )));

    // Phone
    $wp_customize->add_setting('header_phone', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('wl_header_phone', array(
        'label'      => __('Phone number', THEME_OPT),
        'section'    => 'header_section',
        'settings'   => 'header_phone',
    ));

    // Phone Mob
    $wp_customize->add_setting('header_phone_mob', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('wl_header_phone_mob', array(
        'label'      => __('Mob. Phone number', THEME_OPT),
        'section'    => 'header_section',
        'settings'   => 'header_phone_mob',
    ));

    /**
     * Footer
     */

    $wp_customize->add_section(
        'footer_section',
        array(
            'title' => __('Footer', THEME_OPT),
            'description' => 'This is a settings section.',
            'priority' => 35,
        )
    );

    $wp_customize->add_setting('footer_copyright', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));
    $wp_customize->add_control('wl_footer_copyright', array(
        'label'      => __('Copyright', THEME_OPT),
        'section'    => 'footer_section',
        'settings'   => 'footer_copyright',
    ));

}
add_action( 'customize_register', 'wl_customize_register' );