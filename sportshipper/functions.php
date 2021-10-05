<?php
/**
 * SportShipper Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SportShipper
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_SPORTSHIPPER_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'sportshipper-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_SPORTSHIPPER_VERSION, 'all' );
	
	wp_enqueue_script( 'hoverintent', get_stylesheet_directory_uri() . '/js/hoverIntent.js', array(), '', true );
	wp_enqueue_script( 'superfish', get_stylesheet_directory_uri() . '/js/superfish.min.js', array(), '', true );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );


/* MENU ANIMATION DELAY */ 
add_action( 'wp_footer', function() { ?>
	<script>

    (function($){ //create closure so we can safely use $ as alias for jQuery

      $(document).ready(function(){
        
        var exampleOptions = {
			delay:       100, 
			animation:   {opacity:'show',height:'show'},
			speed:       'normal',
			autoArrows:  false
        }
        // initialise plugin
        var example = $('#primary-menu').superfish(exampleOptions);

        
      });

    })(jQuery);


    </script>
<?php } );



/* DISABLE TITLE ON ALL POST TYPES. */ 
function your_prefix_post_title() { 
	$post_types = array('page'); 
    // bail early if the current post type if not the one we want to customize. 
	if ( ! in_array( get_post_type(), $post_types ) ) { return; } // Disable Post featured image. 
		add_filter( 'astra_the_title_enabled', '__return_false' ); 
}
add_action( 'wp', 'your_prefix_post_title' );


add_shortcode('get_fedex_ship_quote', 'get_fedex_ship_quote_form_html');
function get_fedex_ship_quote_form_html(){
	ob_start();
	@include_once "fedex/fedex-form.php";
	$form_html = ob_get_clean();
	echo $form_html;
}

@include_once "fedex-functions.php";

@include_once "fedex/fedex-Luggage-options.php";

add_action('woocommerce_checkout_create_order', 'user_create',100,2);
function user_create ($order, $data) {

	$user_email = $order->get_billing_email();
	$exists = email_exists( $user_email );
 
	if( !is_user_logged_in() ) { 
		if ( $exists ) {
			echo "That E-mail is registered to user number " . $exists;
		} 
		else {
			$username = strstr($user_email, '@', true);
			$firstName = $order->get_billing_first_name();
			$lastName = $order->get_billing_last_name();
			$random_password = wp_generate_password( $length = 12, $include_standard_special_chars = true );
			$user_data = array(
				'ID' => '',
				'user_pass' => $random_password,
				'user_login' => $username,
				'first_name' => $firstName,
				'last_name' => $lastName,
				'role' => get_option('default_role') ,
				'user_email' => $user_email// Use default role or another role, e.g. 'editor'
			);

			$user_id = wp_insert_user( $user_data );
			$headers = "MIME-Version: 1.0" . "\r\n"; 
		    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		    $headers .= 'From: sportshipper <info@sportshipper.com>' . "\r\n";

					$mail_subject = "Welcome Message";
					$message = '<html><body>';
					$message .= '<h1 style="color:#000; font-size:20px;">Welcome to sportshipper</h1>';
					$message .= '<h5 style="color:#000;font-size:15px;">Hey '.$firstName.' , great to see you on site </h5>';
					$message .= '<h5 style="color:#000;font-size:15px;">UserName: "'.$username.'" , & Password: "'.$random_password.'"</h5>';
					$message .= '<h5 style="color:#000;font-size:15px;">Thanks</h5>';
					$message .= '</body></html>';
			        wp_mail($user_email, $mail_subject, $message ,$headers );

		 }
	}
}