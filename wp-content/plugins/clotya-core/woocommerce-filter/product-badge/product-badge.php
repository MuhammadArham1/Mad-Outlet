<?php

/*************************************************
## Admin Scripts
*************************************************/
function clotya_product_badge_admin_styles() {
	wp_enqueue_style( 'klb-product-badge',   plugins_url( 'css/admin/product-badge.css', __FILE__ ), false, '1.0');
	wp_enqueue_script( 'klb-product-badge',   plugins_url( 'js/admin/product-badge.js', __FILE__ ), false, '1.0');
}
add_action('admin_enqueue_scripts', 'clotya_product_badge_admin_styles');

/*************************************************
## Scripts
*************************************************/
function clotya_product_badge_styles() {
	wp_enqueue_style( 'klb-product-badge',   plugins_url( 'css/product-badge.css', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'clotya_product_badge_styles' );


add_filter('woocommerce_product_data_tabs', function($tabs) {
	$tabs['klb_badge_data'] = [
		'label' => esc_html__('Badge', 'clotya-core'),
		'target' => 'klb_product_badge_tab',
		'priority' => 65
	];
	return $tabs;
});

add_action('woocommerce_product_data_panels', function() {
	?><div id="klb_product_badge_tab" class="panel woocommerce_options_panel hidden"><?php
 
    global $product_object;
	
	woocommerce_wp_text_input([
		'id' => '_klb_product_badge_text',
		'label' => esc_html__('Badge Text', 'clotya-core'),
		'desc_tip'    => true,
		'description' => esc_html__( 'Badge Text.', 'clotya-core' ),
	]);
	
	woocommerce_wp_select([
		'id'          => '_klb_product_badge_type', 
		'label'       => esc_html__( 'Badge Type', 'clotya-core' ), 
		'desc_tip'    => true,
		'description' => esc_html__( 'Choose a badge type.', 'clotya-core' ),
		'options' => array(
			'style-1'   => esc_html__( 'Style 1', 'clotya-core' ),
			'style-2'   => esc_html__( 'Style 2', 'clotya-core' ),
			'style-3'   => esc_html__( 'Style 3', 'clotya-core' ),
		)
	]);

	woocommerce_wp_text_input([
		'id' => '_klb_product_badge_bg_color',
		'label' => esc_html__('Badge BG Color', 'clotya-core'),
		'class' => 'clotya-color-field',
	]);
	
	woocommerce_wp_text_input([
		'id' => '_klb_product_badge_text_color',
		'label' => esc_html__('Badge Text Color', 'clotya-core'),
		'class' => 'clotya-color-field',
	]);
	
	woocommerce_wp_checkbox([
		'id' => '_klb_product_percentage_check',
		'label' => esc_html__('Hide Percentage', 'clotya-core'),
		'description' => esc_html__( 'Enable this to hide the percentage label.', 'clotya-core' ),
	]);
	
	echo '<div class="percentage_fields">';
	
	woocommerce_wp_select([
		'id'          => '_klb_product_percentage_type', 
		'label'       => esc_html__( 'Percentage Type', 'clotya-core' ), 
		'desc_tip'    => true,
		'description' => esc_html__( 'If the product is on sale.', 'clotya-core' ),
		'options' => array(
			'style-1'   => esc_html__( 'Style 1', 'clotya-core' ),
			'style-2'   => esc_html__( 'Style 2', 'clotya-core' ),
			'style-3'   => esc_html__( 'Style 3', 'clotya-core' ),
		)
	]);
	
	woocommerce_wp_text_input([
		'id' => '_klb_product_percentage_bg_color',
		'label' => esc_html__('Percentage BG Color', 'clotya-core'),
		'class' => 'clotya-color-field',
	]);
	
	woocommerce_wp_text_input([
		'id' => '_klb_product_percentage_text_color',
		'label' => esc_html__('Percentage Text Color', 'clotya-core'),
		'class' => 'clotya-color-field',
	]);
	echo '</div>';
 
	?></div><?php
});

add_action('woocommerce_process_product_meta', function($post_id) {
	$product = wc_get_product($post_id);
	
	$product->update_meta_data('_klb_product_percentage_check', sanitize_text_field($_POST['_klb_product_percentage_check']));
	$product->update_meta_data('_klb_product_percentage_type', sanitize_text_field($_POST['_klb_product_percentage_type']));
	$product->update_meta_data('_klb_product_percentage_bg_color', sanitize_text_field($_POST['_klb_product_percentage_bg_color']));
	$product->update_meta_data('_klb_product_percentage_text_color', sanitize_text_field($_POST['_klb_product_percentage_text_color']));
	$product->update_meta_data('_klb_product_badge_text', sanitize_text_field($_POST['_klb_product_badge_text']));
	$product->update_meta_data('_klb_product_badge_type', sanitize_text_field($_POST['_klb_product_badge_type']));
	$product->update_meta_data('_klb_product_badge_bg_color', sanitize_text_field($_POST['_klb_product_badge_bg_color']));
	$product->update_meta_data('_klb_product_badge_text_color', sanitize_text_field($_POST['_klb_product_badge_text_color']));
 
	$product->save();
});



