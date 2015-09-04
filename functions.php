<?php
show_admin_bar(false);
function theme_name_scripts() {
	wp_enqueue_style( 'custom-supaflora', get_stylesheet_directory_uri().'/custom.css' );
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
