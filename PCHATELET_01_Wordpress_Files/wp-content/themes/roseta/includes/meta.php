<?php
/**
 * Custom Post metadata functions
 *
 * @package Roseta
 */

// Add Layout Meta Box
function roseta_add_meta_boxes( $post ) {
    global $wp_meta_boxes;

	$layout_context = apply_filters( 'roseta_layout_meta_box_context', 'side' ); // 'normal', 'side', 'advanced'
	$layout_priority = apply_filters( 'roseta_layout_meta_box_priority', 'default' ); // 'high', 'core', 'low', 'default'

    // Add page layouts
    add_meta_box(
		'roseta_layout',
		__( 'Static Page Layout', 'roseta' ),
		'roseta_layout_meta_box',
		'page',
		$layout_context,
		$layout_priority
	);
} // roseta_add_meta_boxes()

// Hook meta boxes into 'add_meta_boxes'
add_action( 'add_meta_boxes', 'roseta_add_meta_boxes' );

// Define Layout Meta Box
function roseta_layout_meta_box() {
	global $post;
    	global $roseta_big;
	$options = $roseta_big['options'][0];
	$custom = ( get_post_custom( $post->ID ) ? get_post_custom( $post->ID ) : false );
	$layout = ( isset( $custom['_cryout_layout'][0] ) ? $custom['_cryout_layout'][0] : '0' );
    ?>
	<p>
    	<?php foreach ($options['choices'] as $value => $data ) {
            $data['url'] = esc_url( sprintf( $data['url'], get_template_directory_uri() ) ); ?>

    		<label>
                <input type="radio" name="_cryout_layout" <?php checked( $value == $layout ); ?> value="<?php echo esc_attr( $value ); ?>" />
                <span><img src="<?php echo $data['url'] ?>" alt="<?php echo esc_html(  $data['label'] ) ?>" title="<?php echo esc_html(  $data['label'] ) ?>"/></span>
            </label>

    	<?php } ?>
    	<label id="cryout_layout_default">
            <input type="radio" name="_cryout_layout" <?php checked( '0' == $layout ); ?> value="0" />
            <span><img src="<?php echo get_template_directory_uri() ?>/admin/images/0def.png" alt="<?php _e( 'Default Theme Layout', 'roseta' ); ?>" title="<?php _e( 'Default Theme Layout', 'roseta' ); ?>" /></span>
        </label>
	</p>
	<?php
} //roseta_layout_meta_box()

function roseta_meta_style( $hook ) {
    if ( 'post.php' != $hook && 'post-new.php' != $hook && 'page.php' != $hook ) {
        return;
    }
    wp_enqueue_style( 'roseta_meta_style', get_template_directory_uri() . '/admin/css/meta.css', NULL, _CRYOUT_THEME_VERSION );
}

add_action( 'admin_enqueue_scripts', 'roseta_meta_style' );

/**
 * Validate, sanitize, and save post metadata.
 *
 */
function roseta_save_custom_post_metadata() {
	// Don't break on quick edit
	global $post;
	if ( ! isset( $post ) || ! is_object( $post ) ) {
		return;
	}

    	global $roseta_big;
    	$valid_layouts = $roseta_big['options'][0]['choices'];
	$layout = ( isset( $_POST['_cryout_layout'] ) && array_key_exists( $_POST['_cryout_layout'], $valid_layouts ) ? $_POST['_cryout_layout'] : '0' );

	// Layout - Update
	update_post_meta( $post->ID, '_cryout_layout', $layout );
} //roseta_save_custom_post_metadata()

// Hook the save post custom meta data into
add_action( 'publish_page', 'roseta_save_custom_post_metadata' );
add_action( 'draft_page',   'roseta_save_custom_post_metadata' );
add_action( 'future_page',  'roseta_save_custom_post_metadata' );

// FIN
