<?php
/**
 * One house functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage One House
 * @since 1.0
 */

define('THEME_OPT', 'withlove');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function withlove_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
     * If you're building a theme based on Twenty Seventeen, use a find and replace
     * to change THEME_OPT to the name of your theme in all the template files.
     */
    load_theme_textdomain(THEME_OPT, get_stylesheet_directory().'/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // Add One House image sizes
    add_image_size( 'wl-large', 1920, 1920, false );
    add_image_size( 'wl-small', 640, 640, false );

    // Set the default content width.
    $GLOBALS['content_width'] = 730;

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'top'          => __( 'Top Menu', THEME_OPT ),
        'left-sidebar' => __( 'Left Sidebar Menu', THEME_OPT ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ) );

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'withlove_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wl_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', THEME_OPT ),
        'id'            => 'sidebar',
        'description'   => __( 'Add widgets here to appear in your sidebar.', THEME_OPT ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Sidebar', THEME_OPT ),
        'id'            => 'footer-sidebar',
        'description'   => __( 'Add widgets here to appear in your sidebar.', THEME_OPT ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wl_widgets_init' );


/**
 * Enqueue styles.
 */
function wl_styles() {

    // Theme stylesheet.
    wp_enqueue_style( 'wl-style', get_stylesheet_uri() );
    wp_enqueue_style( 'wl-css', get_stylesheet_directory_uri() . '/assets/css/global.min.css' );
}
add_action( 'wp_enqueue_scripts', 'wl_styles' );

/**
 * Enqueue scripts.
 */
function wl_scripts() {

    wp_enqueue_script( 'libs-js', get_stylesheet_directory_uri() . '/assets/js/libs-scripts.min.js', array('jquery'), false, true );

//    $google_key = '';
//    wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=' . $google_key, array(), false, true);

    wp_enqueue_script( 'wl-js', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js', array('jquery'), false, true );
    wp_localize_script( 'wl-js', 'wl_ajax', array(
        'ajaxurl'        => admin_url( 'admin-ajax.php' ),
        'nonce'          => wp_create_nonce( 'wl_nonce_field' )
    ));
}
add_action( 'wp_enqueue_scripts', 'wl_scripts' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 *
 * @since One House 1.0
 */
function wl_excerpt_more( $link ) {
    return '...';
}
add_filter( 'excerpt_more', 'wl_excerpt_more' );

/**
 * Change Excerpt length
 *
 * @param $length
 * @return int
 */
function wl_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'wl_excerpt_length', 999 );

/**
 * Pagination
 *
 * @since One House 1.0
 */


function get_pagenavi_array($wp_query) {
    $big = 999999999;

    $args = array(
        'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'type'      => 'array',
        'mid_size'  => 1,
        'end_size'  => 1,
        'prev_text' => '<span>Previous</span>',
        'next_text' => '<span>Next</span>',
        'current'   => max( 1, get_query_var('paged') ),
        'total'     => $wp_query->max_num_pages,
    );

    $result = paginate_links( $args );

    $result = str_replace( '/page/1/', '', $result );

    return $result;
}

function custom_error_pages(){
    global $wp_query;

    if( isset($_REQUEST['status']) && $_REQUEST['status'] == 403 ){
        $wp_query->is_404 = FALSE;
        $wp_query->is_page = TRUE;
        $wp_query->is_singular = TRUE;
        $wp_query->is_single = FALSE;
        $wp_query->is_home = FALSE;
        $wp_query->is_archive = FALSE;
        $wp_query->is_category = FALSE;
        add_filter('wp_title','custom_error_title',65000,2);
        add_filter('body_class','custom_error_class');
        status_header(403);
        get_template_part('403');
        exit;
    }

    if( isset( $_REQUEST['status'] ) && $_REQUEST['status'] == 401 ){
        $wp_query->is_404 = FALSE;
        $wp_query->is_page = TRUE;
        $wp_query->is_singular = TRUE;
        $wp_query->is_single = FALSE;
        $wp_query->is_home = FALSE;
        $wp_query->is_archive = FALSE;
        $wp_query->is_category = FALSE;
        add_filter('wp_title','custom_error_title',65000,2);
        add_filter('body_class','custom_error_class');
        status_header(401);
        get_template_part('401');
        exit;
    }
}

function custom_error_title($title='',$sep='')
{
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 403)
        return "Forbidden ".$sep." ".get_bloginfo('name');

    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 401)
        return "Unauthorized ".$sep." ".get_bloginfo('name');
}

function custom_error_class($classes)
{
    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 403)
    {
        $classes[]="error403";
        return $classes;
    }

    if(isset($_REQUEST['status']) && $_REQUEST['status'] == 401)
    {
        $classes[]="error401";
        return $classes;
    }
}

add_action('wp','custom_error_pages');

// Custom ACF options translation
function trans_acf_option($field = '') {
    $strpos = strpos($field, '|');
    if ($strpos) {
        $titles = preg_split('/\|/', $field);
        if (get_locale() === 'it_IT') {
            $field = $titles[1];
        } elseif (get_locale() === 'ru_RU') {
            $field = $titles[2];
        } else {
            $field = $titles[0];
        }
    }

    return $field;
}

/**
 * Sorting price array by amount
 * Closure
 */
function sort_by_amount($a, $b) {
    return $a['amount'] - $b['amount'];
}

/**
 * Shortcodes
 */
require get_parent_theme_file_path('/inc/shortcodes/cf7-shortcode.php');

/**
 * AJAX handlers
 */
require get_parent_theme_file_path('/inc/ajax/filter-cat-handler.php');

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Helpers
 */
require get_parent_theme_file_path( '/inc/wl-pages.php' );
require get_parent_theme_file_path( '/inc/helpers/helpers.php' );

/**
 * Taxonomy meta
 */
require get_parent_theme_file_path( '/inc/tax-meta.php' );

/**
 * Restrict mime types
 */
//require get_parent_theme_file_path( '/inc/restrict-mime-types.php' );
