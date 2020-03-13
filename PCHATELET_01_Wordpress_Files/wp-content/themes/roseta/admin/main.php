<?php
/**
 * Admin theme page
 *
 * @package Roseta
 */

// Theme particulars
require_once( get_template_directory() . "/admin/defaults.php" );
require_once( get_template_directory() . "/admin/options.php" );
require_once( get_template_directory() . "/includes/tgmpa.php" );

// Custom CSS Styles for customizer
require_once( get_template_directory() . "/includes/custom-styles.php" );

// load up theme options
$cryout_theme_settings = apply_filters( 'roseta_theme_structure_array', $roseta_big );
$cryout_theme_options = roseta_get_theme_options();
$cryout_theme_defaults = roseta_get_option_defaults();

// Get the theme options and make sure defaults are used if no values are set
//if ( ! function_exists( 'roseta_get_theme_options' ) ):
function roseta_get_theme_options() {
	$options = wp_parse_args(
		get_option( 'roseta_settings', array() ),
		roseta_get_option_defaults()
	);
	$options = cryout_maybe_migrate_options( $options );
	return apply_filters( 'roseta_theme_options_array', $options );
} // roseta_get_theme_options()
//endif;

//if ( ! function_exists( 'roseta_get_theme_structure' ) ):
function roseta_get_theme_structure() {
	global $roseta_big;
	return apply_filters( 'roseta_theme_structure_array', $roseta_big );
} // roseta_get_theme_structure()
//endif;

// backwards compatibility filter for some values that changed format
// this needs to be applied to the options array using WordPress' 'option_{$option}' filter
/* not currently used in Roseta
function roseta_options_back_compat( $options ){
	return $options;
} //
add_filter( 'option_roseta_settings', 'roseta_options_back_compat' ); */

// Hooks/Filters
add_action( 'admin_menu', 'roseta_add_page_fn' );

// Add admin scripts
function roseta_admin_scripts( $hook ) {
	global $roseta_page;
	if( $roseta_page != $hook ) {
        	return;
	}

	wp_enqueue_style( 'wp-jquery-ui-dialog' );
	wp_enqueue_style( 'roseta-admin-style', get_template_directory_uri() . '/admin/css/admin.css', NULL, _CRYOUT_THEME_VERSION );
	wp_enqueue_script( 'roseta-admin-js',get_template_directory_uri() . '/admin/js/admin.js', array('jquery-ui-dialog'), _CRYOUT_THEME_VERSION );
	$js_admin_options = array(
		'reset_confirmation' => esc_html( __( 'Reset Roseta Settings to Defaults?', 'roseta' ) ),
	);
	wp_localize_script( 'roseta-admin-js', 'cryout_admin_settings', $js_admin_options );
}

// Create admin subpages
function roseta_add_page_fn() {
	global $roseta_page;
	$roseta_page = add_theme_page( __( 'Roseta Theme', 'roseta' ), __( 'Roseta Theme', 'roseta' ), 'edit_theme_options', 'about-roseta-theme', 'roseta_page_fn' );
	add_action( 'admin_enqueue_scripts', 'roseta_admin_scripts' );
} // roseta_add_page_fn()

// Display the admin options page

function roseta_page_fn() {

	if (!current_user_can('edit_theme_options'))  {
		wp_die( __( 'Sorry, but you do not have sufficient permissions to access this page.', 'roseta') );
	}

?>

<div class="wrap" id="main-page"><!-- Admin wrap page -->
	<div id="lefty">
	<?php if( isset($_GET['settings-loaded']) ) { ?>
		<div class="updated fade">
			<p><?php _e('Roseta settings loaded successfully.', 'roseta') ?></p>
		</div> <?php
	} ?>
	<?php
	// Reset settings to defaults if the reset button has been pressed
	if ( isset( $_POST['cryout_reset_defaults'] ) ) {
		delete_option( 'roseta_settings' ); ?>
		<div class="updated fade">
			<p><?php _e('Roseta settings have been reset successfully.', 'roseta') ?></p>
		</div> <?php
	} ?>

		<div id="admin_header">
			<img src="<?php echo get_template_directory_uri() . '/admin/images/logo-about-top.png' ?>" />
			<span class="version">
				<?php echo apply_filters( 'cryout_admin_version', sprintf( __( 'Roseta Theme v%1$s by %2$s', 'roseta' ),
					_CRYOUT_THEME_VERSION,
					'<a href="https://www.cryoutcreations.eu" target="_blank">Cryout Creations</a>'
				) ); ?><br>
				<?php do_action( 'cryout_admin_version' ); ?>
			</span>
		</div>

		<div id="admin_links">
			<a href="https://www.cryoutcreations.eu/wordpress-themes/roseta" target="_blank"><?php _e( 'Roseta Homepage', 'roseta' ) ?></a>
			<a href="https://www.cryoutcreations.eu/forums/f/wordpress/roseta" target="_blank"><?php _e( 'Theme Support', 'roseta' ) ?></a>
			<a class="blue-button" href="https://www.cryoutcreations.eu/wordpress-themes/roseta#cryout-comparison-section" target="_blank"><?php _e( 'Upgrade to PLUS', 'roseta' ) ?></a>
		</div>

		<div id="description">
			<?php
				$theme = wp_get_theme();
				echo apply_filters( 'cryout_theme_description', esc_html( $theme->get( 'Description' ) ) );
			?>
		</div>

		<div id="customizer-container">
			<a class="button" href="customize.php" id="customizer"> <?php _e( 'Customize', 'roseta' ); ?> </a>
			<form action="" method="post" id="defaults" id="defaults">
				<input type="hidden" name="cryout_reset_defaults" value="true" />
				<input type="submit" class="button" id="cryout_reset_defaults" value="<?php _e( 'Reset to Defaults', 'roseta' ); ?>" />
			</form>
		</div>

	</div><!--lefty -->


	<div id="righty">
		<div id="cryout-donate" class="postbox donate">

			<h3 class="hndle"><?php _e( 'Upgrade to Plus', 'roseta' ); ?></h3>
			<div class="inside">
				<p><?php printf( __('Find out what features you\'re missing out on and how the Plus version of %1$s can improve your site.', 'roseta'), cryout_sanitize_tnl(_CRYOUT_THEME_NAME) ); ?></p>
				<img src="<?php echo get_template_directory_uri() . '/admin/images/features.png' ?>" />
				<a class="button" href="https://www.cryoutcreations.eu/wordpress-themes/roseta" target="_blank" style="display: block;"><?php _e( 'Upgrade to Plus', 'roseta' ); ?></a>

			</div><!-- inside -->

		</div><!-- donate -->

	</div><!--  righty -->
</div><!--  wrap -->

<?php
} // roseta_page_fn()
