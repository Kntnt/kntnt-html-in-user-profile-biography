<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kntnt HTML in User Profile Biography
 * Plugin URI:        https://www.kntnt.com/
 * Description:       Makes the user profile biography field accept HTML and blank lines as paragraph separators.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */

defined('ABSPATH') || die;

// Allow HTML in the biography field.
remove_filter('pre_user_description', 'wp_filter_kses');
add_filter('pre_user_description', 'wp_filter_post_kses');

// Apply wpautop to the text in biography field before returning it.
add_filter('get_the_author_description', function ($text) {
    return wpautop($text);
});
