<?php
/*************************************************
## Buy Now Button For Single Product
*************************************************/
function clotya_add_buy_now_button_single(){
	global $product;
    printf( '<button id="buynow" type="submit" name="clotya-buy-now" value="%d" class="buy_now_button button">%s</button>', $product->get_ID(), esc_html__( 'Buy Now', 'clotya-core' ) );
}
add_action( 'woocommerce_after_add_to_cart_button', 'clotya_add_buy_now_button_single' );

/*************************************************
## Handle for click on buy now
*************************************************/
function clotya_handle_buy_now(){
	if ( !isset( $_REQUEST['clotya-buy-now'] ) ){
		return false;
	}

	WC()->cart->empty_cart();

	$product_id = absint( $_REQUEST['clotya-buy-now'] );
    $quantity = absint( $_REQUEST['quantity'] );

	if ( isset( $_REQUEST['variation_id'] ) ) {

		$variations   = array();
		
		foreach ( $_REQUEST as $key => $value ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( 'attribute_' !== substr( $key, 0, 10 ) ) {
				continue;
			}

			$variations[ sanitize_title( wp_unslash( $key ) ) ] = wp_unslash( $value );
		}

		$variation_id = absint( $_REQUEST['variation_id'] );
		WC()->cart->add_to_cart( $product_id, 1, $variation_id, $variations );

	}else{
        WC()->cart->add_to_cart( $product_id, $quantity );
	}

	wp_safe_redirect( wc_get_checkout_url() );
	exit;
}
add_action( 'wp_loaded', 'clotya_handle_buy_now' );