<?php

/*************************************************
## Single Gallery Scripts
*************************************************/
function clotya_single_gallery_custom_scripts() {

	wp_enqueue_style( 'clotya-single-gallery',    plugins_url( 'css/single-gallery.css', __FILE__ ), false, '1.0');

	if(get_theme_mod('clotya_single_gallery_type') == '2columns' || clotya_ft() == '2columns' || get_theme_mod('clotya_single_gallery_type') == '1column' || clotya_ft() == '1column'){
		
		wp_dequeue_script( 'flexslider' );
	}
}
add_action( 'wp_enqueue_scripts', 'clotya_single_gallery_custom_scripts' );

/*************************************************
## Single Gallery Classes
*************************************************/
function clotya_single_product_post_class( $classes, $product ) {
    global $woocommerce_loop;
    
    if ( ! is_product() ) return $classes;

    if ( $woocommerce_loop['name'] == 'related' ) return $classes;

	if(get_theme_mod('clotya_single_gallery_type') == 'carousel2columns' || clotya_ft() == 'carousel2columns'){
		$classes[] = 'single-gallery-carousel2columns';
	} elseif(get_theme_mod('clotya_single_gallery_type') == '2columns' || clotya_ft() == '2columns'){
		$classes[] = 'single-gallery-2columns';
	} elseif(get_theme_mod('clotya_single_gallery_type') == '1column' || clotya_ft() == '1column'){
		$classes[] = 'single-gallery-1column';
	} elseif(get_theme_mod('clotya_single_gallery_type') == 'vertical' || clotya_ft() == 'vertical'){
		$classes[] = 'single-gallery-vertical';
	} elseif(get_theme_mod('clotya_single_gallery_type') == 'horizontal' || clotya_ft() == 'horizontal'){
		$classes[] = 'single-gallery-horizontal';
	}
    
    return $classes;
}
add_filter( 'woocommerce_post_class', 'clotya_single_product_post_class', 10, 2 );


/*************************************************
## Single Product Thumbnail Carousel
*************************************************/ 
add_filter( 'woocommerce_single_product_carousel_options', 'clotya_single_gallery_options' );
function clotya_single_gallery_options( $options ) {

    $options['direction'] = get_theme_mod( 'clotya_single_gallery_type' ) == 'vertical' || clotya_ft() == 'vertical' ? 'vertical' : 'horizontal';
	
	if(get_theme_mod( 'clotya_single_gallery_type' ) == 'carousel2columns' || clotya_ft() == 'carousel2columns'){
		$options['directionNav'] = true;
		$options['controlNav'] = false;
		$options['minItems'] = 2;
		$options['maxItems'] = 2;
		$options['itemWidth'] = 500;
		$options['itemMargin'] = 5;
	}
    $options['prevText'] = '<button type="button" class="slick-nav slick-prev slick-button"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" fill="currentColor"><polyline fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" points="17.2,22.4 6.8,12 17.2,1.6 "/></svg></button>';
    $options['nextText'] = '<button type="button" class="slick-nav slick-next slick-button"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" fill="currentColor"><polyline fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" points="6.8,22.4 17.2,12 6.8,1.6 "/></svg></button>';

			
    return $options;
}