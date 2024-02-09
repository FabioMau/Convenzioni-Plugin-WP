<?php

/**
 * Convenzione Wordpress Plugin
 *
 * @link              https://fabiomau.github.io/
 * @since             1.0.0
 * @package           Convenzioni
 *
 * @wordpress-plugin
 * Plugin Name:       Convenzioni
 * Plugin URI:        https://fabiomau.github.io/wp/convenzioni
 * Description:       Gestione delle Convenzioni
 * Version:           1.0.0
 * Author:            Fabio Maulucci
 * Author URI:        https://fabiomau.github.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       convenzioni
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'CONVENZIONI_VERSION', '1.0.0' );
require plugin_dir_path( __FILE__ ) . 'includes/class-convenzioni.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_convenzioni() {

	$plugin = new Convenzioni();
	$plugin->run();

}
run_convenzioni();
