<?php
/**
 * Plugin Name: Attachment Pages to 404
 * Description: Redirects attachement page requests to 404 for attachement security.
 * Plugin URI:  https://github.com/rveitch/wp-attachment-page-redirect
 * Author:      Ryan Veitch
 * Author URI:  https://github.com/rveitch
 * License:     GPL v2 or later
 * Version:     1.0
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Redirect requests for attachement pages to the theme's 404 page.
 */
function _attachment_page_redirect() {
	global $post;
	if ( is_attachment() ) {
		global $wp_query;
	  $wp_query->set_404();
	  status_header( 404 );
	  get_template_part( 404 );
		exit;
	}
}
add_action( 'template_redirect', '_attachment_page_redirect' );
