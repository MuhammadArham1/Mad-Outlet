<?php
if(get_theme_mod('clotya_single_image_zoom') == 1 || clotya_ft() == 'imgzoom'){
	
/*************************************************
## Scripts
*************************************************/
function clotya_image_zoom_scripts() {
	wp_register_style( 'klb-image-zoom',   plugins_url( 'css/image-zoom.css', __FILE__ ), false, '1.0');
	wp_register_script( 'jquery-zoom',   plugins_url( 'js/jquery.zoom.min.js', __FILE__ ), false, '1.0');
	wp_register_script( 'klb-image-zoom',   plugins_url( 'js/image-zoom.js', __FILE__ ), false, '1.0');

}
add_action( 'wp_enqueue_scripts', 'clotya_image_zoom_scripts' );


add_action('woocommerce_product_thumbnails','klb_image_zoom',20);
function klb_image_zoom(){
	wp_enqueue_style('klb-image-zoom');
	wp_enqueue_script('jquery-zoom');
	wp_enqueue_script('klb-image-zoom');
}


function clotya_image_zoom_setup() {
	add_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'after_setup_theme', 'clotya_image_zoom_setup' );

}