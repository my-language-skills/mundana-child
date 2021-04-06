<?php
	add_action( 'wp_enqueue_scripts', 'mundana_enqueue_styles' );
	function mundana_enqueue_styles() {
// 		wp_enqueue_style( 'mundana-parent-style', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'mundana-parent-style', get_parent_theme_file_uri() . '/assets/css/theme.min.css' );
	}

	// function register_codefund() {
	// 	wp_enqueue_script('codefund', 'https://codefund.app/properties/189/funder.js', array(), null, true);
	// }
	// add_action('wp_enqueue_scripts', 'register_codefund');

 ?>
