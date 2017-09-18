<?php
/**
 * Restrict mime types
 *
 */

if ( ! function_exists( 'wl_restrict_mime_types' ) ) {

    add_filter( 'upload_mimes', 'wl_restrict_mime_types' );
    /**
     * Retrun allowed mime types
     *
     * @see     function get_allowed_mime_types in wp-includes/functions.php
     * @param   array Array of mime types
     * @return  array Array of mime types keyed by the file extension regex corresponding to those types.
     */
    function khnavi_restrict_mime_types( $mime_types ) {

        $mime_types = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'pdf'          => 'application/pdf',
            'png'          => 'image/png',
        );

        return $mime_types;
    }
}

// If the function exists this file is called as post-upload-ui.
// We don't do anything then.
if ( ! function_exists( 'wl_restrict_mime_types_hint' ) ) {
    // add to wp
    add_action( 'post-upload-ui', 'wl_restrict_mime_types_hint' );
    /**
     * Get an Hint about the allowed mime types
     *
     * @return  void
     */
    function wl_restrict_mime_types_hint() {

        echo '<br>';
        _e( 'Supported formats: jpg, pdf, png', THEME_OPT );
    }
}


/**
 * Customize uploading files
 *
 *
 * @param $file
 * @return mixed
 */
function wl_upload_filter( $file ) {
    $img_types = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'pdf'          => 'application/pdf',
        'png'          => 'image/png',
    );

    if (in_array($file['type'], $img_types)) {
        if ($file['size'] > 3145728) { // max 3 MB
            $error = array(
                'error' => __('Maximum 3MB picture size', THEME_OPT),
            );
            return $error;
        }
    }

    return $file;
}
add_filter('wp_handle_upload_prefilter', 'wl_upload_filter' );