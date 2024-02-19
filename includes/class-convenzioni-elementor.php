<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main elementor class.
 * 
 * @link       https://fabiomau.github.io/wp/convenzioni
 * @since      1.0.0
 * 
 * @package    Convenzioni
 * @subpackage Convenzioni/includes
 * @author     Fabio Maulucci <maulucci.fabio@gmail.com>
 */
class Convenzioni_Elementor {


	/**
	 * Minimum Elementor Version
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $elementor_version    Minimum Elementor version required to run the plugin.
	 */
	protected $elementor_version;

	/**
	 * Initialize the plugin
	 *
	 * Validates that Elementor is already loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed include the plugin class.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		$this->elementor_version = '3.0.0';

		if(! $this->isElementorActive())
			return;

		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_categories' ] );
	}

	/**
	 * Check if Elementor is Installe and Actived
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function isElementorActive() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) )
			return false;	

		// Check for required Elementor version
		//if ( ! version_compare( ELEMENTOR_VERSION, $this->elementor_version, '>=' ) ) 
			//return false;

		return true;
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param Widgets_Manager $widgets_manager Elementor widgets manager.
	 */
	public function register_widgets( $widgets_manager ) {

		// Its is now safe to include Widgets files
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'elementor/convenzioni-list.php';

		// Register Widgets
		$widgets_manager->register( new Convenzioni\Widgets\Convenzioni_Elementor_Widget() );
	}

	/**
	 * Register Categories
	 *
	 * Register new Categories widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param Widgets_Manager $widgets_manager Elementor elements manager.
	 */
	function register_categories( $elements_manager ) {

		$elements_manager->add_category(
			'convenzioni',
			[
				'title' => __( 'Convenzioni', 'convenzioni' ),
				'icon' => 'fa fa-plug',
			]
		);
	
	}

}