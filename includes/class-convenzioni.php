<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * The core plugin class.
 *
 * @link       https://fabiomau.github.io/wp/convenzioni
 * @since      1.0.0
 * 
 * @package    Convenzioni
 * @subpackage Convenzioni/includes
 * @author     Fabio Maulucci <maulucci.fabio@gmail.com>
 */
class Convenzioni {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Convenzioni_Loader    $loader    Maintains and registers all hooks for the plugin.
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
		if ( defined( 'CONVENZIONI_VERSION' ) ) {
			$this->version = CONVENZIONI_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'convenzioni';

		$this->load_dependencies();
		$this->set_locale();
		$this->load_post_types();
		$this->load_shortcodes();
		$this->load_templates();

		$this->loader->add_action('elementor/loaded', $this, 'load_elementorwidgets');
		//$this->load_elementorwidgets();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		// Main dependencies
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-convenzioni-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-convenzioni-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-convenzioni-elementor.php';
		//require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-convenzioni-templates.php';

		// Custom post types dependencies
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/post-types/convenzioni.php';
					
		// Shortcodes dependencies
		//require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/shortcodes/convenzioni-list.php';

		$this->loader = new Convenzioni_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Convenzioni_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Define the Post Types for this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_post_types() {

		$plugin_PT_convenzioni = new Convenzioni_PT_Convenzioni();

		$this->loader->add_action( 'init', $plugin_PT_convenzioni, 'load_pt' );

	}

	/**
	 * Load the shortcodes for this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_shortcodes() {

		//$plugin_shortcode_convenzioni = new Convenzioni_Shortcode_Convenzioni();

		//$this->loader->add_action( 'init', $plugin_shortcode_convenzioni, 'shortcode' );
		
	}

	/**
	 * Load the elementor widgets for this plugin
	 * 
	 * @since    1.0.0
	 */
	public function load_elementorwidgets() {

		$plugin_elementor_loader = new Convenzioni_Elementor();

	}

	/**
	 * Load the templates for this plugin, templates will be overrided from the theme
	 * 
	 * @since    1.0.0
	 */
	public function load_templates() {

		$plugin_templates_loader = new Convenzioni_Templates();

		$this->loader->add_action('template_include', $plugin_templates_loader, 'load_plugin_templates');

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
	 * @return    Convenzioni_Loader    Orchestrates the hooks of the plugin.
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
