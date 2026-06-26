<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://worldlawalliance.com/
 * @since             1.0.0
 * @package           World_Law_Alliance_Business_Legal_Network
 *
 * @wordpress-plugin
 * Plugin Name:       World Law Alliance Business & Legal Network
 * Plugin URI:        https://https://worldlawalliance.com/
 * Description:       Complete Business & Legal Network Management System including Members, Law Firms, Lawyers, Awards, Conferences, Speaker Management, Ticketing, Invoicing, Registrations, Profiles, Networking, and Admin Dashboard.
 * Version:           1.0.0
 * Author:            World Law Alliance
 * Author URI:        https://https://worldlawalliance.com//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       world-law-alliance-business-legal-network
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WORLD_LAW_ALLIANCE_BUSINESS_LEGAL_NETWORK_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-world-law-alliance-business-legal-network-activator.php
 */
function activate_world_law_alliance_business_legal_network() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-world-law-alliance-business-legal-network-activator.php';
	World_Law_Alliance_Business_Legal_Network_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-world-law-alliance-business-legal-network-deactivator.php
 */
function deactivate_world_law_alliance_business_legal_network() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-world-law-alliance-business-legal-network-deactivator.php';
	World_Law_Alliance_Business_Legal_Network_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_world_law_alliance_business_legal_network' );
register_deactivation_hook( __FILE__, 'deactivate_world_law_alliance_business_legal_network' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-world-law-alliance-business-legal-network.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_world_law_alliance_business_legal_network() {

	$plugin = new World_Law_Alliance_Business_Legal_Network();
	$plugin->run();

}
run_world_law_alliance_business_legal_network();
