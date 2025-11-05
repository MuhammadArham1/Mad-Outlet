<?php

/*************************************************
## Styles and Scripts
*************************************************/ 
define('KLB_INDEX_JS', plugin_dir_url( __FILE__ )  . '/js');
define('KLB_INDEX_CSS', plugin_dir_url( __FILE__ )  . '/css');

function klb_scripts() {
	wp_register_script( 'klb-location-filter', 	 plugins_url(   '/taxonomy/js/location-filter.js', __FILE__ ), true );
	wp_register_script( 'jquery-socialshare',    KLB_INDEX_JS . '/jquery-socialshare.js', array('jquery'), '1.0', true);
	wp_register_script( 'klb-social-share', 	 KLB_INDEX_JS . '/custom/social_share.js', array('jquery'), '1.0', true);
	wp_register_script( 'klb-gdpr', 	  		 KLB_INDEX_JS . '/custom/gdpr.js', array('jquery'), '1.0', true);

	if (function_exists('get_wcmp_vendor_settings') && is_user_logged_in()) {
		if(is_vendor_dashboard()){
			wp_deregister_script( 'bootstrap');
			wp_deregister_script( 'jquery-nice-select');
		}
	}
}
add_action( 'wp_enqueue_scripts', 'klb_scripts' );

/*----------------------------
  Elementor Get Templates
 ----------------------------*/
if ( ! function_exists( 'clotya_get_elementorTemplates' ) ) {
    function clotya_get_elementorTemplates( $type = null )
    {
        if ( class_exists( '\Elementor\Plugin' ) ) {

            $args = [
                'post_type' => 'elementor_library',
                'posts_per_page' => -1,
            ];

            $templates = get_posts( $args );
            $options = array();

            if ( !empty( $templates ) && !is_wp_error( $templates ) ) {

				$options['0'] = esc_html__('Set a Template','clotya-core');

                foreach ( $templates as $post ) {
                    $options[ $post->ID ] = $post->post_title;
                }
            } else {
                $options = array(
                    '' => esc_html__( 'No template exist.', 'clotya-core' )
                );
            }

            return $options;
        }
    }
}


/*-------------------------------------------
  Single Share and Compare Extra buttons
 --------------------------------------------*/
add_action( 'woocommerce_single_product_summary', 'clotya_single_extra_buttons', 38);
function clotya_single_extra_buttons(){
	$socialshare = get_theme_mod( 'clotya_shop_social_share', '0' );
	$wishlist = get_theme_mod( 'clotya_wishlist_button', '0' );

	if($socialshare || $wishlist){
		echo '<div class="product-extra-buttons">';
		do_action( 'clotya_single_extra_buttons_action' );
		echo '</div>';
	}
}
/*----------------------------
  Single Share
 ----------------------------*/
add_action( 'clotya_single_extra_buttons_action', 'clotya_social_share',20);
function clotya_social_share(){
	$socialshare = get_theme_mod( 'clotya_shop_social_share', '0' );

	if($socialshare == '1'){
		wp_enqueue_script('jquery-socialshare');
		wp_enqueue_script('klb-social-share');
	
		echo '<a href="#" class="share-product"><i class="klbth-icon-share"></i> '.esc_html__('Share this Product', 'clotya-core').'</a>';

	}
}

add_action( 'wp_footer', 'clotya_social_share_holder');
function clotya_social_share_holder(){
	
	$socialshare = get_theme_mod( 'clotya_shop_social_share', '0' );

	if($socialshare == '1'){
		$single_share_multicheck = get_theme_mod('clotya_shop_single_share',array( 'facebook', 'twitter', 'pinterest', 'linkedin', 'reddit', 'whatsapp'));
		
		echo'<div class="product-share-holder">';
		echo'<div class="product-share-inner">';
		echo'<div class="share-close"><i class="klbth-icon-cancel"></i></div>';
		echo'<div class="copy-link">';
		echo'<p>'.esc_html__('Copy Link', 'clotya-core').' <strong class="copied">'.esc_html__('Copied', 'clotya-core').'</strong></p>';
		echo'<div class="link-value">'.get_permalink().'</div>';
		echo'<input type="text" class="share-link-input" value="'.get_permalink().'" hidden>';
		echo'<span>'.esc_html__('You can share the product with your friends', 'clotya-core').'</span>';
		echo'</div><!-- copy-link -->';
		   echo '<ul class="social-container">';
				if(in_array('facebook', $single_share_multicheck)){
					echo '<li><a href="#" class="facebook"><i class="klbth-icon-facebook"></i></a></li>';
				}
				if(in_array('twitter', $single_share_multicheck)){
					echo '<li><a href="#" class="twitter"><i class="klbth-icon-twitter"></i></a></li>';
				}
				if(in_array('pinterest', $single_share_multicheck)){
					echo '<li><a href="#" class="pinterest"><i class="klbth-icon-pinterest"></i></a></li>';
				}
				if(in_array('linkedin', $single_share_multicheck)){
					echo '<li><a href="#" class="linkedin"><i class="klbth-icon-linkedin"></i></a></li>';
				}
				if(in_array('reddit', $single_share_multicheck)){
					echo '<li><a href="#" class="reddit"><i class="klbth-icon-reddit"></i></a></li>';
				}
				if(in_array('whatsapp', $single_share_multicheck)){
					echo '<li><a href="#" class="whatsapp"><i class="klbth-icon-whatsapp"></i></a></li>';
				}
			echo '</ul>';
		echo'</div><!-- product-share-inner -->';
		echo'</div><!-- product-share-holder -->';
	}
	
}

/*----------------------------
  Single Wishlist
 ----------------------------*/
add_action( 'clotya_single_extra_buttons_action', 'clotya_wishlist_shortcode_output',10);
function clotya_wishlist_shortcode_output(){
	$wishlist = get_theme_mod( 'clotya_wishlist_button', '0' );
	
	if($wishlist == '1' && function_exists('run_tinv_wishlist')){
		echo do_shortcode('[ti_wishlists_addtowishlist]');
	}elseif($wishlist == '1'){
		echo do_action('clotya_wishlist_action');
	}

}

/*----------------------------
  Single Size Chart
 ----------------------------*/
add_action( 'clotya_single_extra_buttons_action', 'clotya_single_size_chart',5);
function clotya_single_size_chart(){
	$sizechart = get_post_meta( get_the_ID(), 'klb_product_size_chart', true );
	
	if($sizechart){
		echo '<a href="#" class="size-box"><i class="klbth-icon-globe"></i>'.esc_html__('Size Guide ','clotya-core').'</a> ';
	}

}

/*----------------------------
  Update Cart When Quantity changed on CART PAGE.
 ----------------------------*/
add_action( 'woocommerce_after_cart', 'clotya_update_cart' );
function clotya_update_cart() {
    echo '<script>
	
	var timeout;
	
    jQuery(document).ready(function($) {

		var timeout;

		$(\'.woocommerce\').on(\'change\', \'input.qty\', function(){

			if ( timeout !== undefined ) {
				clearTimeout( timeout );
			}

			timeout = setTimeout(function() {
				$("[name=\'update_cart\']").trigger("click");
			}, 1000 ); // 1 second delay, half a second (500) seems comfortable too

		});

    });
    </script>';
}

/*----------------------------
  Disable Crop Image WCMP
 ----------------------------*/
add_filter('wcmp_frontend_dash_upload_script_params', 'clotya_crop_function');
function clotya_crop_function( $image_script_params ) {
	$image_script_params['canSkipCrop'] = true;
	return $image_script_params;
}
