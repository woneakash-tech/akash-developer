<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://https://worldlawalliance.com/
 * @since      1.0.0
 *
 * @package    World_Law_Alliance_Business_Legal_Network
 * @subpackage World_Law_Alliance_Business_Legal_Network/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    World_Law_Alliance_Business_Legal_Network
 * @subpackage World_Law_Alliance_Business_Legal_Network/includes
 * @author     World Law Alliance <contact@worldlawalliance>
 */
class World_Law_Alliance_Business_Legal_Network {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      World_Law_Alliance_Business_Legal_Network_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'WORLD_LAW_ALLIANCE_BUSINESS_LEGAL_NETWORK_VERSION' ) ) {
			$this->version = WORLD_LAW_ALLIANCE_BUSINESS_LEGAL_NETWORK_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'world-law-alliance-business-legal-network';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - World_Law_Alliance_Business_Legal_Network_Loader. Orchestrates the hooks of the plugin.
	 * - World_Law_Alliance_Business_Legal_Network_i18n. Defines internationalization functionality.
	 * - World_Law_Alliance_Business_Legal_Network_Admin. Defines all hooks for the admin area.
	 * - World_Law_Alliance_Business_Legal_Network_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-world-law-alliance-business-legal-network-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-world-law-alliance-business-legal-network-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-world-law-alliance-business-legal-network-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-world-law-alliance-business-legal-network-public.php';

		$this->loader = new World_Law_Alliance_Business_Legal_Network_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the World_Law_Alliance_Business_Legal_Network_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new World_Law_Alliance_Business_Legal_Network_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new World_Law_Alliance_Business_Legal_Network_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new World_Law_Alliance_Business_Legal_Network_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		
		// Register the shortcodes
		$this->loader->add_shortcode('wla_header', $plugin_public, 'wla_custom_header_shortcode');
		$this->loader->add_shortcode('wla_footer', $plugin_public, 'wla_custom_footer_shortcode');
		
		// ================================================================
		// HOMEPAGE
		// ================================================================
		$this->loader->add_shortcode('wla_home', $plugin_public, 'wla_home_page_shortcode');
		
		// ================================================================
		// PRACTICES
		// ================================================================
		$this->loader->add_shortcode('wla_tax_page', $plugin_public, 'wla_tax_page_shortcode');
		$this->loader->add_shortcode('wla_transactional_page', $plugin_public, 'wla_transactional_page_shortcode');
		$this->loader->add_shortcode('wla_compliance_page', $plugin_public, 'wla_compliance_page_shortcode');
		$this->loader->add_shortcode('wla_contract_solutions_page', $plugin_public, 'wla_contract_solutions_page_shortcode');
		$this->loader->add_shortcode('wla_disputes_page', $plugin_public, 'wla_disputes_page_shortcode');
		$this->loader->add_shortcode('wla_energy_page', $plugin_public, 'wla_energy_page_shortcode');
		$this->loader->add_shortcode('wla_inhouse_page', $plugin_public, 'wla_inhouse_page_shortcode');
		$this->loader->add_shortcode('wla_neutrals_page', $plugin_public, 'wla_neutrals_page_shortcode');
		$this->loader->add_shortcode('wla_practices_page', $plugin_public, 'wla_practices_page_shortcode');
		$this->loader->add_shortcode('wla_privacy_page', $plugin_public, 'wla_privacy_page_shortcode');
		$this->loader->add_shortcode('wla_ip_page', $plugin_public, 'wla_ip_page_shortcode');
		$this->loader->add_shortcode('wla_arbitration_page', $plugin_public, 'wla_arbitration_page_shortcode');
		$this->loader->add_shortcode('wla_employment_page', $plugin_public, 'wla_employment_page_shortcode');
		
		// ================================================================
		// REGIONS
		// ================================================================
		$this->loader->add_shortcode('wla_africa_me_page', $plugin_public, 'wla_africa_me_page_shortcode');
		$this->loader->add_shortcode('wla_americas_page', $plugin_public, 'wla_americas_page_shortcode');
		$this->loader->add_shortcode('wla_asia_pacific_page', $plugin_public, 'wla_asia_pacific_page_shortcode');
		$this->loader->add_shortcode('wla_asia_pacific_region_page', $plugin_public, 'wla_asia_pacific_region_page_shortcode');
		$this->loader->add_shortcode('wla_europe_page', $plugin_public, 'wla_europe_page_shortcode');
		
		// ================================================================
		// CLIENT SECTORS
		// ================================================================
		$this->loader->add_shortcode('wla_charities_page', $plugin_public, 'wla_charities_page_shortcode');
		$this->loader->add_shortcode('wla_family_office_page', $plugin_public, 'wla_family_office_page_shortcode');
		$this->loader->add_shortcode('wla_fashion_page', $plugin_public, 'wla_fashion_page_shortcode');
		$this->loader->add_shortcode('wla_founders_page', $plugin_public, 'wla_founders_page_shortcode');
		$this->loader->add_shortcode('wla_hnw_page', $plugin_public, 'wla_hnw_page_shortcode');
		$this->loader->add_shortcode('wla_institutions_page', $plugin_public, 'wla_institutions_page_shortcode');
		$this->loader->add_shortcode('wla_pe_page', $plugin_public, 'wla_pe_page_shortcode');
		$this->loader->add_shortcode('wla_private_clients_page', $plugin_public, 'wla_private_clients_page_shortcode');
		$this->loader->add_shortcode('wla_technology_page', $plugin_public, 'wla_technology_page_shortcode');
		
		// ================================================================
		// JURISDICTIONS
		// ================================================================
		$this->loader->add_shortcode('wla_bahamas_page', $plugin_public, 'wla_bahamas_page_shortcode');
		$this->loader->add_shortcode('wla_france_page', $plugin_public, 'wla_france_page_shortcode');
		$this->loader->add_shortcode('wla_germany_page', $plugin_public, 'wla_germany_page_shortcode');
		$this->loader->add_shortcode('wla_hongkong_page', $plugin_public, 'wla_hongkong_page_shortcode');
		$this->loader->add_shortcode('wla_india_page', $plugin_public, 'wla_india_page_shortcode');
		$this->loader->add_shortcode('wla_netherlands_page', $plugin_public, 'wla_netherlands_page_shortcode');
		$this->loader->add_shortcode('wla_poland_page', $plugin_public, 'wla_poland_page_shortcode');
		$this->loader->add_shortcode('wla_portugal_page', $plugin_public, 'wla_portugal_page_shortcode');
		$this->loader->add_shortcode('wla_singapore_page', $plugin_public, 'wla_singapore_page_shortcode');
		$this->loader->add_shortcode('wla_uae_page', $plugin_public, 'wla_uae_page_shortcode');
		$this->loader->add_shortcode('wla_uk_page', $plugin_public, 'wla_uk_page_shortcode');
		$this->loader->add_shortcode('wla_zambia_page', $plugin_public, 'wla_zambia_page_shortcode');
		
		// ================================================================
		// CORRIDORS
		// ================================================================
		$this->loader->add_shortcode('wla_corridors_page', $plugin_public, 'wla_corridors_page_shortcode');
		$this->loader->add_shortcode('wla_corridor_us_europe', $plugin_public, 'wla_corridor_us_europe_shortcode');
		$this->loader->add_shortcode('wla_corridor_uk_africa', $plugin_public, 'wla_corridor_uk_africa_shortcode');
		$this->loader->add_shortcode('wla_corridor_gcc_seasia', $plugin_public, 'wla_corridor_gcc_seasia_shortcode');
		$this->loader->add_shortcode('wla_corridor_gulf_cee', $plugin_public, 'wla_corridor_gulf_cee_shortcode');
		$this->loader->add_shortcode('wla_corridor_eu_india', $plugin_public, 'wla_corridor_eu_india_shortcode');
		$this->loader->add_shortcode('wla_corridor_apac_americas', $plugin_public, 'wla_corridor_apac_americas_shortcode');
		
		// ================================================================
		// PAGE / INSTITUTIONAL
		// ================================================================
		$this->loader->add_shortcode('wla_about_page', $plugin_public, 'wla_about_page_shortcode');
		$this->loader->add_shortcode('wla_clients_page', $plugin_public, 'wla_clients_page_shortcode');
		$this->loader->add_shortcode('wla_firms_page', $plugin_public, 'wla_firms_page_shortcode');
		$this->loader->add_shortcode('wla_directory_page', $plugin_public, 'wla_directory_page_shortcode');
		$this->loader->add_shortcode('wla_specialist_page', $plugin_public, 'wla_specialist_page_shortcode');
		$this->loader->add_shortcode('wla_professionals_page', $plugin_public, 'wla_professionals_page_shortcode');
		$this->loader->add_shortcode('wla_terms_page', $plugin_public, 'wla_terms_page_shortcode');
		$this->loader->add_shortcode('wla_unbounded_page', $plugin_public, 'wla_unbounded_page_shortcode');
		$this->loader->add_shortcode('wla_wia_page', $plugin_public, 'wla_wia_page_shortcode');
		$this->loader->add_shortcode('wla_forums_page', $plugin_public, 'wla_forums_page_shortcode');
		$this->loader->add_shortcode('wla_governance_page', $plugin_public, 'wla_governance_page_shortcode');
		$this->loader->add_shortcode('wla_how_it_works_page', $plugin_public, 'wla_how_it_works_page_shortcode');
		$this->loader->add_shortcode('wla_impact_page', $plugin_public, 'wla_impact_page_shortcode');
		$this->loader->add_shortcode('wla_insights_page', $plugin_public, 'wla_insights_page_shortcode');
		$this->loader->add_shortcode('wla_intelligence_page', $plugin_public, 'wla_intelligence_page_shortcode');
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    World_Law_Alliance_Business_Legal_Network_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
