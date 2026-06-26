<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://worldlawalliance.com/
 * @since      1.0.0
 *
 * @package    World_Law_Alliance_Business_Legal_Network
 * @subpackage World_Law_Alliance_Business_Legal_Network/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    World_Law_Alliance_Business_Legal_Network
 * @subpackage World_Law_Alliance_Business_Legal_Network/includes
 * @author     World Law Alliance <contact@worldlawalliance>
 */
class World_Law_Alliance_Business_Legal_Network_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'world-law-alliance-business-legal-network',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
