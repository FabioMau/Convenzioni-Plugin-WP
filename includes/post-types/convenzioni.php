<?php

/**
 * Define the "Convenzioni" Post Type functionality.
 *
 * Loads and defines the Post Type called "Convenzione".
 *
 * @link       https://fabiomau.github.io/wp/convenzioni
 * @since      1.0.0
 * 
 * @package    Convenzioni
 * @subpackage Convenzioni/includes/post_types
 * @author     Fabio Maulucci <maulucci.fabio@gmail.com>
 */
class Convenzioni_PT_Convenzioni
{


	/**
	 * Load the post type.
	 *
	 * @since    1.0.0
	 */
	public function load_pt()
	{

		$labels = array(
			'name'                  => __('Convenzioni', 'convenzioni'),
			'singular_name'         => __('Convenzione', 'convenzioni'),
			'menu_name'             => __('Convenzioni', 'convenzioni'),
			'name_admin_bar'        => __('Convenzioni', 'convenzioni'),
			'add_new'               => __('Aggiungi convenzione', 'convenzioni'),
			'add_new_item'          => __('Aggiungi nuova convenzione', 'convenzioni'),
			'new_item'              => __('Nuova convenzione', 'convenzioni'),
			'edit_item'             => __('Modifica convenzione', 'convenzioni'),
			'view_item'             => __('Vedi convenzione', 'convenzioni'),
			'all_items'             => __('Lista delle convenzioni', 'convenzioni'),
			'search_items'          => __('Cerca convenzioni', 'convenzioni'),
			'not_found'             => __('Convenzione non trovata', 'convenzioni'),
			'featured_image'        => __('Immagine della convenzione', 'convenzioni'),
			'set_featured_image'    => __('Imposta immagine', 'convenzioni'),
			'remove_featured_image' => __('Rimuove immagine', 'convenzioni'),
			'use_featured_image'    => __('Utilizza immagine', 'convenzioni'),
			'archives'              => __('Archivio delle convenzioni', 'convenzioni'),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'rewrite'            => array('slug' => 'convenzioni'),
			'has_archive'        => true,
			'menu_icon'  		 => 'dashicons-products',
			'can_export'		 => true,
			'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
		);

		register_post_type('convenzioni', $args);

		$this->categorie();
	}

	/**
	 * Load the taxonomy 'Categorie' for 'Convenzioni'.
	 *
	 * @since    1.0.0
	 */
	public function categorie()
	{
		$labels = array(
			'name'              => __('Categorie', 'convenzioni'),
			'singular_name'     => __('Categoria', 'convenzioni'),
			'search_items'      => __('Cerca categorie', 'convenzioni'),
			'all_items'         => __('Tutte le categorie', 'convenzioni'),
			'view_item '        => __('Visualizza la categoria', 'convenzioni'),
			'parent_item'       => __('Categoria superiore', 'convenzioni'),
			'edit_item'         => __('Modifica categoria', 'convenzioni'),
			'update_item'       => __('Aggiorna categoria', 'convenzioni'),
			'add_new_item'      => __('Aggiungi nuova categoria', 'convenzioni'),
			'new_item_name'     => __('Nuovo nome', 'convenzioni'),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'hierarchical'       => false,
			//'rewrite'            => array('slug' => 'convenzioni'),
		);

		register_taxonomy('categorie-convenzioni', 'convenzioni', $args);
	}
}
