<?php

/**
 * Class WLPages
 */
abstract class WLPages {

    /**
     * Get About Us page
     *
     * @param string $output
     * @return array|null|WP_Post
     */
    public static function get_about_pg($output = 'OBJECT') {
        return get_page_by_path('about-us', $output);
    }

    /**
     * Get Contacts page
     *
     * @param string $output
     * @return array|null|WP_Post
     */
    public static function get_contacts_pg($output = 'OBJECT') {
        return get_page_by_path('contacts', $output);
    }
}
