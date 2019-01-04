<?php 

add_action( 'wp_enqueue_scripts', 'salient_child_enqueue_styles');
function salient_child_enqueue_styles() {
	
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('font-awesome'));

		if ( is_rtl() ) 
			wp_enqueue_style(  'salient-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );
}

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png');
            height: 46px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function change_admin_footer(){
	 echo '<span id="footer-note">From your friends at <a href="https://piranhadesigns.com/" target="_blank">Piranha</a>.</span>';
	}
add_filter('admin_footer_text', 'change_admin_footer');

function add_custom_dashboard_widgets() {
 
	    wp_add_dashboard_widget(
	                 'wpexplorer_dashboard_widget', // Widget slug.
	                 'Piranha', // Title.
	                 'custom_dashboard_widget_content' // Display function.
	        );
	}
 
	add_action( 'wp_dashboard_setup', 'add_custom_dashboard_widgets' );
 
	/**
	 * Create the function to output the contents of your Dashboard Widget.
	 */
 
function custom_dashboard_widget_content() {
     echo "<img src='https://www.piranhadesigns.com/includes/images/core/2018/piranha-designs-logo.svg'>
     <p>Hello Luke! If you have any need of assistance, please don't hesitate to contact us:</p>
     <ul>
         <li><a href='https://piranhadesigns.com'>https://piranhadesigns.com</a></li>
     </ul>
     ";
	}

// Remove All Yoast HTML Comments
// https://gist.github.com/paulcollett/4c81c4f6eb85334ba076
add_action('wp_head',function() { ob_start(function($o) {
return preg_replace('/^\n?<!--.*?[Y]oast.*?-->\n?$/mi','',$o);
}); },~PHP_INT_MAX);


?>