<?php
/**
 * Config
 *
 * Config file for the plugin.
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Demon Image Annotation
 * @author     Your Name <demonisblack@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.superwhite.cc/demon/image-annotation-plugin
 * @since      1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'wp_get_current_user' ) ) {
	include ABSPATH . 'wp-includes/pluggable.php';
}

global $wpdb;
define( 'DIA_PLUGIN_VERSION', '5.0' );
define( 'DIA_PLUGIN_URL', 'admin.php?page=' );

define( 'DIA_TABLE_NOTES', $wpdb->prefix . 'demon_imagenote' );
define( 'DIA_TABLE_COMMENTS', $wpdb->prefix . 'comments' );
