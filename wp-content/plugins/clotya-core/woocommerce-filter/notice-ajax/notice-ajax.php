<?php
/*************************************************
## Scripts
*************************************************/
function clotya_notice_ajax_scripts() {
	wp_enqueue_script( 'klb-notice-ajax',   plugins_url( 'js/notice-ajax.js', __FILE__ ), false, '1.0');
	wp_enqueue_style( 'klb-notice-ajax',   plugins_url( 'css/notice-ajax.css', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'clotya_notice_ajax_scripts' );


/*************************************************
## AJax Handler Function
*************************************************/
if ( !function_exists( 'clotya_ajax_add_to_cart_archive_handler' ) ) {
    /**
    * Add to cart handler.
    */
    function clotya_ajax_add_to_cart_archive_handler() {
        WC_AJAX::get_refreshed_fragments();
    }
    add_action( 'wc_ajax_clotya_add_to_cart_archive', 'clotya_ajax_add_to_cart_archive_handler' );
    add_action( 'wc_ajax_nopriv_clotya_add_to_cart_archive', 'clotya_ajax_add_to_cart_archive_handler' );
    
    /**
    * Add fragments for notices.
    */
	if ( !function_exists( 'clotya_ajax_add_to_cart_add_fragments' ) ) {
	    function clotya_ajax_add_to_cart_add_fragments( $fragments ) {
	        $all_notices  = WC()->session->get( 'wc_notices', array() );
	        $notice_types = apply_filters( 'woocommerce_notice_types', array( 'error', 'success', 'notice' ) );
	        
	        ob_start();
	        foreach ( $notice_types as $notice_type ) {
	            if ( wc_notice_count( $notice_type ) > 0 ) {
	                wc_get_template( "notices/{$notice_type}.php", array(
	                    'notices' => array_filter( $all_notices[ $notice_type ] ),
	                ) );
	            }
	        }
	        $fragments['notices_html'] = ob_get_clean();
	        
	        wc_clear_notices();
	        
	        return $fragments;
	    }
	    add_filter( 'woocommerce_add_to_cart_fragments', 'clotya_ajax_add_to_cart_add_fragments' );
	}
}
