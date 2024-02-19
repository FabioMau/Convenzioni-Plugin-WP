<?php

namespace Convenzioni\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Define the "Convenzioni List" Elementor Widget functionality.
 *
 * Loads and defines the Elementor Widget called "Convenzioni list".
 *
 * @link       https://fabiomau.github.io/wp/convenzioni
 * @since      1.0.0
 * 
 * @package    Convenzioni
 * @subpackage Convenzioni/elementor
 * @author     Fabio Maulucci <maulucci.fabio@gmail.com>
 */
class Convenzioni_Elementor_Widget extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'convenzioni-list';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Convenzioni', 'convenzioni');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-posts-ticker';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['convenzioni'];
    } 

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        //$settings = $this->get_settings_for_display();

        include plugin_dir_path( dirname( __FILE__ ) ) . 'templates/convenzioni-list.php';
    }
}
