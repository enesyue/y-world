<?php

/**
 * Theme filters.
 */

namespace App;

use function Roots\view;
use Illuminate\Support\Facades\View;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

/**
 * Remove WP specific scripts / styles / emojis.
 */
add_filter( 'wp_enqueue_scripts', function () {
    wp_dequeue_script( 'jquery');
    wp_deregister_script( 'jquery');
    wp_dequeue_script( 'twemoji');
    wp_deregister_script( 'twemoji');
    wp_dequeue_script( 'wp-emoji');
    wp_deregister_script( 'wp-emoji');
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
});

/**
 * Create and add Navwalker to WP Core.
 */
add_action('after_setup_theme', function () {
    require ('Navigation/NavWalker.php');
    require ('Navigation/NavWalkerMobile.php');
});

/**
 * Display our new "Copyright" field
 *
 * @param int $attachment_id
 *
 * @return array
 */
function get_attachment_copyright($attachment_id = null)
{
    $attachment_id = ( empty($attachment_id) ) ? get_post_thumbnail_id() : (int) $attachment_id;

    if ($attachment_id) {
        return get_post_meta($attachment_id, '_copyright', true);
    }
    return null;
}
