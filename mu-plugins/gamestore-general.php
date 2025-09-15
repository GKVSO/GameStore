<?php
/*
 * Plugin Name: Gamestore General
 * Description: General plugin for the Gamestore site.
 * Version: 1.0.0
 * Author: GKVSO
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: gamestore-general
 * Domain Path: /languages
*/

function gkvso_remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'] ); // Activity
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] ); // Quick Draft
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] ); // Incoming Links
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] ); // Plugins
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts'] ); // Recent Drafts
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] ); // Recent Comments
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] ); // WordPress Events and News
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] ); // Other WordPress News
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_right_now'] ); // At a Glance
	unset( $wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget'] ); // Yoast SEO
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health'] ); //
}
add_action( 'wp_dashboard_setup', 'gkvso_remove_dashboard_widgets' );