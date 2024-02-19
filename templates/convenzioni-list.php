<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$args = array(
    'post_type' => 'convenzioni',
    'posts_per_page' => -1,
);

$query = new WP_Query($args);

// Verifica se ci sono convenzioni
if ($query->have_posts()) :

    // Loop attraverso le convenzioni
    while ($query->have_posts()) :
        $query->the_post();

        // Ottieni le informazioni della convenzione
        $title = get_the_title();
        $image = get_the_post_thumbnail_url(get_the_ID(), 'full');  // 'full' può essere sostituito con le dimensioni desiderate
        $excerpt = get_the_excerpt();

        // Stampa la convenzione nella lista
        echo '<article>';
        echo '<h3>' . esc_html($title) . '</h3>';
        if ($image) {
            echo '<img src="' . esc_url($image) . '" alt="' . esc_attr($title) . '">';
        }
        echo '<p>' . esc_html($excerpt) . '</p>';
        echo '</article>';
    endwhile;

    // Ripristina le informazioni della post
    wp_reset_postdata();
else :
    echo 'Nessuna convenzione trovata.';
endif;