<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Define the templates
 *
 * @link       https://fabiomau.github.io/wp/convenzioni
 * @since      1.0.0
 * 
 * @package    Convenzioni
 * @subpackage Convenzioni/includes
 * @author     Fabio Maulucci <maulucci.fabio@gmail.com>
 */
class Convenzioni_Templates {


	/**
	 * Load the plugin templates.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_templates($template) {

		if( (is_tax( 'categorie-convenzioni' ) && !$this->is_template($template, 'taxonomy'))
         || (is_post_type_archive('convenzioni') && !$this->is_template($template, 'archive')) )
            $template = require_once plugin_dir_path( dirname( __FILE__ ) ) . 'templates/archive-convenzioni.php';

        return $template;

	}

    /**
     * Check if exist the templates in active theme
     * 
     * @since 1.0.0
     */
    public function is_template($template_path, $type) {

        //Get template name
        $template = basename($template_path);
        
        //Check if template is taxonomy-categorie-convenzioni.php
        //Check if template is taxonomy-categorie-convenzioni-{term-slug}.php
        if( 1 == preg_match('/^'.$type.'-categorie-convenzioni((-(\S*))?).php/',$template) )
            return true;
        
        return false;
    }

}
