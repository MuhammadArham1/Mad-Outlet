<?php
/*************************************************
## Scripts
*************************************************/
function clotya_people_added_in_cart_scripts() {
	wp_enqueue_style( 'klb-people-added-in-cart',   plugins_url( 'css/people-added-in-cart.css', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'clotya_people_added_in_cart_scripts' );

/*************************************************
## People Have this in their carts.
*************************************************/
if( ! function_exists( 'clotya_people_added_in_cart' ) ) {
	function clotya_people_added_in_cart(){
		global $wpdb, $product;
		$in_basket = 0;
		$wc_session_data = $wpdb->get_results( "SELECT session_key FROM {$wpdb->prefix}woocommerce_sessions" );
		$wc_session_keys = wp_list_pluck( $wc_session_data, 'session_key' );
		if( $wc_session_keys ) {
			foreach ( $wc_session_keys as $key => $_customer_id ) { 
				// if you want to skip current viewer cart item in counts or else can remove belows checking
				if( WC()->session->get_customer_id() == $_customer_id ) continue;
				
				$session_contents = WC()->session->get_session( $_customer_id, array() );
				if(isset($session_contents['cart'])){
					$cart_contents = maybe_unserialize( $session_contents['cart'] );
					if( $cart_contents ){
						foreach ( $cart_contents as $cart_key => $item ) {
							if( $item['product_id'] == $product->get_id() ) {
								$in_basket += 1;
							}
						}
					}
				}
			}
		}

		if( $in_basket ){
			
			echo '<div class="klb-people-added product-alert-message">';
			echo '<i class="klb-icon-shopping-bag"></i>';               
			echo '<p>'.esc_html__('This product has been added to','clotya-core').' <strong>'.sprintf( esc_html__( '%d  people\'s', 'clotya-core' ), $in_basket ).'</strong>'.esc_html__('carts.','clotya-core').'</p>';
			echo '</div>';
		}

	}
}
add_action('woocommerce_single_product_summary', 'clotya_people_added_in_cart', 45);