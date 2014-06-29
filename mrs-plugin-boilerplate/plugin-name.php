<?php
/**
 * @wordpress-plugin
 * Plugin Name:       @TODO
 * Plugin URI:        @TODO
 * Description:       @TODO
 * Version:           1.0.0
 * Author:            Marcin Skrzypiec
 * Author URI:        http://www.mrsztuczkens.me
 * Text Domain:       plugin-name-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__) . 'includes/class-mrs-plugin-client-base.php' );
require_once( plugin_dir_path( __FILE__) . 'includes/class-mrs-plugin-admin-base.php' );
require_once( plugin_dir_path( __FILE__) . 'includes/class-mrs-plugin-extensions.php' );

require_once( plugin_dir_path( __FILE__ ) . 'public/class-plugin-name.php' );

register_activation_hook( __FILE__, array( 'Plugin_Name', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Plugin_Name', 'deactivate' ) );
add_action( 'plugins_loaded', array( 'Plugin_Name', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-plugin-name-admin.php' );
	add_action( 'plugins_loaded', array( 'Plugin_Name_Admin', 'get_instance' ) );
}
