<?php
/**
 * Plugin Name: Schedule post AUTO Publish Immediately
 * Plugin URI: http://eternaglow.com/
 * Description: Adds feed-to-post conversion functionality to WP RSS Aggregator.
 * Version: 3.7.6
 * Author: Eternaglow
 * Author URI: http://eternaglow.com/
 * Text Domain: wprss
 * Domain Path: /languages/
 * License: GPLv3
 */

add_filter('wprss_ftp_converter_post_title', 'modify_post_title_callback', 10, 2);
add_filter('wprss_ftp_converter_post_date', 'modify_post_date_callback', 10, 2);
add_filter('wprss_ftp_converter_post_date_gmt', 'modify_post_dategmt_callback', 10, 2);

function modify_post_title_callback($title, $source) {	
	$breakTitle = explode("|", $title);
	if(is_array($breakTitle)) {		
		return $breakTitle[0];
	}
	else {
		return $title;
	}
}

function modify_post_date_callback($post_date, $source) {	
	return date( 'Y-m-d H:i:s', current_time('timestamp') );
}

function modify_post_dategmt_callback($post_date, $source) {	
	return gmdate( 'Y-m-d H:i:s', current_time('timestamp') );
}