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







// https://wordpress.org/support/topic/navigate-through-the-posts-using-keyboard-arrows-ask-question/
// https://wordpress.stackexchange.com/questions/349206/navigate-through-the-posts-using-keyboard-arrows

	function my_custom_js() { ?>

    <script type="text/javascript">
        document.onkeydown = function (e) {
            var e = e || event,
            keycode = e.which || e.keyCode;
            if (keycode == 37 || keycode == 33)
                location = "<?php echo get_permalink(get_previous_post()); ?>";
            if (keycode == 39 || keycode == 34)
                location = "<?php echo get_permalink(get_next_post()); ?>";
        }
    </script>

<?php }
add_action('wp_footer', 'my_custom_js');







 /**
 * Required files
 *
 * @since 0.1
 * @return
 */
// plugin_dir_path correct option.
require_once plugin_dir_path( __FILE__ ) . 'shortcodes.php';
