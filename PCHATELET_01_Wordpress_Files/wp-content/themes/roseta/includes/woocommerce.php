<?php
/*
 * Woocommerce compatibility / overrides
 *
 * @package Roseta
 */

/* Override content product - products content on archive pages
    https://github.com/woocommerce/woocommerce/blob/release/3.5/templates/content-product.php
*/


/*
 * Move the Add to Cart button inside the thumbnail,
 * and add a div for the Add to card and View cart buttons
 */
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
add_action('woocommerce_before_shop_loop_item_title', 'roseta_woocommerce_before_buttons', 15);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 16);
add_action('woocommerce_before_shop_loop_item_title', 'roseta_woocommerce_after_buttons', 17);

function roseta_woocommerce_before_buttons() {
    echo "<div class='woocommerce-buttons-container'>";
}

function roseta_woocommerce_after_buttons() {
    echo "</div><!--.woocommerce-buttons-container-->";
}

/*
 * Add a container to the thumbnail
 */
add_action('woocommerce_before_shop_loop_item_title', 'roseta_woocommerce_before_thumbnail', 5);
add_action('woocommerce_before_shop_loop_item_title', 'roseta_woocommerce_after_thumbnail', 20);

function roseta_woocommerce_before_thumbnail() {
    echo "<div class='woocommerce-thumbnail-container'>";
}

function roseta_woocommerce_after_thumbnail() {
    echo "</div><!--.woocommerce-thumbnail-container-->";
}

	// <?php
	// /**
	//  * Hook: woocommerce_before_shop_loop_item.
	//  *
	//  * @hooked woocommerce_template_loop_product_link_open - 10
	//  */
	// do_action( 'woocommerce_before_shop_loop_item' );
	// /**
	//  * Hook: woocommerce_before_shop_loop_item_title.
	//  *
	//  * @hooked woocommerce_show_product_loop_sale_flash - 10
	//  * @hooked woocommerce_template_loop_product_thumbnail - 10
	//  */
	// do_action( 'woocommerce_before_shop_loop_item_title' );
	// /**
	//  * Hook: woocommerce_shop_loop_item_title.
	//  *
	//  * @hooked woocommerce_template_loop_product_title - 10
	//  */
	// do_action( 'woocommerce_shop_loop_item_title' );
	// /**
	//  * Hook: woocommerce_after_shop_loop_item_title.
	//  *
	//  * @hooked woocommerce_template_loop_rating - 5
	//  * @hooked woocommerce_template_loop_price - 10
	//  */
	// do_action( 'woocommerce_after_shop_loop_item_title' );
	// /**
	//  * Hook: woocommerce_after_shop_loop_item.
	//  *
	//  * @hooked woocommerce_template_loop_product_link_close - 5
	//  * @hooked woocommerce_template_loop_add_to_cart - 10
	//  */
	// do_action( 'woocommerce_after_shop_loop_item' );
	//
